<?php
/**
 * ****************************************************************************
 *   https://support.wpshop.ru/docs/general/child-themes/
 *
 * *****************************************************************************
 *
 * @package root
 */

global $big_thumbnail_image;

$is_show_thumb          = 'yes' == root_get_option( 'structure_page_thumb' ) && 'checked' != get_post_meta( $post->ID, 'thumb_hide', true );
$is_show_title          = 'checked' != get_post_meta( $post->ID, 'h1_hide', true );
$is_shop_social_top     = 'yes' == root_get_option( 'structure_page_social' ) && 'checked' != get_post_meta( $post->ID, 'share_top_hide', true );
$is_show_rating         = 'yes' == root_get_option( 'structure_page_rating' ) && 'checked' != get_post_meta( $post->ID, 'rating_hide', true );
$is_show_social_bottom  = 'yes' == root_get_option( 'structure_page_social_bottom' ) && 'checked' != get_post_meta( $post->ID, 'share_bottom_hide', true );
$is_show_related_posts  = 'checked' != get_post_meta( $post->ID, 'related_posts_hide', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( ! $big_thumbnail_image ) : ?>

        <?php if ( $is_show_title ) { ?>
            <header class="entry-header">
                <?php do_action( THEME_SLUG . '_page_before_title' ); ?>
                <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                <?php do_action( THEME_SLUG . '_page_after_title' ); ?>
				
		



            </header><!-- .entry-header -->
        <?php } ?>

        <?php
        if ( $is_shop_social_top ) {
            echo '<div class="entry-meta"><span class="b-share b-share--small">';
            get_template_part( 'template-parts/social', 'buttons' );
            echo '</span></div>';
        }
        ?>

        <?php
        $thumb = get_the_post_thumbnail( $post->ID, apply_filters( THEME_SLUG . '_page_thumbnail', 'full' ), array( 'itemprop'=>'image' ) );
        if ( $is_show_thumb && ! empty( $thumb ) ) : ?>
            <div class="entry-image">
                <?php echo $thumb ?>
            </div>
        <?php else : ?>
          
        <?php endif; ?>

    <?php endif; ?>
<div class="incontent">
    <div class="entry-content" itemprop="articleBody">
			<?php  
					$breadcrumbs_display = root_get_option( 'breadcrumbs_display' );
					if ( 'yes' == $breadcrumbs_display ) :
						$breadcrumbs_service = 'self';
						if ( function_exists( 'yoast_breadcrumb' ) ) {
							 $wpseo_titles = get_option( 'wpseo_titles' );
					//echo $image = get_field( '_yoast_wpseo_bctitle', false, false );
							//yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
							echo crumb_nav(get_crumb_array());		
							if ( $wpseo_titles['breadcrumbs-enable'] ) $breadcrumbs_service = 'yoast';
						}
						if ( $breadcrumbs_service == 'yoast' ) {
							//yoast_breadcrumb( '<div class="breadcrumb" id="breadcrumbs">','</div>' );
						} else {
						   // echo wpshop_breadcrumbs();
						}
					endif; 
?> 
        <?php
            do_action( THEME_SLUG . '_page_before_the_content' );
            the_content();
            do_action( THEME_SLUG . '_page_after_the_content' );

            wp_link_pages( array(
                'before'        => '<div class="page-links">' . esc_html__( 'Pages:', THEME_TEXTDOMAIN ),
                'after'         => '</div>',
                'link_before'   => '<span class="page-links__item">',
                'link_after'    => '</span>',
            ) );
			
			
			
     
	// код поделиться start 
	
        ?>
		
		<div class="b-share b-share--post">
        <?php if ( apply_filters( THEME_SLUG . '_social_share_title_show', true ) ) : ?>
            <div class="b-share__title"><?php echo apply_filters( THEME_SLUG . '_social_share_title', __( 'Like this post? Please share to your friends:', THEME_TEXTDOMAIN ) ) ?></div>
        <?php endif; ?>

        <?php do_action( THEME_SLUG . '_single_before_social' ) ?>
        <?php get_template_part( 'template-parts/social', 'buttons' ) ?>
        <?php do_action( THEME_SLUG . '_single_after_social' ) ?>
    </div>
	
	
	
	<?php
	
	// код поделиться end 
	
if ( $is_show_related_posts ) {
    do_action( THEME_SLUG . '_page_before_related' );
    get_template_part( 'template-parts/related', 'posts' );
    do_action( THEME_SLUG . '_page_after_related' );
}
?>	
    </div><!-- .entry-content -->
	<?php 
	$curpostid=get_the_ID();
	if (($curpostid!="1719") and ($curpostid!="1717")and ($curpostid!="1305")) {
		echo '<div class="rightbox">';
		echo '<h3 class="right_title"><a href="otzyiv">Отзывы</a></h3>';
		//$query = new WP_Query( 'category_name=otziv' );
// задаем нужные нам критерии выборки данных из БД
$args = array(
	
	'category_name' => 'otzyiv',
	'orderby' => 'rand',
	'posts_per_page' => '1'
	
);

$query = new WP_Query( $args );
function mbCutString($str, $length, $postfix='...', $encoding='UTF-8')
{
    if (mb_strlen($str, $encoding) <= $length) {
        return $str;
    }
 
    $tmp = mb_substr($str, 0, $length, $encoding);
    return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
}
// Цикл
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); 
		$link=get_page_uri( $query->ID() );
		$txt=get_the_content();
		$txt=strip_tags($txt);
		$txt=mbCutString($txt,'350', '...', 'UTF-8');
		echo '<div class="right_review">'.$txt.'...<a href="/'.$link.'">Подробнее</a></div>';
		
	}
} else {
	// Постов не найдено
}
// Возвращаем оригинальные данные поста. Сбрасываем $post.
wp_reset_postdata();

