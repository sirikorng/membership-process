<?php

$path = $_SERVER['DOCUMENT_ROOT'];

include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';
include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';

Class MembershipLevelByUsername{


function getUserByUsername($username){
$wp_user = get_user_by('login',$username);
 if(!$wp_user){
	  throw new Exception("Username: ".$username." does not exist.");	   
 }
return $wp_user;

}

function getMemebershipLevelUsersByUserID($user_id){
global $wpdb;
$membershipLevels = $wpdb->get_results( "SELECT * FROM {$wpdb->pmpro_memberships_users} where user_id = {$user_id} order by id desc limit 0,1");
 if(!$membershipLevels){
	  throw new Exception("User ID ".$user_id." has no membership level data");
	   
 }
 echo 'MembershipLevelByUsername - user ID: '.$user_id.' has membership ID:'.$membershipLevels[0]->membership_id.'  and period:'.$membershipLevels[0]->cycle_period;
 return $membershipLevels[0];
 
}

function updateActivatedThemeName($themeName){
global $wpdb;
$result = $wpdb->query( $wpdb->prepare( "UPDATE {$wpdb->options} set option_value= %s WHERE option_name = %s or  option_name = %s ", $themeName,'template', 'stylesheet') );


 if($result > 0){
echo 'New theme updated successful';
 }
else{
echo 'Theme has already updated';
  exit( var_dump( $wpdb->last_query ) );
}
$wpdb->flush();

}

function form($submitData){
	$user = $this->getUserByUsername('maryshop');
	echo ' ID : '.$user->ID;
	$membershipLevel = $this->getMemebershipLevelUsersByUserID($user->ID );        
	$this->updateMemberPackageByMembershipID($membershipLevel->membership_id);	
}


function updateMemberPackageByMembershipID($membership_id){
if($membership_id == 1){
$this->updateActivatedThemeName('storefront');
}elseif($membership_id == 2){
$this->updateActivatedThemeName('shopkeeper');

}elseif($membership_id == 3){
$this->updateActivatedThemeName('storefront');

}elseif($membership_id == 4){
$this->updateActivatedThemeName('shopkeeper');
}
}

}
?>