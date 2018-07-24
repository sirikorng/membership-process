<?php
require_once('MembershipLevelByUsername.php');
$path = $_SERVER['DOCUMENT_ROOT'];


Class MembershipProcess{
private $membershipLevelByUsername = MembershipLevelByUsername();
private $free_theme = 'storefront';
private $shopkeeper_theme = 'shopkeeper';
private $be_theme = 'betheme';

	function form($submitData){
		$user = $membershipLevelByUsername->getUserByUsername('maryshop');
		echo ' ID : '.$user->ID;
		$membershipLevelUsersObj = $memberLevel->getMemebershipLevelUsersByUserID($user->ID );        
		$membershipLevelByUsername->updateMemberPackageByMembershipID($membershipLevelUsersObj->membership_id);	
	}


	function updateMemberPackageByMembershipID($membership_id){
		if($membership_id == 1){
		$membershipLevelByUsername->updateActivatedThemeName($free_theme);
		}elseif($membership_id == 2){
		$membershipLevelByUsername->updateActivatedThemeName($shopkeeper_theme);

		}elseif($membership_id == 3){
		$membershipLevelByUsername->updateActivatedThemeName($free_theme);

		}elseif($membership_id == 4){
		updateActivatedThemeName('shopkeeper_theme');
		}
	}

}
?>