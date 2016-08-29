<?php

namespace Drupal\userprofiles\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ProfileCreateForm.
 *
 * @package Drupal\userprofiles\Form
 */
class ProfileCreateForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'profile_create_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
