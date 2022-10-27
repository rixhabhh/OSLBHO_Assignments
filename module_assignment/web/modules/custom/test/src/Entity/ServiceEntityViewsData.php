<?php

namespace Drupal\test\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Service entity entities.
 */
class ServiceEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
