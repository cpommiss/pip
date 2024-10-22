<?php
	use Roots\Sage\Titles;

	$page_linkage   = get_sub_field('cwh-linkage');

	if ($page_linkage) {
		$post           = $page_linkage;
		setup_postdata($post);
		?>
		<article class="fragment fragment--content-with-header container-fluid">
			<header class="row">
				<h1><?= Titles\title(); ?></h1>
				<h2><?= Titles\subtitle(); ?></h2>
			</header>
			<section class="row">
				<div class="container">
					<?php the_content(); ?>
				</div>
			</section>
		</article>
		<?php
		wp_reset_postdata();
	}
?>