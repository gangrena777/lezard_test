<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
    <?php echo root_get_option( 'code_head' ) ?>
	<script src="https://kit.fontawesome.com/3f7fff3af4.js" crossorigin="anonymous"></script>
	
	
</head>

<body <?php body_class(); ?>>
<div class="tytoknoall"></div>
<?php root_check_license(); ?>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
} ?>

<?php do_action( THEME_SLUG . '_after_body' ) ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', THEME_TEXTDOMAIN ); ?></a>

    <?php do_action( THEME_SLUG . '_before_header' ); ?>

    <?php
    if ( ! is_singular() || 'checked' != get_post_meta( $post->ID, 'header_hide', true ) ) {
        get_template_part( 'template-parts/layout/header' );
    }
    ?>

    <?php do_action( THEME_SLUG . '_after_header' ); ?>

    <?php get_template_part( 'template-parts/layout/main', 'navigation' ); ?>

    <?php do_action( THEME_SLUG . '_before_site_content' ); ?>

    <?php
    if ( apply_filters( THEME_SLUG . '_slider_output', is_front_page() || is_home() ) ) {
        if ( root_get_option( 'structure_slider_width' ) != 'content' ) {
            if ( root_get_option( 'structure_slider_count' ) && ! is_paged() || ( root_get_option( 'structure_slider_show_on_paged' ) && is_paged() ) ) {
                if ( ! wp_is_mobile() || ( wp_is_mobile() && ! root_get_option( 'structure_slider_mob_disable' ) ) ) {
                    if ( root_get_option( 'structure_slider_width' ) == 'full' ) echo '<div class="container">';
                    get_template_part( 'template-parts/slider', 'posts' );
                    if ( root_get_option( 'structure_slider_width' ) == 'full' ) echo '</div>';
                }
            }
        }
    }
	$rrr = get_post_type();
	$rrr2=get_the_category();
	$rrr2=$rrr2[0]->slug;
    ?>
 
	<div id="content" class="site-content <?php root_site_content_classes() ?> template2 <?=$rrr.$rrr2?> ">

        <?php
        $ad_options = get_option( 'root_ad_options' );
        $ad_visible = ( ! empty( $ad_options['r_before_site_content_visible'] ) ) ? $ad_options['r_before_site_content_visible'] : array();

        $show_ad = false;
        if ( is_front_page()    && in_array('home', $ad_visible) )      $show_ad = true;
        if ( is_single()        && in_array('post', $ad_visible) )      $show_ad = true;
        if ( is_page()          && in_array('page', $ad_visible) )      $show_ad = true;
        if ( is_archive()       && in_array('archive', $ad_visible) )   $show_ad = true;
        if ( is_search()        && in_array('search', $ad_visible) )    $show_ad = true;

        if ( is_single() && in_array( 'post', $ad_visible ) ) {
            $show_ad = do_show_ad(
                $post->ID,
                isset( $ad_options['r_before_site_content_exclude'] ) ? $ad_options['r_before_site_content_exclude'] : array(),
                isset( $ad_options['r_before_site_content_include'] ) ? $ad_options['r_before_site_content_include'] : array(),
                isset( $ad_options['r_before_site_content_category_exclude'] ) ? $ad_options['r_before_site_content_category_exclude'] : array()
            );
        }

        if ( is_page() && in_array( 'page', $ad_visible ) ) {
            $show_ad = do_show_ad(
                $post->ID,
                isset( $ad_options['r_before_site_content_exclude'] ) ? $ad_options['r_before_site_content_exclude'] : array(),
                isset( $ad_options['r_before_site_content_include'] ) ? $ad_options['r_before_site_content_include'] : array(),
                isset( $ad_options['r_before_site_content_category_exclude'] ) ? $ad_options['r_before_site_content_category_exclude'] : array()
            );
        }

        if ( ! wp_is_mobile() && ! empty( $ad_options['r_before_site_content'] ) && $show_ad ) {
            echo '<div class="b-r b-r--before-site-content">' . do_shortcode( $ad_options['r_before_site_content'] ) . '</div>';
        }

        if ( wp_is_mobile() && ! empty( $ad_options['r_before_site_content_mob'] ) && $show_ad ) {
            echo '<div class="b-r b-r--mob b-r--before-site-content">' . do_shortcode( $ad_options['r_before_site_content_mob'] ) . '</div>';
        }
        ?>
	