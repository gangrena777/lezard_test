<?php

?>

	</div><!-- #content -->
<div class="frontpage4"><?php dynamic_sidebar( 'frontpage4' ); ?></div>
<div class="blockcentr" style="display: none">
<label class="openokno" style="cursor: pointer;float: right;color: green;">Закрыть</label>
<?php echo do_shortcode('[contact-form-7 id="2703" title="Отправка заявки"]');?>
</div>

    <?php do_action( THEME_SLUG . '_after_site_content' ); ?>

    <?php
        $ad_options = get_option( 'root_ad_options' );
        $ad_visible = ( ! empty( $ad_options['r_after_site_content_visible'] ) ) ? $ad_options['r_after_site_content_visible'] : array();

        $show_ad = false;
        if ( is_front_page()    && in_array( 'home', $ad_visible ) )      $show_ad = true;
        if ( is_single()        && in_array( 'post', $ad_visible ) )      $show_ad = true;
        if ( is_page()          && in_array( 'page', $ad_visible ) )      $show_ad = true;
        if ( is_archive()       && in_array( 'archive', $ad_visible ) )   $show_ad = true;
        if ( is_search()        && in_array( 'search', $ad_visible ) )    $show_ad = true;

        if ( is_single() && in_array( 'post', $ad_visible ) ) {
            $show_ad = do_show_ad(
                $post->ID,
                isset( $ad_options['r_after_site_content_exclude'] ) ? $ad_options['r_after_site_content_exclude'] : array(),
                isset( $ad_options['r_after_site_content_include'] ) ? $ad_options['r_after_site_content_include'] : array(),
                isset( $ad_options['r_after_site_content_category_exclude'] ) ? $ad_options['r_after_site_content_category_exclude'] : array()
            );
        }

        if ( is_page() && in_array('page', $ad_visible) ) {
            $show_ad = do_show_ad(
                $post->ID,
                isset( $ad_options['r_after_site_content_exclude'] ) ? $ad_options['r_after_site_content_exclude'] : array(),
                isset( $ad_options['r_after_site_content_include'] ) ? $ad_options['r_after_site_content_include'] : array(),
                isset( $ad_options['r_after_site_content_category_exclude'] ) ? $ad_options['r_after_site_content_category_exclude'] : array()
            );
        }

        if ( ! wp_is_mobile() && ! empty( $ad_options['r_after_site_content'] ) && $show_ad ) {
            echo '<div class="b-r b-r--after-site-content container">' . do_shortcode( $ad_options['r_after_site_content'] ) . '</div>';
        }

        if ( wp_is_mobile() && ! empty( $ad_options['r_after_site_content_mob'] ) && $show_ad ) {
            echo '<div class="b-r b-r--mob b-r--after-site-content container">' . do_shortcode( $ad_options['r_after_site_content_mob'] ) . '</div>';
        }
    ?>
<div class="frontpage3"><?php  ?></div>
    <?php
        if ( ! is_singular() || 'checked' != get_post_meta( $post->ID, 'footer_menu_hide', true ) ) {
            get_template_part( 'template-parts/layout/footer', 'navigation' );
        }
dynamic_sidebar( 'frontpage3' );
        if ( ! is_singular() || 'checked' != get_post_meta( $post->ID, 'footer_hide', true ) ) {
           // get_template_part( 'template-parts/layout/footer' );
        }
    ?>

</div><!-- #page -->


<?php
echo '<div class="myfooter flex container">';
echo '<div class="inflex">'; dynamic_sidebar( 'footer0' ); echo "</div>";
echo '<div class="inflex inflex2"><div id="ikonki">'; dynamic_sidebar( 'footer01' ); 
 if ( root_get_option(  'footer_social' ) == 'yes' ) {
                    get_template_part( 'template-parts/social', 'links' );
                } 
				dynamic_sidebar( 'footer012' );  
echo "</div></div>";
echo '<div class="inflex inflex3">'; dynamic_sidebar( 'footer02' ); 

echo "</div>";
echo "</div>";

 wp_footer(); 



?>


<?php echo root_get_option( 'code_body' ) ?>

<?php
$slider_per_view = 1;

if ( root_get_option( 'structure_slider_type' ) == 'three' ) {
    $slider_per_view = apply_filters( THEME_SLUG . '_slider_three_count', 3 );
}

if ( root_get_option( 'structure_slider_type' ) == 'thumbnails' ) {
    $slider_per_view = 1;
}

