<?php
	$galleries_header   = get_sub_field('galleries-header');

	if (have_rows('galleries-data')) {
		?>
		<article class="fragment fragment--galleries container-fluid">
			<?php
				if ($galleries_header) {
					?>
					<header class="row">
						<h1><?php echo $galleries_header; ?></h1>
					</header>
					<?php
				}
			?>
			<section class="row" style="display: flex; justify-content: center;">
				<?php
					$group_id       = 1;

					while (have_rows('galleries-data')) {
						the_row();

						$gallery_header     = get_sub_field('header');
						$gallery_header_bgc = get_sub_field('bgcolor');
						$gallery_image      = get_sub_field('image');
						$gallery_photos     = get_sub_field('photos');
						?>
						<div class="col-md-8 fragment--galleries__tile" style="background-image: url(<?php echo $gallery_image['sizes']['large']; ?>);">
							<h3><a href="javascript:;" data-group="gallery-group-<?php echo $group_id; ?>"><?php echo $gallery_header; ?></a></h3>

							<ul class="fragment--galleries__images">
								<?php
									foreach ($gallery_photos as $photo) {
										?>
										<li>
											<a href="<?php echo $photo['url']; ?>"
											   class="fresco"
											   data-fresco-group="gallery-group-<?php echo $group_id; ?>"
                                               data-fresco-caption="<?php echo $photo['title']; ?>"
											   data-fresco-options="thumbnail: '<?php echo $photo['sizes']['thumbnail']; ?>'"><?php echo $photo['caption']; ?></a>
										</li>
										<?php
									}
								?>
							</ul>
						</div>
						<?php
						$group_id++;
					}
				?>
			</section>
		</article>
		<?php
	}
?>
