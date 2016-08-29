<?php

namespace Drupal\userprofiles\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Private Profile edit forms.
 *
 * @ingroup userprofiles
 */
class PrivateProfileForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\userprofiles\Entity\PrivateProfile */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Private Profile.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Private Profile.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.private_profile.canonical', ['private_profile' => $entity->id()]);
  }

}
