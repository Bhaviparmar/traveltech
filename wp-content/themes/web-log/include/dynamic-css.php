<?php

/**

 * Dynamic css

 * @subpackage web log

 * @return void

 
 */

if ( !function_exists('web_log_dynamic_css') ):

    function web_log_dynamic_css(){

    
    $custom_css = '';

  
  /*====================Basic Color=====================*/

    $web_log_primary_color  = web_log_get_option('primary_color');
    
    
  /*====================Primary Color =====================*/


  $custom_css .= " .site-title, .site-title a, .pagination-wrap .nav-links a, body a:hover, body a:active, .post .entry-title a:hover, .post .entry-title a:focus, .post .entry-title a:active, .main-navigation a:hover,
    li.current-menu-item a,.entry-footer .tag-list i
                  {

                      color: " . $web_log_primary_color . ";

                   }

                  ";


  $custom_css .= " .back-to-top > i, .web-log-post-grid .meta-category a, .header-breadcrumb, button:hover, button:focus, input[type='button']:hover, input[type='button']:focus, input[type='submit']:hover, input[type='submit']:focus, .widget .widget-title:before, .header-wrapper .header-top, button, input[type='button'], input[type='submit'], .read-more .link, h4.ct_post_area-title span:after, .page-header .page-title,.web-log-post-list .meta-category a,.entry-footer .edit-link a.post-edit-link,.comment-reply-link,.main-navigation li li:hover,.menu-primary-container ul li:hover,.menu-primary-container ul li.current-menu-item

                  {

                      background: " . $web_log_primary_color . ";

                   }

                  ";    



  $custom_css .= " #search-popup.popup-box-on #search input[type='search'], .header-wrapper .header-top

                  {

                      border-bottom:  1px solid " . $web_log_primary_color . ";

                   }

                  ";
  
  $custom_css .= " .entry-content blockquote

                  {

                      border-left:  5px solid " . $web_log_primary_color . ";

                   }

                  ";


    /*------------------------------------------------------------------------------------------------- */


    /*custom css*/



    wp_add_inline_style('web-log', $custom_css);



}

endif;

add_action('wp_enqueue_scripts', 'web_log_dynamic_css', 99);