<?php disallow_direct_load('single-newsletter.php');?>
<?php get_header(); the_post();?>

	<?php wp_reset_query(); ?>

	<?php
		$counter = 0;
		$args = array( 'post_type' => 'newsletter', 'orderby'=> 'menu_order', 'order'=>'ASC', 'posts_per_page' => -1);
		$lastposts = get_posts( $args );
		foreach($lastposts as $row) {
			$counter++;
		}
	?>

	<?php wp_reset_query(); ?>

<div class="row page-content" id="newsletter">

	<!-- Newsletter Header -->
	<div id="newsletter-header">
		<div id="newsletter-date-header">
			<p><?php the_title(); ?> 

				<?php
							if ( $counter > 1 ):
						?>

							<span>|</span> <a href="<?php echo get_post_type_archive_link( 'newsletter' ); ?>">See Previous Editions</a>

						<?php
							endif;
						?> 

			</p>
		</div>
		<div id="newletter-logo-header">
			<h1> 
				<img src="<?php echo get_template_directory_uri(); ?>/static/img/integritystar-logo.png" alt="IntegrityStar UCF Compliance &amp; Ethics Newsletter" /> 
				<span>UCF Compliance &amp; Ethics Newsletter</span> 
			</h1>
		</div>
	</div>

	<!-- Newsletter Content Container -->
	<div id="newsletter-role-container">
		<div class="row">
			<!-- Main Newsletter Articles -->
			<div id="newsletter-primary-container" class="span7">
				<?php
				if( have_rows('newsletter_main_posts') ):
					wp_reset_postdata();
					while ( have_rows('newsletter_main_posts') ) : the_row();
						$post_object = get_sub_field('newsletter_main_posts_post');
						if( $post_object ): 
							$post = $post_object;
							setup_postdata( $post ); 
				?>
					<div class="primary-article-container">		
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_field('custom_post_excerpt'); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/static/img/arrow-right.png" alt="Read More" /></a>
					</div>
				<?php	
							wp_reset_postdata();
						endif;
					endwhile;
				else :
					// no rows found
				endif;
				?>				
			</div>

			<!-- Secondary Newsletter Articles -->
			<div id="newsletter-secondary-container" class="span4">

				<?php wp_reset_postdata(); ?>

				<!-- Start Message -->
				<?php $message_from = get_field('message_from_name'); ?>
				<?php if ( get_field('message_post') != NULL ): ?>
					<?php 
						$message_post_object = get_field('message_post');
						if( $message_post_object ): 
							$post = $message_post_object;
							setup_postdata( $post ); 
					?>
					<div id="message-post-container" class="secondary-article-container">
						<div class="message-title-row row">		
							<h2><span>A message from</span><?php echo $message_from; ?></h2>
							<?php the_post_thumbnail('medium'); ?>
						</div>		
						<?php the_field('custom_post_excerpt'); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/static/img/arrow-right.png" alt="Read More" /></a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- End Message -->

				<?php wp_reset_postdata(); ?>

				<!-- Start Spotlight -->
				<?php $spotlight_header = get_field('spotlight_header'); ?>
				<?php if ( get_field('spotlight_post') != NULL ): ?>
					<?php 
						$spotlight_post_object = get_field('spotlight_post');
						if( $spotlight_post_object ): 
							$post = $spotlight_post_object;
							setup_postdata( $post ); 
					?>
					<div class="secondary-post-container">			
						<h2>
							<img src="<?php echo get_template_directory_uri(); ?>/static/img/in-the-spotlight.png" alt="In the Spotlight" />
							<?php echo $spotlight_header; ?>
						</h2>
						<?php the_field('custom_post_excerpt'); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/static/img/arrow-right.png" alt="Read More" /></a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- End Spotlight -->

				<?php wp_reset_postdata(); ?>

				<!-- Start Recognition -->
				<?php $recognition_header = get_field('recognition_header'); ?>
				<?php if ( get_field('recognition_post') != NULL ): ?>
					<?php 
						$recognition_post_object = get_field('recognition_post');
						if( $recognition_post_object ): 
							$post = $recognition_post_object;
							setup_postdata( $post ); 
					?>
					<div class="secondary-post-container">
						<h2>
							<img src="<?php echo get_template_directory_uri(); ?>/static/img/recognition.png" alt="Recognition" />
							<?php echo $recognition_header; ?>
						</h2>
						<?php the_field('custom_post_excerpt'); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/static/img/arrow-right.png" alt="Read More" /></a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- End Recognition -->

				<?php wp_reset_postdata(); ?>

				<!-- Start New Policies -->
				<?php $new_policies_header = get_field('new_policies_header'); ?>
				<?php if ( get_field('new_policies_post') != NULL ): ?>
					<?php 
						$new_policies_post_object = get_field('new_policies_post');
						if( $new_policies_post_object ): 
							$post = $new_policies_post_object;
							setup_postdata( $post ); 
					?>
					<div class="secondary-post-container">		
						<h2>
							<img src="<?php echo get_template_directory_uri(); ?>/static/img/new-policies.png" alt="New Policies" />
							<?php echo $new_policies_header; ?>
						</h2>
						<?php the_field('custom_post_excerpt'); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/static/img/arrow-right.png" alt="Read More" /></a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- End New Policies -->

				<?php wp_reset_postdata(); ?>

				<!-- Start FAQs -->
				<?php $faqs_header = get_field('faqs_header'); ?>
				<?php if ( get_field('faqs_post') != NULL ): ?>
					<?php 
						$faqs_post_object = get_field('faqs_post');
						if( $faqs_post_object ): 
							$post = $faqs_post_object;
							setup_postdata( $post ); 
					?>
					<div class="secondary-post-container">			
						<h2>
							<img src="<?php echo get_template_directory_uri(); ?>/static/img/faqs.png" alt="FAQs" />
							<?php echo $faqs_header; ?>
						</h2>
						<?php the_field('custom_post_excerpt'); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/static/img/arrow-right.png" alt="Read More" /></a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- End FAQs -->

				<?php wp_reset_postdata(); ?>

				<!-- Start Next Edition -->
				<?php $in_our_next_edition_header = get_field('in_our_next_edition_header'); ?>
				<?php if ( get_field('next_edition_post') != NULL ): ?>
					<?php 
						$next_edition_post_object = get_field('next_edition_post');
						if( $next_edition_post_object ): 
							$post = $next_edition_post_object;
							setup_postdata( $post ); 
					?>
					<div class="secondary-post-container">			
						<h2>
							<img src="<?php echo get_template_directory_uri(); ?>/static/img/in-our-next-edition.png" alt="In Our Next Edition" />
							<?php echo $in_our_next_edition_header; ?>
						</h2>
						<?php the_field('custom_post_excerpt'); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Read More <img src="<?php echo get_template_directory_uri(); ?>/static/img/arrow-right.png" alt="Read More" /></a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- End Next Edition -->

				<?php wp_reset_postdata(); ?>

			</div>
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

<?php get_footer(); ?>