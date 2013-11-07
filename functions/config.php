<?php

/**
 * Responsible for running code that needs to be executed as wordpress is
 * initializing.  Good place to register scripts, stylesheets, theme elements,
 * etc.
 *
 * @return void
 * @author Jared Lang
 **/
function __init__(){
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
	register_nav_menu('header-menu', __('Header Menu'));
	register_sidebar(array(
		'name' => __('Footer - Column One'),
		'id' => 'bottom-one',
		'description' => 'Far left column in footer on the bottom of pages. Intended to be used for a navigation menu.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
	register_sidebar(array(
		'name' => __('Footer - Column Two'),
		'id' => 'bottom-two',
		'description' => 'Second column from the left in footer, on the bottom of pages. Intended to be used for a navigation menu.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
	register_sidebar(array(
		'name' => __('Footer - Column Three'),
		'id' => 'bottom-three',
		'description' => 'Third column from the left in footer, on the bottom of pages. Intended to be used for a navigation menu.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
	register_sidebar(array(
		'name' => __('Footer - Column Four'),
		'id' => 'bottom-four',
		'description' => 'Far right in footer on the bottom of pages. Your site contact info appears here by default.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
	foreach(Config::$styles as $style){Config::add_css($style);}
	foreach(Config::$scripts as $script){Config::add_script($script);}

	global $timer;
	$timer = Timer::start();

	wp_deregister_script('l10n');
	set_defaults_for_options();
}
add_action('after_setup_theme', '__init__');



# Set theme constants
#define('DEBUG', True);                  # Always on
#define('DEBUG', False);                 # Always off
define('DEBUG', isset($_GET['debug'])); # Enable via get parameter
define('THEME_URL', get_bloginfo('stylesheet_directory'));
define('THEME_ADMIN_URL', get_admin_url());
define('THEME_DIR', get_stylesheet_directory());
define('THEME_INCLUDES_DIR', THEME_DIR.'/includes');
define('THEME_STATIC_URL', THEME_URL.'/static');
define('THEME_IMG_URL', THEME_STATIC_URL.'/img');
define('THEME_JS_URL', THEME_STATIC_URL.'/js');
define('THEME_CSS_URL', THEME_STATIC_URL.'/css');
define('THEME_FONT_URL', THEME_STATIC_URL.'/fonts');
define('THEME_OPTIONS_GROUP', 'settings');
define('THEME_OPTIONS_NAME', 'theme');
define('THEME_OPTIONS_PAGE_TITLE', 'Page Customization');

$theme_options = get_option(THEME_OPTIONS_NAME);
define('GA_ACCOUNT', $theme_options['ga_account']);
define('CB_UID', $theme_options['cb_uid']);
define('CB_DOMAIN', $theme_options['cb_domain']);


/**
 * Set config values including meta tags, registered custom post types, styles,
 * scripts, and any other statically defined assets that belong in the Config
 * object.
 **/
Config::$custom_post_types = array(
	'Video',
	'Document',
	'Publication',
	'Person',
	'Page',
	'Post'
);

Config::$custom_taxonomies = array(
	'OrganizationalGroups'
);

Config::$body_classes = array('default',);

/**
 * Configure theme settings, see abstract class Field's descendants for
 * available fields. -- functions/base.php
 **/
$pageobj = new Page;
Config::$theme_settings = array(
	'Home Page' => array(
		new TextareaField(array(
			'name'        => 'Home page blurb',
			'id'          => THEME_OPTIONS_NAME.'[home_content]',
			'description' => 'Content that goes at the top of the home page (above "the fold").  Allows HTML and shortcode content.',
			'value'       => $theme_options['home_content'],
		)),
		new SelectField(array(
			'name'        => 'Featured Page 1',
			'id'          => THEME_OPTIONS_NAME.'[home_feature_1]',
			'description' => 'Featured content on the home page, displayed below the home page blurb.',
			'choices'     => $pageobj->get_objects_as_options(),
			'value'       => $theme_options['home_feature_1'],
	    )),
		new SelectField(array(
			'name'        => 'Featured Page 2',
			'id'          => THEME_OPTIONS_NAME.'[home_feature_2]',
			'description' => 'Featured content on the home page, displayed below the home page blurb.',
			'choices'     => $pageobj->get_objects_as_options(),
			'value'       => $theme_options['home_feature_2'],
	    )),
		new SelectField(array(
			'name'        => 'Featured Page 3',
			'id'          => THEME_OPTIONS_NAME.'[home_feature_3]',
			'description' => 'Featured content on the home page, displayed below the home page blurb.',
			'choices'     => $pageobj->get_objects_as_options(),
			'value'       => $theme_options['home_feature_3'],
	    )),

	),
	'Below the Fold' => array(
		new TextField(array(
			'name'        => 'Below the Fold title',
			'id'          => THEME_OPTIONS_NAME.'[btf_title]',
			'description' => 'Header text for the "below the fold" area, displayed at the bottom of each page.',
			'value'       => $theme_options['btf_title'],
			'default'	  => 'Need to report a compliance concern?',
		)),
		new TextareaField(array(
			'name'        => 'Below the Fold blurb',
			'id'          => THEME_OPTIONS_NAME.'[btf_blurb]',
			'description' => 'Content that goes in the "below the fold" area.',
			'value'       => $theme_options['btf_blurb'],
			'default'	  => 'Input is essential to maintaining open communication regarding ethics and compliance at UCF. Be assured, your comments will be reviewed and handled as promptly and discreetly as possible.',
		)),
		new TextField(array(
			'name'        => 'Below the Fold call to action button text',
			'id'          => THEME_OPTIONS_NAME.'[btf_cta]',
			'description' => 'Text that goes in the blue call to action button in the "below the fold" area.  This text should be brief but specific.',
			'value'       => $theme_options['btf_cta'],
			'default'	  => 'Make a Report',
		)),
		new TextField(array(
			'name'        => 'Below the Fold call to action button link',
			'id'          => THEME_OPTIONS_NAME.'[btf_link]',
			'description' => 'Link for the blue call to action button in the "below the fold" area.  Accepts a standard URL or the [page-url] shortcode.',
			'value'       => $theme_options['btf_link'],
			'default'	  => '',
		)),
	),
	'Contact Information' => array(
		new TextField(array(
			'name'        => 'Organization Name',
			'id'          => THEME_OPTIONS_NAME.'[org_name]',
			'description' => 'The name for your organization, used when displaying your organization\'s address.',
			'value'       => $theme_options['org_name'],
			'default'	  => 'University Compliance, Ethics and Risk',
		)),
		new TextareaField(array(
			'name'        => 'Organization Address',
			'id'          => THEME_OPTIONS_NAME.'[org_address]',
			'description' => 'The address for your organization.',
			'value'       => $theme_options['org_address'],
			'default'	  => '4000 Central Florida Blvd.
Millican Hall 350
Orlando, FL  32816-0001',
		)),
		new TextField(array(
			'name'        => 'Organization Phone Number',
			'id'          => THEME_OPTIONS_NAME.'[org_phone]',
			'description' => 'The phone number for your organization.',
			'value'       => $theme_options['org_phone'],
			'default'	  => '407-823-6263',
		)),
		new TextField(array(
			'name'        => 'Organization Fax',
			'id'          => THEME_OPTIONS_NAME.'[org_fax]',
			'description' => 'The fax number for your organization.',
			'value'       => $theme_options['org_fax'],
			'default'	  => '407-823-6265',
		)),
		new TextField(array(
			'name'        => 'Contact Email',
			'id'          => THEME_OPTIONS_NAME.'[site_contact]',
			'description' => 'Contact email address that visitors to your site can use to contact you.',
			'value'       => $theme_options['site_contact'],
		)),
	),
	'Google Analytics' => array(
		new TextField(array(
			'name'        => 'Google WebMaster Verification',
			'id'          => THEME_OPTIONS_NAME.'[gw_verify]',
			'description' => 'Example: <em>9Wsa3fspoaoRE8zx8COo48-GCMdi5Kd-1qFpQTTXSIw</em>',
			'default'     => null,
			'value'       => $theme_options['gw_verify'],
		)),
		new TextField(array(
			'name'        => 'Google Analytics Account',
			'id'          => THEME_OPTIONS_NAME.'[ga_account]',
			'description' => 'Example: <em>UA-9876543-21</em>. Leave blank for development.',
			'default'     => null,
			'value'       => $theme_options['ga_account'],
		)),
	),
	'Facebook Metadata' => array(
		new RadioField(array(
			'name'        => 'Enable OpenGraph',
			'id'          => THEME_OPTIONS_NAME.'[enable_og]',
			'description' => 'Turn on the opengraph meta information used by Facebook.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_og'],
	    )),
		new TextField(array(
			'name'        => 'Facebook Admins',
			'id'          => THEME_OPTIONS_NAME.'[fb_admins]',
			'description' => 'Comma seperated facebook usernames or user ids of those responsible for administrating any facebook pages created from pages on this site. Example: <em>592952074, abe.lincoln</em>',
			'default'     => null,
			'value'       => $theme_options['fb_admins'],
		)),
	),
	'Site Styles' => array(
		new RadioField(array(
			'name'        => 'Enable Responsiveness',
			'id'          => THEME_OPTIONS_NAME.'[bootstrap_enable_responsive]',
			'description' => 'Turn on responsive styles provided by the Twitter Bootstrap framework.  This setting should be decided upon before building out subpages, etc. to ensure content is designed to shrink down appropriately.  Turning this off will enable the single 940px-wide Bootstrap layout.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['bootstrap_enable_responsive'],
	    )),
	),
);

Config::$links = array(
	array('rel' => 'shortcut icon', 'href' => THEME_IMG_URL.'/favicon.ico',),
	array('rel' => 'alternate', 'type' => 'application/rss+xml', 'href' => get_bloginfo('rss_url'),),
);


Config::$styles = array(
	array('admin' => True, 'src' => THEME_CSS_URL.'/admin.css',),
	'http://universityheader.ucf.edu/bar/css/bar.css',
	THEME_STATIC_URL.'/bootstrap/bootstrap/css/bootstrap.css',
);

if ($theme_options['bootstrap_enable_responsive'] == 1) {
	array_push(Config::$styles,
		THEME_STATIC_URL.'/bootstrap/bootstrap/css/bootstrap-responsive.css'
	);
}

array_push(Config::$styles,
	plugins_url( 'gravityforms/css/forms.css' ),
	THEME_FONT_URL.'/trocchi-fontfacekit/stylesheet.css',
	THEME_CSS_URL.'/webcom-base.css',
	get_bloginfo('stylesheet_url')
);

if ($theme_options['bootstrap_enable_responsive'] == 1) {
	array_push(Config::$styles,
		THEME_URL.'/style-responsive.css'
	);
}

Config::$scripts = array(
	array('admin' => True, 'src' => THEME_JS_URL.'/admin.js',),
	'//universityheader.ucf.edu/bar/js/university-header.js?use-bootstrap-overrides=1',
	THEME_STATIC_URL.'/bootstrap/bootstrap/js/bootstrap.js',
	array('name' => 'base-script',  'src' => THEME_JS_URL.'/webcom-base.js',),
	array('name' => 'theme-script', 'src' => THEME_JS_URL.'/script.js',),
);

Config::$metas = array(
	array('charset' => 'utf-8',),
);
if ($theme_options['gw_verify']){
	Config::$metas[] = array(
		'name'    => 'google-site-verification',
		'content' => htmlentities($theme_options['gw_verify']),
	);
}



function jquery_in_header() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.7.1.min.js');
    wp_enqueue_script( 'jquery' );
}

add_action('wp_enqueue_scripts', 'jquery_in_header');