if ( apply_filters( THEME_SLUG . '_slider_output', is_front_page() || is_home() ) && root_get_option( 'structure_slider_count' ) != 0 ) {
    if ( ! wp_is_mobile() || ( wp_is_mobile() && ! root_get_option( 'structure_slider_mob_disable' ) ) ) { ?>
        <!-- Initialize Swiper -->
        <script>
		
            <?php if ( root_get_option( 'structure_slider_type' ) == 'thumbnails' ) { ?>

            var wpshopSwiperThumbs = new Swiper('.js-swiper-home-thumbnails', {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                loopedSlides: 5, //looped slides should be the same
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                    },
                    900: {
                        slidesPerView: 3,
                    },
                    760: {
                        slidesPerView: 2,
                    },
                    600: {
                        slidesPerView: 1,
                    },
                },
            });

            <?php } ?>

            var wpshopSwiper = new Swiper('.js-swiper-home', {
                <?php if ( root_get_option( 'structure_slider_type' ) != 'thumbnails' ) { ?>
                slidesPerView: <?php echo $slider_per_view ?>,
                <?php } ?>
                <?php if ( root_get_option( 'structure_slider_type' ) == 'three' ) { ?>
                breakpoints: {
                    1201: {
                        slidesPerView: <?php echo $slider_per_view ?>,
                        spaceBetween: 30,
                    },
                    300: {
                        slidesPerView: 1,
                    }
                },
                <?php } ?>
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                <?php if ( is_numeric( root_get_option( 'structure_slider_autoplay' ) ) && root_get_option( 'structure_slider_autoplay' ) > 0 ) { ?>
                autoplay: {
                    delay: <?php echo root_get_option( 'structure_slider_autoplay' ) ?>,
                    disableOnInteraction: true,
                },
                <?php } ?>
                <?php if ( root_get_option( 'structure_slider_type' ) == 'thumbnails' ) { ?>
                thumbs: {
                    swiper: wpshopSwiperThumbs,
                },
                loopedSlides: 5, //looped slides should be the same
                <?php } ?>
            });
        </script>
    <?php }
} ?>
<script>
jQuery(document).ready(function($) {
    $(".openokno").click(function(){
    $(".blockcentr").slideToggle("2000");
    if($("div").hasClass("blockall"))
    $(".blockall").remove();
    else
    $(".tytoknoall").append('<div class="blockall"></div>');
    });
    $(".tytoknoall").click(function(){
    $(".blockcentr").slideToggle("2000");
    $(".blockall").remove();
    });  
	});
</script>
<script type="text/javascript">
function toggleMe(a){
var e=document.getElementById(a);
if(!e)return true;
if(e.style.display=="none"){
e.style.display="block"
} else {
e.style.display="none"
}
return true;
}
</script>
<script>// <![CDATA[

jQuery(document).ready(function($) {

/*
	$(".choose_clinic").click(function(){
		$("#menu-bokovye-razdely").toggle();
		$(this).toggleClass('choose_clinic2');
});





 */
/*
   var $button = $('.choose_clinic'),
  $text   = $('#nav_menu-4'),
  visible = false;
   $text.addClass('hide');
  
$('#chevron').addClass('fa-chevron-down');
$button.click(function(){
if ( visible ) {
	$('#chevron').removeClass('fa-chevron-up');
	$('#chevron').addClass('fa-chevron-down');
  $text.slideUp('slow',function(){
    $text.addClass('hide')
         .slideDown(0);
  });
} else {
	
	
  $text.slideUp(0,function(){
   
    $text.removeClass('hide')
         .slideDown('slow');
		 $('#chevron').removeClass('fa-chevron-down');
	$('#chevron').addClass('fa-chevron-up');
		 
  });
}
visible = ! visible;
});

*/


 var $button = $('.choose_clinic'),
  $text   = $('.widget_nav_menu'),
  visible = false;
   $text.addClass('hide');
$('#chevron').addClass('fa-chevron-down');
$button.click(function(){
if ( visible ) {
	$('#chevron').removeClass('fa-chevron-up');
	$('#chevron').addClass('fa-chevron-down');
  $text.slideUp('slow',function(){
    $text.addClass('hide')
         .slideDown(0);
  });
} else {
	
	
  $text.slideUp(0,function(){
   
    $text.removeClass('hide')
         .slideDown('slow');
		 $('#chevron').removeClass('fa-chevron-down');
	$('#chevron').addClass('fa-chevron-up');
		 
  });
}
visible = ! visible;
});


});  


	jQuery(document).ready(function(){
		
		
	
	
		jQuery('.spoiler-text').hide()
		jQuery('.spoiler').click(function(){
			jQuery(this).toggleClass("folded").toggleClass("unfolded").next().slideToggle()
		})
	})
// ]]></script>
</body>
</html>