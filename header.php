<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?="\n".header_()."\n"?>
		<?php if(GA_ACCOUNT or CB_UID):?>
		
		<script type="text/javascript">
			var _sf_startpt = (new Date()).getTime();
			<?php if(GA_ACCOUNT):?>
			
			var GA_ACCOUNT  = '<?=GA_ACCOUNT?>';
			var _gaq        = _gaq || [];
			_gaq.push(['_setAccount', GA_ACCOUNT]);
			_gaq.push(['_setDomainName', 'none']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			<?php endif;?>
			<?php if(CB_UID):?>
			
			var CB_UID      = '<?=CB_UID?>';
			var CB_DOMAIN   = '<?=CB_DOMAIN?>';
			<?php endif?>
			
		</script>
		<?php endif;?>
		
		<!--[if IE]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script type="text/javascript">
			var PostTypeSearchDataManager = {
				'searches' : [],
				'register' : function(search) {
					this.searches.push(search);
				}
			}
			var PostTypeSearchData = function(column_count, column_width, data) {
				this.column_count = column_count;
				this.column_width = column_width;
				this.data         = data;
			}
		</script>

		<!-- Typekit Embedded JS -->
		<script src="https://use.typekit.net/hxx8fev.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		
	</head>
	<body class="<?=body_classes()?> <?php if (is_home()) { ?>body-home<?php } ?>">
		<div class="bgwrap">
			<div class="container">

				<!-- Variable to check if a Newsletter Post Page is Displaying -->
				<?php 
					wp_reset_postdata(); 
					$page_id = get_the_ID(); 
					$post_objects = get_field('post_objects', $page_id); 

					$newsletter_header = '';

					if ( is_singular( 'newsletter' ) || is_post_type_archive( 'newsletter' ) || $post_objects ) { $newsletter_header = 'newsletter-header'; }
				?>

				<div class="<?php echo $newsletter_header; ?>">

					<div class="<?php echo $newsletter_header; ?> row">
						<div id="header" class="span12">
							<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
						</div>
					</div>
					<?php wp_nav_menu(array(
						'theme_location' => 'header-menu', 
						'container' => 'div',
						'container_class' => 'row', 
						'container_id' => 'header-menu-wrap',
						'menu_class' => ''.$newsletter_header.' span12 menu '.get_header_styles(), 
						'menu_id' => 'header-menu', 
						'walker' => new Bootstrap_Walker_Nav_Menu()
						));
					?>
				</div>
				<?php wp_reset_postdata(); ?>