<header class="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <a class="toggle" href="javascript:;" data-toggle="nav-primary"><i class="zmdi zmdi-menu"></i></a>
    <div class="addendum">
      <?php dynamic_sidebar('sidebar-header'); ?>
    </div>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => false]);
      endif;
      ?>
    </nav>
  </div>
  <?php if ( $site_banner = get_field( 'site-banner', 'option' ) ) : ?>
    <aside class="site-banner">
      <?php echo wpautop( $site_banner ); ?>
    </aside>
  <?php endif; ?>
</header>
