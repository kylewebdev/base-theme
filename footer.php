</main>
<footer>
	<div class="container mx-auto">
		<div class="text-center">
			<span>&copy; <?php echo date_i18n('Y'); ?>. All Rights Reserved.</span>
			<span class="sep"> | </span>
			<?php printf(
				esc_html__('Created by %1$s.', '_base'),
				'<a href="https://jointmedias.com/">Joint Medias</a>'
			); ?>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>
