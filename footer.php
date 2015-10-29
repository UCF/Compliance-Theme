				<!-- Variable to check if a Newsletter Post Page is Displaying -->
				<?php 
					wp_reset_postdata(); 
					$page_id = get_the_ID(); 
					$post_objects = get_field('post_objects', $page_id); 

					$newsletter_footer = '';

					if ( is_singular( 'newsletter' ) || is_post_type_archive( 'newsletter' ) || $post_objects ) { $newsletter_header = 'newsletter-footer'; }
				?>

				<div id="footer" class="<?php echo $newsletter_footer; ?> row">
					<?php wp_reset_postdata(); ?>
					<div class="span12" id="footer-wrap">
						<div class="row">
							<div id="footer-widget-1" class="span2">
								<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column One')):?>
									<a href="http://www.ucf.edu"><img src="<?=THEME_IMG_URL?>/logo.png" alt="University of Central Florida" title="University of Central Florida" /></a>
								<?php endif;?>
							</div>
							<div id="footer-widget-2" class="span2">
								<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column Two')):?>
									
								<?php endif;?>
							</div>
							<div id="footer-widget-3" class="span2">
								<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column Three')):?>
									
								<?php endif;?>
							</div>
							<div id="footer-widget-4" class="span4 offset2">
								<?php if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('Footer - Column Four')):?>
									<?php $options = get_option(THEME_OPTIONS_NAME);?>
									<?php if($options['site_contact'] or $options['org_name']):?>
										<?=do_shortcode('[contact-info]');?>		
									<?php endif;?>
								<?php endif;?>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</body>
	<?="\n".footer_()."\n"?>
</html>