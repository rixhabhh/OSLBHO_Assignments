<?php

namespace Drupal\test\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Service entity entities.
 *
 * @ingroup test
 */
interface ServiceEntityInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Service entity name.
   *
   * @return string
   *   Name of the Service entity.
   */
  public function getName();

  /**
   * Sets the Service entity name.
   *
   * @param string $name
   *   The Service entity name.
   *
   * @return \Drupal\test\Entity\ServiceEntityInterface
   *   The called Service entity entity.
   */
  public function setName($name);

  /**
   * Gets the Service entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Service entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Service entity creation timestamp.
   *
   * @param int $timestamp
   *   The Service entity creation timestamp.
   *
   * @return \Drupal\test\Entity\ServiceEntityInterface
   *   The called Service entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Service entity revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Service entity revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\test\Entity\ServiceEntityInterface
   *   The called Service entity entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Service entity revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Service entity revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\test\Entity\ServiceEntityInterface
   *   The called Service entity entity.
   */
  public function setRevisionUserId($uid);

}
