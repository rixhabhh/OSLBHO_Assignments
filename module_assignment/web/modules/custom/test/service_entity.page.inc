<?php

/**
 * @file
 * Contains service_entity.page.inc.
 *
 * Page callback for Service entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Service entity templates.
 *
 * Default template: service_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_service_entity(array &$variables) {
  // Fetch ServiceEntity Entity Object.
  $service_entity = $variables['elements']['#service_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
