<?php
	use Roots\Sage\Titles;

	$page_linkage   = get_sub_field('cnh-linkage');

	if ($page_linkage) {
		$post           = $page_linkage;
		setup_postdata($post);
		?>
		<article class="fragment fragment--content-no-header container">
			<section class="row">
				<?php the_content(); ?>
			</section>
		</article>
		<?php
		wp_reset_postdata();
	}
?>