<?php disallow_direct_load('single.php');?>
<?php get_header(); the_post();?>

	<?php wp_reset_query(); ?>

	<?php
		$counter = 0;
		$args = array( 'post_type' => 'newsletter', 'orderby'=> 'menu_order', 'order'=>'ASC', 'posts_per_page' => -1);
		$lastposts = get_posts( $args );
		foreach($lastposts as $row) : 
			$counter++;
		endforeach; 
	?>

	<?php wp_reset_query(); ?>

	<?php
		$post_objects = get_field('post_objects');
		if( $post_objects ): 
	?>

		<div class="row page-content" id="newsletter">
			<div id="newsletter-header" class="single-newsletter-header">
				<div id="newsletter-date-header">	
					<p>
						<?php
							$post_objects_title_check = get_field( 'post_objects' );
							if( $post_objects_title_check ): 
								$post = $post_objects_title_check;
								setup_postdata( $post ); 
						?>
								<a href="<?php the_permalink(); ?>" class="newsletter-parent-link"><?php the_title(); ?></a>
						<?php
							endif;
						?> 

						<?php
							if ( $counter > 1 ):
						?>

							<span>|</span> <a href="<?php echo get_post_type_archive_link( 'newsletter' ); ?>">See Previous Editions</a>

						<?php
							endif;
						?> 

					</p>

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
					<h2><?php the_field('custom_post_display_title'); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

		<div class="row newsletter-the-fold" id="below-the-fold">
			<div class="span4" id="below-the-fold-icon">
				<p><a href="http://compliance.ucf.edu/compliance-helpline/" onclick="_gaq.push(['_trackEvent','Compliance_Below_the_Fold_Event','Button_Click','Go_to_IntegrityLine_page'])"><img src="<?php echo get_template_directory_uri(); ?>/static/img/below-the-fold.png" alt="Speak up when you know of or suspect unethical behavior." title="The <strong>INTEGRITYLINE</strong> allows you to confidentially report ethical concerns without the fear of retaliation &mdash; <em>24/7. Secure. Anonymous.</em>" /></a></p>
			</div>
			<div class="span8" id="below-the-fold-content">
				<?php dynamic_sidebar( 'newsletter-speak-up' ); ?>
			</div>
		</div>

	<?php else: ?>

		<?php wp_reset_postdata(); ?>

		<div class="row page-content" id="<?php $post->post_name; ?>">
			<div class="span12">
				<header>
					<h1><?php the_title();?></h1>
				</header>
			</div>
			<div class="span11">
				<article>
					<?php the_content();?>
				</article>
			</div>
		</div>

	<?php endif; ?>

<?php get_footer();?>