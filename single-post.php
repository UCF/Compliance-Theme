<?php disallow_direct_load('single-newsletter.php');?>
<?php get_header(); the_post();?>
<div class="row page-content" id="newsletter">

	<div id="newsletter-header">

		<div id="newsletter-date-header">
							
			<p>
				<?php
					$post_objects = get_field('post_objects');

					if( $post_objects ): 

						the_title();

					endif;

				?> | <a href="<?=bloginfo('url')?>/integrity-star-newsletter/previous-editions">See Previous Editions</a></p>

		</div>

		<?php wp_reset_postdata(); ?>

		<div id="newletter-logo-header">
							
			<h1>
				<img src="<?php echo get_template_directory_uri(); ?>/static/img/integritystar-logo.png" alt="IntegrityStar UCF Compliance &amp; Ethics Newsletter" />
				<span>UCF Compliance &amp; Ethics Newsletter</span>
			</h1>

		</div>

	</div>

	<div id="newsletter-article-container">

		<div class="primary-article-container">
									
			<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>

		</div>

	</div>

</div>
<?=get_below_the_fold();?>

<?php get_footer();?>