echo '<h3 class="right_title"><a href="news">Новости</a></h3>';	


$args = array(
	
	'category_name' => 'news',
	'posts_per_page' => '3' // количество новостей
	
);

$query = new WP_Query( $args );

// Цикл
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); 
		$link=get_page_uri( $query->ID() );
		$txt=get_the_title();
		echo '<div class="right_news">'.get_the_date().'. <a href="/'.$link.'">'.$txt.'</a></div>';
		
	}
} else {
	// Постов не найдено
}  
// Возвращаем оригинальные данные поста. Сбрасываем $post.
wp_reset_postdata();

	
		//echo "<hr>";print_r($post);echo"<hr>";
			//dynamic_sidebar( 'rightside' ); 
			echo '</div>';
			
	}
	?>
	</div> <!-- .incontent -->
</article><!-- #post-## -->


<?php if ( $is_show_rating ) { ?>
    <div class="entry-rating">
        <div class="entry-bottom__header"><?php echo apply_filters( THEME_SLUG . '_rating_title', __( 'Rating', THEME_TEXTDOMAIN ) ) ?></div>
        <?php
        $post_id = $post ? $post->ID : 0;
        $class_star_rating = new Wpshop_Star_Rating(); $class_star_rating->the_rating( $post_id, apply_filters( THEME_SLUG . '_rating_text_show', true ) );
        ?>
    </div>
<?php }




 ?>


<?php if ( $is_show_social_bottom ) { ?>
    <div class="b-share b-share--post">
        <?php if ( apply_filters( THEME_SLUG . '_social_share_title_show', true ) ) : ?>
            <div class="b-share__title"><?php echo apply_filters( THEME_SLUG . '_social_share_title', __( 'Please share to your friends:', THEME_TEXTDOMAIN ) ) ?></div>
        <?php endif; ?>

        <?php get_template_part( 'template-parts/social', 'buttons' ) ?>
    </div>
<?php } ?>





<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" content="<?php the_title(); ?>">
<meta itemprop="dateModified" content="<?php the_modified_time( 'Y-m-d' )?>">
<meta itemprop="datePublished" content="<?php the_time( 'c' ) ?>">
<meta itemprop="author" content="<?php the_author() ?>">
<?php echo get_microdata_publisher() ?>
<?php do_action( THEME_SLUG . '_content_card_meta' ); ?>