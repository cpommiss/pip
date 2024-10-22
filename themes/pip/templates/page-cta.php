<?php
	if (have_rows('slides')) {
		?>
		<article class="cta container-fluid">
			<section class="row">
				<ul class="cta--slides cycle-slideshow" data-cycle-timeout="5000" data-cycle-slides=">li">
					<?php
						while (have_rows('slides')) {
							the_row();

							$slide_image        = get_sub_field('image');
							$slide_title        = get_sub_field('title');
							$slide_content      = get_sub_field('content');
							$slide_title_bgc    = get_sub_field('title-bgcolor');
							$slide_content_bgc  = get_sub_field('content-bgcolor');
							?>
							<li class="cta--slide" style="background-image: url(<?php echo $slide_image['url']; ?>);">
								<figure>
									<img src="<?php echo $slide_image['url']; ?>" alt="<?php echo $slide_title; ?>">
									<figcaption class="container">
										<span class="cta--slide__inner row">
											<span class="cta--slide__inner_wrap">
												<?php
													if ($slide_title) {
														?>
														<span class="cta--slide__title"<?php if ($slide_title_bgc) : ?> style="background-color: rgba(<?php echo \Roots\Sage\Extras\hex2RGB($slide_title_bgc, true); ?>, 0.8);"<?php endif; ?>><?php echo $slide_title; ?></span>
														<?php
													}
													if ($slide_content) {
														?>
														<span class="cta--slide__content"<?php if ($slide_content_bgc) : ?> style="background-color: rgba(<?php echo Roots\Sage\Extras\hex2RGB($slide_content_bgc, true); ?>, 0.8);"<?php endif; ?>><?php echo $slide_content; ?></span>
														<?php
													}
												?>
											</span>
										</span>
									</figcaption>
								</figure>
							</li>
							<?php
						}
					?>
				</ul>
			</section>
		</article>
        <?php
	}