<?php

namespace Drupal\userprofiles\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\node\Entity\Node;
use Drupal\Core\Entity;
use Drupal\user\Entity\User;
use Drupal\userprofiles\Entity\PrivateProfile;
use Drupal\userprofiles\Entity\PublicProfile;

class BlankController extends ControllerBase {
	public function genblank() {
		//Check to see if a new user has actually been made, stops mashing of the link and therefore the user and entities going out of sync

		// //load the user list and check last
		// $users = User::loadMultiple();
		// $uids = array_keys($users);
		// $ulastID = end($uids);
		// //load the privates and check last
		// $privates = PrivateProfile::loadMultiple();
		// $ppids = array_keys($privates);
		// $plastID = end($ppids);

		// \Drupal::logger('BlankController')->error($ulastID);
		// \Drupal::logger('BlankController')->error($plastID);

		// if($plastID == $ulastID) {
		// 	\Drupal::logger('BlankController')->error("Access to genblank form did not gen");
		// } else if ($plastID+1 == $ulastID) {
		// 	//Create new private
		// 	$private = PrivateProfile::create([
		// 		'label' => User::load($ulastID)->getAccountName(),
		// 		'name' => User::load($ulastID)->getAccountName(),
		// 		'field_firstname' => "",
		// 		'field_lastname' => "",
		// 		'field_dob' => "",
		// 		'field_homephone' => "",
		// 		'field_mobile' => "",
		// 		'field_role' => "",
		// 		'field_address' => "",
		// 		'field_certifications' => array("")
		// 	]);
		// 	$private->save();
		// 	//Create new public
		// 	$public = PublicProfile::create([
		// 		'label' => User::load($ulastID)->getAccountName(),
		// 		'name' => User::load($ulastID)->getAccountName(),
		// 		'field_firstname' => "",
		// 		'field_lastname' => "",
		// 		'field_dob' => "",
		// 		'field_homephone' => "",
		// 		'field_mobile' => "",
		// 		'field_role' => "",
		// 		'field_address' => "",
		// 		'field_certifications' => array("")
		// 	]);
		// 	$public->save();
		// }


		$private = PrivateProfile::create([
			'label' => "cunt",
			'name' => "cunt",
			'field_firstname' => "",
			'field_lastname' => "",
			'field_dob' => "",
			'field_homephone' => "",
			'field_mobile' => "",
			'field_role' => "",
			'field_address' => "",
			'field_certifications' => array("")
		]);

		$private->save();
		\Drupal::logger('BlankController')->error($private->id());

		$private->setOriginalId($private->id()+1);
		$private->save();

		$private = PrivateProfile::create([
			'label' => "cunt",
			'name' => "cunt",
			'field_firstname' => "",
			'field_lastname' => "",
			'field_dob' => "",
			'field_homephone' => "",
			'field_mobile' => "",
			'field_role' => "",
			'field_address' => "",
			'field_certifications' => array("")
		]);

		$private->save();
		\Drupal::logger('BlankController')->error($private->id());


		$build = array(
			'#type' => 'markup',
			'#markup' => t(' '),
		);

		return $build;
	}

}