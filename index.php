<?php
/* Plugin Name: Student Report cards plugin
Plugin URI: https://www.spidyhost.com/
Description: Students report card plugin by sufyan
Version: 1.0
Author: Sufyan
Author URI: https://www.sufyan.in/
License: GPLv2 or later

*/

function student_reports_activate() {
	global $wpdb;
	$table_name = 'student_reports';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		student_name text NOT NULL,
		class_name text NOT NULL,
		section text NOT NULL,
		subject text NOT NULL,
		report_id mediumint(9) NOT NULL,
		working_days mediumint(9) NOT NULL,
		present_days mediumint(9) NOT NULL,
		start_page mediumint(9) NOT NULL,
		end_page mediumint(9) NOT NULL,
		marks_total mediumint(9) NOT NULL,
		marks_got mediumint(9) NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}
register_activation_hook( __FILE__, 'student_reports_activate' );

function add_report_card(){
	include (dirname(__FILE__).'/add_report_card.php');
}

function report_card_list(){
	include (dirname(__FILE__).'/report_card_list.php');
}

function hs_student_reports_admin_menu(){
    add_menu_page('Report cards','Report cards','manage_options','hs-stu-report-cards','report_card_list','dashicons-id','2');
    add_submenu_page('hs-stu-report-cards','Add card','Add card','manage_options','add_report_card','add_report_card');
/*    add_submenu_page('hs-matrimony','Matrimony Settings','Matrimony Settings','manage_options','hsmat-settings','hsmat_settings'); //*/
}
add_action('admin_menu' , 'hs_student_reports_admin_menu');