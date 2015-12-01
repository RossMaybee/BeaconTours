<?php
# Database Configuration
define( 'DB_NAME', 'wp_higg0' );
define( 'DB_USER', 'higg0' );
define( 'DB_PASSWORD', 'abCJXMxX0f1kJ3vRDQS2' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'j[H]U}qTA&Bka*j!IKwn$-jNN_.LoE;4TOy7,}aO5-v<mQSR$.2W8{a|HY`1:)us');
define('SECURE_AUTH_KEY',  'c?mNKd[_49(8#5|43+1|hR3Sd7faGDgG&?2U |~$`9i73ZnRCR0>tT/Q7L#t%,zh');
define('LOGGED_IN_KEY',    'hLGf0D*vpNf$C;aSl.As!!^++![CF<<T1< [$OImTOedmrWIq9N7pxiZ=5p[]]xl');
define('NONCE_KEY',        '}6R*nu@ywSuq3>SUq@,Zz8Tc}4$G`M-=ki>c#iV)ES>j_aRNnOIM+l|/|~=g-*]%');
define('AUTH_SALT',        '&A9_T|dewsU_03EG=(A|nK:~`%%^Z/z{W+S[a=3ghHw2ONZBueEeh}9 E{,>Y5_P');
define('SECURE_AUTH_SALT', '9I bR/R^6WX-d5%VsLdCRCtA0S0+:S4&h1W:E%}-6Vo/2e(DhH,~.aS>j`(B~j7F');
define('LOGGED_IN_SALT',   '@So|,li-oLsw3w|pMp!xFh0y-6,@!e%!s:^6+aWJA`0!SK,/yoBa0+W^-|0Ig+| ');
define('NONCE_SALT',       'L%p8{f{z(-P-piV8Yl~%`!G;(Z][y-l[>[7LZl0W<;G.$WheI>rYMnRWG~@k{|g_');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'higg0' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'bc25938d1b4a9c239875f75bc3a057ad3187c0b8' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '42866' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '104.237.143.127' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );
define( 'WP_PAGE_REVISIONS', TRUE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'higg0.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-42866', );

$wpe_special_ips=array ( 0 => '104.237.143.127', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
