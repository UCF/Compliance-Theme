<?php disallow_direct_load('home.php');?>
<?php get_header(); ?>
<?php
	$options 		= get_option(THEME_OPTIONS_NAME);
	$home_content 	= apply_filters('the_content', $options['home_content']);
	$news_stories   = get_posts(array(
						'numberposts' => 3,
						'orderby'     => 'date',
						'order'       => 'DESC',
						'post_type'   => 'post',
						'exclude'   => 'newsletter'
						)
					);
?>
	<div class="row page-content" id="home">
		<div class="span9">
			<article>
				<?=$home_content;?>
			</article>
		</div>
		<div class="span3" id="announcements">
			<h3>News &amp; Updates</h3>
			<ul class="unstyled">
			<?php foreach($news_stories as $story) { ?>
				<li>
					<a href="<?=get_page_link($story->ID)?>"><?=$story->post_title?></a>
				</li>
			<?php } ?>
			</ul>
		</div>
		<hr class="span12" />
	</div>
	<?=get_home_featured_content();?>
	
<?=get_below_the_fold();?>

<?php get_footer();?>