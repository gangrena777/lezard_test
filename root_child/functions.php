<?php
/**
 * Child theme of Root
 * https://docs.wpshop.ru/root-child/
 *
 * @package Root
 */

/**
 * Enqueue child styles
 *
 * НЕ УДАЛЯЙТЕ ДАННЫЙ КОД
 */
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', 100);
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'root-style-child', get_stylesheet_uri(), array( 'root-style' )  );
}

/**
 * НИЖЕ ВЫ МОЖЕТЕ ДОБАВИТЬ ЛЮБОЙ СВОЙ КОД
 */
 
register_sidebar(
		array(
			'name'          => esc_html__( 'frontpage1', '' ),
			'id'            => 'frontpage1',
			'description'   => esc_html__( 'frontpage1', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'Под слайдером', '' ),
			'id'            => 'underslider',
			'description'   => esc_html__( 'frontpage1', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

register_sidebar(
		array(
			'name'          => esc_html__( 'frontpage2', '' ),
			'id'            => 'frontpage2',
			'description'   => esc_html__( 'frontpage2', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'frontpage3', '' ),
			'id'            => 'frontpage3',
			'description'   => esc_html__( 'frontpage3', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'frontpage4', '' ),
			'id'            => 'frontpage4',
			'description'   => esc_html__( 'frontpage4', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'лого 1', '' ),
			'id'            => 'header0',
			'description'   => esc_html__( 'текст НАД лого', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'лого 2', '' ),
			'id'            => 'header01',
			'description'   => esc_html__( 'текст ПОД лого', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

register_sidebar(
		array(
			'name'          => esc_html__( 'подвал слева', '' ),
			'id'            => 'footer0',
			'description'   => esc_html__( '', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'подвал центр', '' ),
			'id'            => 'footer01',
			'description'   => esc_html__( '', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'подвал центр2', '' ),
			'id'            => 'footer012',
			'description'   => esc_html__( '', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
register_sidebar(
		array(
			'name'          => esc_html__( 'под поиск', '' ),
			'id'            => 'searchbox',
			'description'   => esc_html__( '', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	 
register_sidebar(
		array(
			'name'          => esc_html__( 'подвал справа', '' ),
			'id'            => 'footer02',
			'description'   => esc_html__( '', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);


register_sidebar(
		array(
			'name'          => esc_html__( 'header2', '' ),
			'id'            => 'header2',
			'description'   => esc_html__( 'header2', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	
register_sidebar(
		array(
			'name'          => esc_html__( 'header3', '' ),
			'id'            => 'header3',
			'description'   => esc_html__( 'header3', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

register_sidebar(
		array(
			'name'          => esc_html__( 'forsearch', '' ),
			'id'            => 'forsearch',
			'description'   => esc_html__( 'forsearch', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

register_sidebar(
		array(
			'name'          => esc_html__( 'right sidebar', '' ),
			'id'            => 'rightside',
			'description'   => esc_html__( 'rightside', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

 
add_filter( 'user_trailingslashit', 'no_page_slash', 70, 2 );
function no_page_slash( $string, $type ){
   global $wp_rewrite;

	if( 'page' === $type && $wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes )
		$string = untrailingslashit( $string );

   return $string;
}

function get_url( $page ) {
		return ( 'multipart' == $this->type ) ? untrailingslashit(get_multipage_link( $page )) : untrailingslashit(get_pagenum_link( $page ));
	}



add_theme_support( 'yoast-seo-breadcrumbs' );

function get_crumb_array(){
	
	/*
	echo '<xmp>';
	var_export(yoast_breadcrumb('', '', false));
	echo '</xmp>';
*/
	
	$crumb = array();
	//var_export($crumb);
	//Get all preceding links before the current page
	$dom = new DOMDocument('1.0', "UTF-8");
	$dom->loadHTML('<?xml encoding="UTF-8">' . yoast_breadcrumb('', '', false));
	$items = $dom->getElementsByTagName('a');
	
	foreach ($items as $tag)
		$crumb[] =  array('text' => $tag->nodeValue, 'href' => $tag->getAttribute('href'));			
	
	//Get the current page text and href 
	$items = new DOMXpath($dom);
	$dom = $items->query('//*[contains(@class, "breadcrumb_last")]');
	
	$crumb[] = array('text' => $dom->item(0)->nodeValue, 'href' => trailingslashit(home_url($wp->request)));
	return $crumb;
}

function crumb_nav($crumb){
	$html = '';
	if($crumb) {
		/*echo "<pre>";
		var_dump($crumb);
		echo "</pre>";*/
		$items = count($crumb) - 1;
		$html = '<nav>';
		$html .= '<div id="breadcrumbs" class="breadcrumbs">';
		foreach($crumb as $k => $v){
		//for ($i=0;$i<=count($crumb);$i++) {
			$html .= '<span class="breadcrumb-list">';
			if($k == $items) { //If it's the last item then output the text only
				$html .= $v['text'];
			}
			else //preceding items with URLs
				$html .= sprintf('<a href="%s">%s</a> &raquo; ', $v['href'], $v['text']);
			 $html .='</span>';
		}
		 $post_id = get_the_ID();
		 $values = get_post_meta( $post_id, '_yoast_wpseo_bctitle' );
		 if ($values[0]=="") { 
				$value=get_the_title(); 
		 }
				else $value=$values[0];
		$html .=  '<span class="breadcrumb-list">'.$value.'</span>';
		$html .=  '</div>';
		$html .= '</nav>';
	}
	return $html;
}
//remove_filter( 'the_content', 'wpautop' );


/**
 * отключает замену кавычек в Вордпресс
 */
 
 if ( function_exists('remove_filter') ) {
remove_filter('the_content', 'wptexturize');
remove_filter('the_title', 'wptexturize');
remove_filter('comment_text', 'wptexturize');
}

/**
 * Добавляет троеточие в описании похожих записей в рубриках
 */
function do_excerpt( $string, $word_limit ) {
    $string = strip_tags($string);
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit)
        array_pop($words);
    $end = trim(implode(' ', $words));

    $ret = $end;
    if ( is_single() || is_category()) $ret = $ret . '...';
    return $ret;
}


function show_template() {
  if( is_super_admin() ){
      global $template;
      print_r($template);
  }
}
add_action('wp_footer', 'show_template');
