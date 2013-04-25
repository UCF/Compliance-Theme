<?php disallow_direct_load('single-person.php');?>
<?php get_header(); the_post();?>
	<div class="page-content person-profile">
		<div class="row">
			<div class="span2 details">
				<aside>
				<?
					$title = get_post_meta($post->ID, 'person_jobtitle', True);
					$image_url = get_featured_image_url($post->ID);
					$email = get_post_meta($post->ID, 'person_email', True);
					$phones = Person::get_phones($post);
				?>
				<img src="<?=$image_url ? $image_url : get_bloginfo('stylesheet_directory').'/static/img/no-photo.jpg'?>" />
				<? if(count($phones)) { ?>
				<ul class="phones unstyled">
					<? foreach($phones as $phone) { ?>
					<li><?=$phone?></li>
					<? } ?>
				</ul>
				<? } ?>
				<? if($email != '') { ?>
				<i class="icon-envelope"></i> <a class="email" href="mailto:<?=$email?>">Email</a>
				<? } ?>
				</aside>
			</div>
			<div class="span9">
				<header>
					<h1><?=$post->post_title?></h1>
					<p class="desc"><?=($title == '') ? '' : $title ?></p>
				</header>
				<article>
					<?=$content = str_replace(']]>', ']]>', apply_filters('the_content', $post->post_content))?>
				</article>
			</div>
		</div>
	</div>
	<?=get_below_the_fold();?>
<?php get_footer();?>