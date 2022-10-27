<?php

namespace Drupal\test\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Service entity type entity.
 *
 * @ConfigEntityType(
 *   id = "service_entity_type",
 *   label = @Translation("Service entity type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\test\ServiceEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\test\Form\ServiceEntityTypeForm",
 *       "edit" = "Drupal\test\Form\ServiceEntityTypeForm",
 *       "delete" = "Drupal\test\Form\ServiceEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\test\ServiceEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_export = {
 *     "id",
 *     "label"
 *   },
 *   config_prefix = "service_entity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "service_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/service_entity_type/{service_entity_type}",
 *     "add-form" = "/admin/structure/service_entity_type/add",
 *     "edit-form" = "/admin/structure/service_entity_type/{service_entity_type}/edit",
 *     "delete-form" = "/admin/structure/service_entity_type/{service_entity_type}/delete",
 *     "collection" = "/admin/structure/service_entity_type"
 *   }
 * )
 */
class ServiceEntityType extends ConfigEntityBundleBase implements ServiceEntityTypeInterface {

  /**
   * The Service entity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Service entity type label.
   *
   * @var string
   */
  protected $label;

}
