<?php

namespace Drupal\test;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Service entity entity.
 *
 * @see \Drupal\test\Entity\ServiceEntity.
 */
class ServiceEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\test\Entity\ServiceEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished service entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published service entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit service entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete service entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add service entity entities');
  }


}
