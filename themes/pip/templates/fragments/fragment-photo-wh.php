<?php
	$photo_image        = get_sub_field('photo-wh-image');
	$photo_height       = get_sub_field('photo-wh-height');
	$photo_header       = get_sub_field('photo-wh-header');
	$photo_header_bgc   = get_sub_field('photo-wh-header-bgcolor');
?>
<article class="fragment fragment--photo-with-header container-fluid" style="height: <?php echo $photo_height; ?>px;">
	<?php
		if ($photo_header) {
			?>
			<header class="row">
				<h3>
					<strong<?php if ($photo_header_bgc) : ?> style="background-color: rgba(<?php echo \Roots\Sage\Extras\hex2RGB($photo_header_bgc, true); ?>, 0.8);"<?php endif; ?>><?php echo $photo_header; ?></strong>
				</h3>
			</header>
			<?php
		}
	?>
	<section class="row" style="background-image: url(<?php echo $photo_image['url']; ?>);">
		<img src="<?php echo $photo_image['sizes']['large']; ?>" alt="<?php echo $photo_header; ?>">
	</section>
</article>