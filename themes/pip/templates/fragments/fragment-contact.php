<?php
	$contact_header     = get_sub_field('contact-header');
	$contact_content    = get_sub_field('contact-content');
	$contact_location   = get_sub_field('contact-location');
	$contact_form       = get_sub_field('contact-form');
	$contact_form_bgc   = get_sub_field('contact-form-bgcolor');
?>
<article class="fragment fragment--contact container-fluid">
	<?php
		if ($contact_header) {
			?>
			<header class="row">
				<h1><?php echo $contact_header; ?></h1>
			</header>
			<?php
		}
	?>
	<section class="row">
		<?php
			if ($contact_content) {
				?>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 content">
							<?php echo $contact_content; ?>
              <br /><br />
						</div>
					</div>
				</div>
				<?php
			}

			if ($contact_location) {
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="contact--location">
							<div class="contact--location__map" style="width: 100%; height: 600px;" data-latitude="<?php echo $contact_location['lat']; ?>" data-longitude="<?php echo $contact_location['lng']; ?>" data-address="<?php echo $contact_location['address']; ?>"></div>
						</div>
					</div>
				</div>
				<?php
			}

			if ($contact_form) {
				?>
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-push-2 contact--form"<?php if ($contact_form_bgc) : ?> style="background-color: rgb(<?php echo Roots\Sage\Extras\hex2RGB($contact_form_bgc, true); ?>);"<?php endif; ?>>
							<?php
								gravity_form($contact_form, false, false, false, '', true, 1);
								gravity_form_enqueue_scripts($contact_form, true);
							?>
						</div>
					</div>
				</div>
				<?php
			}
		?>
	</section>
</article>
