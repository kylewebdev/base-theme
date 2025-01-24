<?php get_header(); ?>

<div class="container mx-auto">

	<div data-react-component="hello-react" data-some-prop="value" class="flex justify-center mb-4">
		<div>
			<button disabled>-</button>
			<span> 0 </span>
			<button disabled>+</button>
		</div>
	</div>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post() ?>
			<div class="prose mx-auto">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

	<?php else: ?>
		<div class="prose mx-auto">
			<?php _e('Sorry, no posts matched your criteria.', '_base'); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
