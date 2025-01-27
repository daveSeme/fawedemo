<?php  
 namespace Config;

use CodeIgniter\Config\BaseConfig;

class tank_auth extends \CodeIgniter\Config\BaseConfig
{
/*
|--------------------------------------------------------------------------
| Website details
|
| These details are used in emails sent by authentication library.
|--------------------------------------------------------------------------
*/
public $website_name = 'CREAW Kenya 1.0';// application 
public $webmaster_email = 'creaw@mandeonline.com';


/*|--------------------------------------------------------------------------
| Security settings
|
| The library uses PasswordHash library for operating with hashed passwords.
| 'phpass_hash_portable' = Can passwords be dumped and exported to another server. If set to FALSE then you won't be able to use this database on another server.
| 'phpass_hash_strength' = Password hash strength.
|--------------------------------------------------------------------------
*/
public $phpass_hash_portable = FALSE;
public $phpass_hash_strength = 8;

/*
|--------------------------------------------------------------------------
| Registration settings
|
| 'allow_registration' = Registration is enabled or not
| 'captcha_registration' = Registration uses CAPTCHA
| 'email_activation' = Requires user to activate their account using email after registration.
| 'email_activation_expire' = Time before users who don't activate their account getting deleted from database. Default is 48 hours (60*60*24*2).
| 'email_account_details' = Email with account details is sent after registration (only when 'email_activation' is FALSE).
| 'use_username' = Username is required or not.
|
| 'username_min_length' = Min length of user's username.
| 'username_max_length' = Max length of user's username.
| 'password_min_length' = Min length of user's password.
| 'password_max_length' = Max length of user's password.
|--------------------------------------------------------------------------
*/
public $allow_registration = false;
public $captcha_registration = false;
public $email_activation = false;
public $email_activation_expire = 60*60*24*2;
public $email_account_details = false;
public $use_username = TRUE;

public $username_min_length = 8;
public $username_max_length = 20;
public $password_min_length = 8;
public $password_max_length = 20;

/*
|--------------------------------------------------------------------------
| Login settings
|
| 'login_by_username' = Username can be used to login.
| 'login_by_email' = Email can be used to login.
| You have to set at least one of 2 settings above to TRUE.
| 'login_by_username' makes sense only when 'use_username' is TRUE.
|
| 'login_record_ip' = Save in database user IP address on user login.
| 'login_record_time' = Save in database current time on user login.
|
| 'login_count_attempts' = Count failed login attempts.
| 'login_max_attempts' = Number of failed login attempts before CAPTCHA will be shown.
| 'login_attempt_expire' = Time to live for every attempt to login. Default is 24 hours (60*60*24).
|--------------------------------------------------------------------------
*/
public $login_by_username = TRUE;
public $login_by_email = TRUE;
public $login_record_ip = TRUE;
public $login_record_time = TRUE;
public $login_count_attempts = TRUE;
public $login_max_attempts= 50;
public $login_attempt_expire = 60*60*24;

/*
|--------------------------------------------------------------------------
| Auto login settings
|
| 'autologin_cookie_name' = Auto login cookie name.
| 'autologin_cookie_life' = Auto login cookie life before expired. Default is 2 months (60*60*24*31*2).
|--------------------------------------------------------------------------
*/
public $autologin_cookie_name = 'autologin';
public $autologin_cookie_life = 60*60*24*31*2;

/*
|--------------------------------------------------------------------------
| Forgot password settings
|
| 'forgot_password_expire' = Time before forgot password key become invalid. Default is 15 minutes (60*15).
|--------------------------------------------------------------------------
*/
public $forgot_password_expire = 60*60*24;

/*
|--------------------------------------------------------------------------
| Captcha
|
| You can set captcha that created by Auth library in here.
| 'captcha_path' = Directory where the catpcha will be created.
| 'captcha_fonts_path' = Font in this directory will be used when creating captcha.
| 'captcha_font_size' = Font size when writing text to captcha. Leave blank for random font size.
| 'captcha_grid' = Show grid in created captcha.
| 'captcha_expire' = Life time of created captcha before expired, default is 3 minutes (180 seconds).
| 'captcha_case_sensitive' = Captcha case sensitive or not.
|--------------------------------------------------------------------------
*/
public $captcha_path = 'captcha/';
public $captcha_fonts_path = 'captcha/fonts/5.ttf';
public $captcha_width = 200;
public $captcha_height = 50;
public $captcha_font_size = 10;
public $captcha_grid= false;
public $captcha_expire = 180;
public $captcha_case_sensitive = false;

/*
|--------------------------------------------------------------------------
| reCAPTCHA
|
| 'use_recaptcha' = Use reCAPTCHA instead of common captcha
| You can get reCAPTCHA keys by registering at http://recaptcha.net
|--------------------------------------------------------------------------
*/
public $use_recaptcha = false;
public $recaptcha_public_key = '';
public $recaptcha_private_key = '';

/*
|--------------------------------------------------------------------------
| Database settings
|
| 'db_table_prefix' = Table prefix that will be prepended to every table name used by the library
| (except 'ctbl_users_sessions' table).
|--------------------------------------------------------------------------
*/
public $db_table_prefix = '';


/* End of file tank_auth.php */
/* Location: ./application/config/tank_auth.php */

}