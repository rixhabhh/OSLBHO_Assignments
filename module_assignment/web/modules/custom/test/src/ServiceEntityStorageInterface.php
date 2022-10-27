<?php

namespace Drupal\test;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface ServiceEntityStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Service entity revision IDs for a specific Service entity.
   *
   * @param \Drupal\test\Entity\ServiceEntityInterface $entity
   *   The Service entity entity.
   *
   * @return int[]
   *   Service entity revision IDs (in ascending order).
   */
  public function revisionIds(ServiceEntityInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Service entity author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Service entity revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\test\Entity\ServiceEntityInterface $entity
   *   The Service entity entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(ServiceEntityInterface $entity);

  /**
   * Unsets the language for all Service entity with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
