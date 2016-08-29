<?php

namespace Drupal\userprofiles;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Private Profile entity.
 *
 * @see \Drupal\userprofiles\Entity\PrivateProfile.
 */
class PrivateProfileAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\userprofiles\PrivateProfileInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished private profile entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published private profile entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit private profile entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete private profile entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add private profile entities');
  }

}
