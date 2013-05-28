<?php disallow_direct_load('page.php');?>
<?php get_header(); the_post();?>
	<div class="row page-content" id="<?=$post->post_name?>">
		<div class="span12">
			<header>
				<h1><?php the_title();?></h1>
				<p class="desc"><?=get_post_meta($post->ID, 'page_description', true);?></p>
			</header>
		</div>
		<div class="span11">
			<article>
				<?php the_content();?>
			</article>
		</div>
		<div class="span12 end-page-content"></div>
	</div>
	<?=get_below_the_fold($post->ID);?>
<?php get_footer();?>