<div class="flex abovemenu">
<div id="vkl">
          
<ul class="">

	<li class="first on">
		<a href="/kliniki">Клиники</a>	</li>
    	<li class="last ">
		<a href="/termalnye-kurorty-evropy">Курорты и спа</a>	</li>
        </ul>
		</div>
<div class="searchbox"><?php dynamic_sidebar( 'searchbox' ); ?></div>
</div>		
	<div>	
<?php

 
if ( has_nav_menu( 'header_menu' ) && ( ! is_singular() || 'checked' != get_post_meta( $post->ID, 'header_menu_hide', true ) ) ) { ?>

    <?php do_action( THEME_SLUG . '_before_main_navigation' ); ?>

    <nav id="site-navigation" class="main-navigation <?php root_navigation_main_classes() ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="main-navigation-inner <?php root_navigation_main_inner_classes() ?>">
            <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'menu_id' => 'header_menu' ) ) ?>
        </div><!--.main-navigation-inner-->
    </nav><!-- #site-navigation -->

    <?php do_action( THEME_SLUG . '_after_main_navigation' ); ?>

<?php } else { ?>

    <nav id="site-navigation" class="main-navigation <?php root_navigation_main_classes() ?>" style="display: none;"><ul id="header_menu"></ul></nav>
    <div class="container header-separator"></div>

<?php } ?>

</div>