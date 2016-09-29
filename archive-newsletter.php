<?php disallow_direct_load('single-newsletter.php');?>
<?php get_header(); the_post();?>

<div class="row page-content" id="newsletter">

	<div id="newsletter-header">

		<div id="newletter-logo-header">

			<h1>
				<img src="<?php echo get_template_directory_uri(); ?>/static/img/integritystar-logo.png" alt="IntegrityStar UCF Compliance &amp; Ethics Newsletter" />
				<span>UCF Compliance &amp; Ethics Newsletter</span>
			</h1>

		</div>

	</div>

	<div id="newsletter-archive-container" class="container">

		<h2>Past Newsletters</h2>

		<?php while ( have_posts() ) : the_post(); ?>

			<a href="<?php the_permalink(); ?>" class="span3">
				<span><?php the_title(); ?></span>
			</a>

		<?php endwhile; ?>

	</div>

</div>

<div class="row newsletter-the-fold" id="below-the-fold">
	<div class="span4" id="below-the-fold-icon">
		<p><a href="http://compliance.ucf.edu/compliance-helpline/" onclick="_gaq.push(['_trackEvent','Compliance_Below_the_Fold_Event','Button_Click','Go_to_IntegrityLine_page'])"><img src="<?php echo get_template_directory_uri(); ?>/static/img/below-the-fold.png" alt="Speak up when you know of or suspect unethical behavior." title="The <strong>INTEGRITYLINE</strong> allows you to report ethical concerns without the fear of retaliation &mdash; <em>24/7. Secure. Anonymous.</em>" /></a></p>
	</div>
	<div class="span8" id="below-the-fold-content">
		<?php dynamic_sidebar( 'newsletter-speak-up' ); ?>
	</div>
</div>

<?php get_footer(); ?>
