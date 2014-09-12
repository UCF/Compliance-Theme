<?php
require_once('functions/base.php');   			# Base theme functions
require_once('custom-taxonomies.php');  		# Where per theme taxonomies are defined
require_once('custom-post-types.php');  		# Where per theme post types are defined
require_once('functions/admin.php');  			# Admin/login functions
require_once('functions/config.php');			# Where per theme settings are registered
require_once('shortcodes.php');         		# Per theme shortcodes

//Add theme-specific functions here.

/**
 * Allow shortcodes in widgets
 **/
add_filter('widget_text', 'do_shortcode');


/**
 * Hide unused admin tools (Links, Comments, etc)
 **/
function hide_admin_links() {
	remove_menu_page('link-manager.php');
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'hide_admin_links');


/**
 * Display the Below the Fold content for this theme.
 *
 * @return string
 * @author Jo Greybill
 **/
function get_below_the_fold($post_id=null) {
	$options = get_option(THEME_OPTIONS_NAME);
	$title	 = $options['btf_title'];
	$blurb	 = apply_filters('the_content', $options['btf_blurb']);
	$cta	 = $options['btf_cta'];
	$link	 = $options['btf_link'];
	$button  = $options['btf_button'];
	$phone   = $options['btf_phone'];

	if ((!$post_id) || (is_numeric($post_id) && get_post_meta($post_id, 'page_hide_btf', true) !== 'on')) {
		ob_start();
		?>
		<div class="row" id="below-the-fold">
			<div class="span4" id="below-the-fold-icon">
				<p><a href="<?=do_shortcode($link);?>" onclick="_gaq.push(['_trackEvent','Compliance_Below_the_Fold_Event','Button_Click','Go_to_IntegrityLine_page'])"><img src="<?=THEME_IMG_URL?>/below-the-fold.png" alt="Speak up when you know of or suspect unethical behavior." title="<?=$title?>" /></a></p>
			</div>
			<div class="span8" id="below-the-fold-content">
				<h3><?=$title?></h3>
				<?=$blurb?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
	return null;
}


/**
 * Return the home page featured content.
 * This function is flexible and accounts for the number
 * of features specified in the Theme Options, returning the
 * correct Bootstrap .span's to accomodate what is specified.
 *
 * @return string
 * @author Jo Greybill
 **/
function get_home_featured_content() {
	$options 		= get_option(THEME_OPTIONS_NAME);
	$feature_cols	= 3;  // number of feature columns (max 3)
	$feature_1 		= $options['home_feature_1'];
	$feature_2 		= $options['home_feature_2'];
	$feature_3 		= $options['home_feature_3'];
	$features		= array($feature_1, $feature_2, $feature_3);

	// Set our $feature_cols value based on features
	// that point to some page content, and unset any
	// features from the $features array that don't point
	// to anything
	foreach ($features as $f) {
		switch ($f) {
			case 'none':
				$feature_cols = $feature_cols - 1;
				// This will probably unset all 'none' vals the
				// 1st time it runs, but this is ok in this case.
				unset($features[array_search($f, $features)]);
				break;
			default:
				break;
		}
	}

	// Determine the Bootstrap classes for the feature
	// pieces based on the number of features set to display
	switch ($feature_cols) {
		case 0:
			break;
		case 1:
			$spanclass = 'span12';
			break;
		case 2:
			$spanclass = 'span6';
			break;
		case 3:
		default:
			$spanclass = 'span4';
			break;
	}

	if ($feature_cols > 0) {
		ob_start();
	?>
		<div class="row" id="home-features">
			<div class="span12" id="home-features-wrap">
				<div class="row">
				<?php foreach ($features as $f) { ?>
					<?php
						$page = get_post($f);
						$title = $page->post_title;
						$desc = apply_filters('the_content', get_post_meta($f, 'page_description', true));
					?>
					<div class="<?=$spanclass?> home-feature">
						<?=get_the_post_thumbnail($f, 'thumbnail', array('class' => 'home-feature-icon'));?>
						<div class="home-feature-textwrap">
							<h3><a href="<?=get_permalink($page)?>"><?=$title?></a></h3>
							<?=$desc?>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}
}


/**
 * Add ID attribute to registered University Header script.
 **/
function add_id_to_ucfhb($url) {
    if ( (false !== strpos($url, 'bar/js/university-header.js')) || (false !== strpos($url, 'bar/js/university-header-full.js')) ) {
      remove_filter('clean_url', 'add_id_to_ucfhb', 10, 3);
      return "$url' id='ucfhb-script";
    }
    return $url;
}
add_filter('clean_url', 'add_id_to_ucfhb', 10, 3);

?>