<?php disallow_direct_load('home.php');?>
<?php get_header(); ?>
<?php
	$options 		= get_option(THEME_OPTIONS_NAME);
	$home_content 	= apply_filters('the_content', $options['home_content']);
?>
	<div class="row page-content" id="home">
		<div class="span12">
			<article>
				<?=$home_content;?>
			</article>
		</div>
	</div>
	<?=get_home_featured_content();?>
	
	<?=get_below_the_fold();?>
	
<?php get_footer();?>