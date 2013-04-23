			<div id="footer" class="row">
				<hr class="span12" />
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
	</body>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?="\n".footer_()."\n"?>
</html>