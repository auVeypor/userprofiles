<?php

namespace Drupal\userprofiles\Form;

use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\userprofiles\Entity\PrivateProfile;
use Drupal\userprofiles\Entity\PublicProfile;

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
        // Load the private profile
        $uid = \Drupal::currentUser()->id();
        $private_profile = PrivateProfile::load($uid);

        $form['firstname-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show First Name'),
            '#default_value' => $private_profile->get('field_firstname_state')->value
        );
        $form['firstname'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('First Name'),
            '#default_value' => 'Shannon',
            '#default_value' => $private_profile->get('field_firstname')->value,
        );

        $form['lastname-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show Last Name'),
            '#default_value' => $private_profile->get('field_lastname_state')->value
        );
        $form['lastname'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Last Name'),
            '#default_value' => 'Rothe',
            '#default_value' => $private_profile->get('field_lastname')->value,
        );

        $form['dob-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show Date Of Birth'),
            '#default_value' => $private_profile->get('field_dob_state')->value
        );  

        $form['dob'] = array(
            '#type' => 'datetime',
            '#title' => $this->t('Date of Birth'),
            '#date_date_format' => 'd/m/Y',
            '#date_time_format' => 'H:i:s A',
            '#default_value' => new DrupalDateTime($private_profile->get('field_dob')->value),
        );

        $form['homephone-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show Home Phone'),
            '#default_value' => $private_profile->get('field_homephone_state')->value
        );
        $form['homephone'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Home Phone'),
            '#default_value' => '6372unlikely',
            '#default_value' => $private_profile->get('field_homephone')->value,
        );

        $form['mobile-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show Mobile Phone'),
            '#default_value' => $private_profile->get('field_mobile_state')->value
        );
        $form['mobile'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Mobile Phone'),
            '#default_value' => '04unlikely',
            '#default_value' => $private_profile->get('field_mobile')->value,
        );

        $form['role-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show Roles'),
            '#default_value' => $private_profile->get('field_role_state')->value
        );
        $form['role'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Roles'),
            '#default_value' => 'Full Time Sickcunt',
            '#default_value' => $private_profile->get('field_role')->value,
        );

        $form['address-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show Address'),
            '#default_value' => $private_profile->get('field_address_state')->value
        );  
        $form['address'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Address'),
            '#default_value' => '8 Darren Drive, Mudgee, NSW, 2850',
            '#default_value' => $private_profile->get('field_address')->value,
        );

        $form['certification-state'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Show Certifications'),
            '#default_value' => $private_profile->get('field_certifications_state')->value
        );
        $form['certifications'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Certifications'),
            '#default_value' => $private_profile->get('field_certifications')->value,
        );

        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save Profile')
        );

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        
    }

    /**
    * {@inheritdoc}
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Load the private profile for the current logged in user
        $uid = \Drupal::currentUser()->id();
        $private_user = PrivateProfile::load($uid);
        $public_user = PublicProfile::load($uid);

        // Load all the stuff from the form
        $firstname_state = $form_state->getValue('firstname-state');
        $firstname = $form_state->getValue('firstname');
        $lastname_state = $form_state->getValue('lastname-state');
        $lastname = $form_state->getValue('lastname');
        $dob_state = $form_state->getValue('dob-state');
        $dob = $form_state->getValue('dob');
        $homephone_state = $form_state->getValue('homephone-state');
        $homephone = $form_state->getValue('homephone');
        $mobile_state = $form_state->getValue('mobile-state');
        $mobile = $form_state->getValue('mobile');
        $role_state = $form_state->getValue('role-state');
        $role = $form_state->getValue('role');
        $address_state = $form_state->getValue('address-state');
        $address = $form_state->getValue('address');
        $certification_state = $form_state->getValue('certification-state');
        $certifications = $form_state->getValue('certifications');

        // Reset all the data from form
        $public_user->set('field_firstname_state', $firstname_state);
        $public_user->set('field_firstname', '');
        $public_user->set('field_lastname_state', $lastname_state);
        $public_user->set('field_lastname', '');
        $public_user->set('field_dob_state', $dob_state);
        $public_user->set('field_dob', '');
        $public_user->set('field_homephone_state', $homephone_state);
        $public_user->set('field_homephone', '');
        $public_user->set('field_mobile_state', $mobile_state);
        $public_user->set('field_mobile', '');
        $public_user->set('field_role_state', $role_state);
        $public_user->set('field_role', '');
        $public_user->set('field_address_state', $address_state);
        $public_user->set('field_address', '');
        $public_user->set('field_certifications_state', $certification_state);
        $public_user->set('field_certifications', '');
        $public_user->save();

        // Update with new information in public profile based on state
        if ($firstname_state) $public_user->set('field_firstname', $firstname);
        if ($lastname_state) $public_user->set('field_lastname', $lastname);
        if ($dob_state) $public_user->set('field_dob', $dob);
        if ($homephone_state) $public_user->set('field_homephone', $homephone);
        if ($mobile_state) $public_user->set('field_mobile', $mobile);
        if ($role_state) $public_user->set('field_role', $role);
        if ($address_state) $public_user->set('field_address', $address);
        if ($certification_state) $public_user->set('field_certifications', $certifications);
        $public_user->save();

        // And of course, update the private information (everything)
        $private_user->set('field_firstname_state', $firstname_state);
        $private_user->set('field_firstname', $firstname);
        $private_user->set('field_lastname_state', $lastname_state);
        $private_user->set('field_lastname', $lastname);
        $private_user->set('field_dob_state', $dob_state);
        $private_user->set('field_dob', $dob);
        $private_user->set('field_homephone_state', $homephone_state);
        $private_user->set('field_homephone', $homephone);
        $private_user->set('field_mobile_state', $mobile_state);
        $private_user->set('field_mobile', $mobile);
        $private_user->set('field_role_state', $role_state);
        $private_user->set('field_role', $role);
        $private_user->set('field_address_state', $address_state);
        $private_user->set('field_address', $address);
        $private_user->set('field_certifications_state', $certification_state);
        $private_user->set('field_certifications', $certifications);
        $private_user->save();

        global $base_url;
        drupal_set_message($this->t('Successfully updated user <a href="' . $base_url . '/profile/view/' . $private_user->id() . '">profile</a>'));
    }

}
