<?php

namespace Drupal\test;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\test\Entity\ServiceEntityInterface;

/**
 * Defines the storage handler class for Service entity entities.
 *
 * This extends the base storage class, adding required special handling for
 * Service entity entities.
 *
 * @ingroup test
 */
class ServiceEntityStorage extends SqlContentEntityStorage implements ServiceEntityStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(ServiceEntityInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {service_entity_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {service_entity_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(ServiceEntityInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {service_entity_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('service_entity_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
