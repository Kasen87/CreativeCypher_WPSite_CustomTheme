<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package materialwp
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="site-info pull-right">
						<?php printf( __( '%1$s by %2$s.', 'materialwp' ), 'Creative Cypher', '<a href="http://blue1647.com" target="_blank" rel="designer">BLUE1647</a>' ); ?>
					</div><!-- .site-info -->
				</div> <!-- col-lg-12 -->
			</div><!-- .row -->
		</div><!-- .containr -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
