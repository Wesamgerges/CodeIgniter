<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */

/**
 * Created:
 * By: Wesam Gerges
 * Date: January 12 2012
 * Last Update: April 18 2012
 * 
 * The base configurations.
 * 
 */
	// TABLE NAMES	
	
	define ("AttendanceTable",		"meetingattendance" 							);
	define ("ServantsTable",		"mservants"										);
	define ("PersonsTable",			"person"										);
	define ("MemberMeetingTable",           "membermeeting"									);
	define ("TEMPLATE_TBL", 		"templates"										);
	define ("Pages", 			"pages"											);
	define ("Privileges", 			"privilege"										);
	define ("Users", 			"users"											);
	
	// Page	
	define ("MainPage", 			"main"								);
	define ("AddFamilyPage",		"AddFamily.php"									);
	define ("SendEMailPage",		"SendEMail.php"									);
			

	// JQuery Path	
	define ("JQueryPath",			"https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js");
	
	// Main CSS file path
	define ("MainCSS",				"include/stylesheet.css"						);	
