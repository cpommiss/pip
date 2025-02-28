<?php
/**
 * @var $args array
 * @var $items array
 * @var $layouts array
 */
?>

<?php if( !empty( $instance['widget_title'] ) ) echo $args['before_title'] . esc_html( $instance['widget_title'] ) . $args['after_title'] ?>

<div class="sow-masonry-grid"
	 data-layouts="<?php echo esc_attr( json_encode( $layouts ) ) ?>">
	<?php
	if( ! empty( $items ) ) {
		foreach ( $items as $item ) {
			$src        = wp_get_attachment_image_src( $item['image'], 'full' );
			$src        = empty( $src ) ? '' : $src[0];
			$title      = empty( $item['title'] ) ? '' : $item['title'];
			$url        = empty( $item['url'] ) ? '' : $item['url'];
			$download   = empty( $item['download'] ) ? '' : wp_get_attachment_url( $item['download'] );
			$download   = ( ( empty( $download ) ) && ( !empty( $item[ 'download_fallback' ] ) ) ) ? $item[ 'download_fallback' ] : $item[ 'download' ];
			?>
			<div class="x sow-masonry-grid-item" data-col-span="<?php echo esc_attr( $item['column_span'] ) ?>"
			     data-row-span="<?php echo esc_attr( $item['row_span'] ) ?>">
                <div class="sow-masonry-grid-item-wrapper">
                    <?php if ( ! empty( $url ) ) : ?>
                    <a href="<?php echo sow_esc_url( $url ) ?>"
                        <?php foreach( $item['link_attributes'] as $att => $val ) : ?>
                            <?php if ( ! empty( $val ) ) : ?>
                                <?php echo $att.'="' . esc_attr( $val ) . '" '; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>>
                        <?php endif; ?>

                        <?php echo wp_get_attachment_image( $item['image'], 'full', false, array( 'title' => esc_attr( $title ) ) ); ?>

                        <?php if ( ! empty( $url ) ) : ?>
                    </a>
                <?php endif; ?>
                </div>

                <?php if ( ! empty( $download ) ) : ?>
                    <a href="<?php echo $download; ?>" class="sow-masonry-grid-item-download" target="_blank"><?php _e( 'Download High-resolution Version' ); ?></a>
                <?php endif; ?>
			</div>
			<?php
		}
	}
	?>

</div>
