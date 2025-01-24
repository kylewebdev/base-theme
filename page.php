<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
	<section class="container mx-auto">
		<div class="prose mx-auto">
			<?php the_content(); ?>
		</div>
	</section>
<?php endwhile; ?>

<?php get_footer(); ?>
