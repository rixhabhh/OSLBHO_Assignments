<?php

namespace Drupal\test\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\test\Entity\ServiceEntityInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ServiceEntityController.
 *
 *  Returns responses for Service entity routes.
 */
class ServiceEntityController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  protected $dateFormatter;

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\Renderer
   */
  protected $renderer;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->dateFormatter = $container->get('date.formatter');
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * Displays a Service entity revision.
   *
   * @param int $service_entity_revision
   *   The Service entity revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($service_entity_revision) {
    $service_entity = $this->entityTypeManager()->getStorage('service_entity')
      ->loadRevision($service_entity_revision);
    $view_builder = $this->entityTypeManager()->getViewBuilder('service_entity');

    return $view_builder->view($service_entity);
  }

  /**
   * Page title callback for a Service entity revision.
   *
   * @param int $service_entity_revision
   *   The Service entity revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($service_entity_revision) {
    $service_entity = $this->entityTypeManager()->getStorage('service_entity')
      ->loadRevision($service_entity_revision);
    return $this->t('Revision of %title from %date', [
      '%title' => $service_entity->label(),
      '%date' => $this->dateFormatter->format($service_entity->getRevisionCreationTime()),
    ]);
  }

  /**
   * Generates an overview table of older revisions of a Service entity.
   *
   * @param \Drupal\test\Entity\ServiceEntityInterface $service_entity
   *   A Service entity object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(ServiceEntityInterface $service_entity) {
    $account = $this->currentUser();
    $service_entity_storage = $this->entityTypeManager()->getStorage('service_entity');

    $langcode = $service_entity->language()->getId();
    $langname = $service_entity->language()->getName();
    $languages = $service_entity->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $service_entity->label()]) : $this->t('Revisions for %title', ['%title' => $service_entity->label()]);

    $header = [$this->t('Revision'), $this->t('Operations')];
    $revert_permission = (($account->hasPermission("revert all service entity revisions") || $account->hasPermission('administer service entity entities')));
    $delete_permission = (($account->hasPermission("delete all service entity revisions") || $account->hasPermission('administer service entity entities')));

    $rows = [];

    $vids = $service_entity_storage->revisionIds($service_entity);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\test\Entity\ServiceEntityInterface $revision */
      $revision = $service_entity_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = $this->dateFormatter->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $service_entity->getRevisionId()) {
          $link = Link::fromTextAndUrl($date, new Url('entity.service_entity.revision', [
            'service_entity' => $service_entity->id(),
            'service_entity_revision' => $vid,
          ]))->toString();
        }
        else {
          $link = $service_entity->toLink($date)->toString();
        }

        $row = [];
        $column = [
          'data' => [
            '#type' => 'inline_template',
            '#template' => '{% trans %}{{ date }} by {{ username }}{% endtrans %}{% if message %}<p class="revision-log">{{ message }}</p>{% endif %}',
            '#context' => [
              'date' => $link,
              'username' => $this->renderer->renderPlain($username),
              'message' => [
                '#markup' => $revision->getRevisionLogMessage(),
                '#allowed_tags' => Xss::getHtmlTagList(),
              ],
            ],
          ],
        ];
        $row[] = $column;

        if ($latest_revision) {
          $row[] = [
            'data' => [
              '#prefix' => '<em>',
              '#markup' => $this->t('Current revision'),
              '#suffix' => '</em>',
            ],
          ];
          foreach ($row as &$current) {
            $current['class'] = ['revision-current'];
          }
          $latest_revision = FALSE;
        }
        else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
              Url::fromRoute('entity.service_entity.translation_revert', [
                'service_entity' => $service_entity->id(),
                'service_entity_revision' => $vid,
                'langcode' => $langcode,
              ]) :
              Url::fromRoute('entity.service_entity.revision_revert', [
                'service_entity' => $service_entity->id(),
                'service_entity_revision' => $vid,
              ]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.service_entity.revision_delete', [
                'service_entity' => $service_entity->id(),
                'service_entity_revision' => $vid,
              ]),
            ];
          }

          $row[] = [
            'data' => [
              '#type' => 'operations',
              '#links' => $links,
            ],
          ];
        }

        $rows[] = $row;
      }
    }

    $build['service_entity_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

}
