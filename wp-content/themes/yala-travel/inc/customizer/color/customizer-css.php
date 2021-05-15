<?php 
function yala_travel_color_font_css(){?>
	<style type="text/css">
	<?php if( get_theme_mod('yala_travel_primary_theme_color_setting') ):?>

    .site-header .topbar {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .site-header .social li:hover a{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .site-header .nav li .dropdown li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .site-header .nav li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .site-header .nav li a::before {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .site-header .nav li:hover a,
    .site-header .nav li.active a {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .site-header .nav li .dropdown li:hover a{
        color:#fff;
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .site-header .right-nav ul li a {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .site-header .search-form button {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .hero-area .hero-welcome-text h1 span {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .hero-area .hero-welcome-text .btn:hover{
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .hero-area .hero-welcome-text .btn.primary {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .utravel-features .single-feature i{

        border: 1px solid <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .utravel-features .single-feature i:after{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .services .single-service i {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .services .single-service h2::before {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .services .single-service .btn:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .services .single-service:hover,
    .services .single-service.active{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .services .single-service:hover .btn,
    .services .single-service.active .btn {
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .fearured-trips .trip-details .content h4 a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .fearured-trips .trip-meta i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .fearured-trips .trip-price .btn {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .fearured-trips .trip-price p span {
        font-weight: 500;
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .fearured-trips .owl-carousel .owl-nav div {

        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

        border:1px solid <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .fearured-trips .owl-carousel .owl-nav div:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .fearured-trips .owl-carousel .owl-nav div.owl-prev:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .fearured-trips .owl-carousel .owl-nav div.owl-next:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .popular-countrys .single-country .content .btn{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .popular-countrys .single-country .content .btn:hover{

        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .popular-countrys .owl-carousel .owl-nav div {

        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

        border:1px solid <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .popular-countrys .owl-carousel .owl-nav div:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .popular-countrys .owl-carousel .owl-nav div.owl-prev:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .popular-countrys .owl-carousel .owl-nav div.owl-next:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .single-destination .destination-hover span i {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .img-features .feature-icon i {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .img-features .feature-content h3 a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .service-single-content .service-list li i {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .tour-sidebar .booking .form-group input:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .booking .nice-select:hover {
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .booking .nice-select li:hover {
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .single-widget.trip-details {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .tour-sidebar .single-widget.trip-details .btn:hover{

        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .single-widget.trip-details .btn.active{

        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .search input:hover{
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .search button {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .tour-sidebar .categories ul li:hover a{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .other-trips .signle-trip .text h4:hover a{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .tags li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        border-bottom-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .tour-sidebar .call-us:before{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .product-gallery .flex-control-thumbs li img.flex-active{
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .about-us .about-content ul li i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .about-service .service-icon i {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .about-service .service-content h3 a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .call-action .call-inner h3 span{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .single-blog .date a {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .single-blog .blog-bottom h4:hover a{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .blog-meta span i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .blog-meta span a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .single-blog .btn.primary:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .popular-trips .trip-middle h4 a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .popular-trips .trip-middle .meta i {

        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .popular-trips .trip-bottom .trip-left i{
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .popular-trips .trip-bottom .trip-left a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .popular-trips .trip-bottom .trip-left a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .popular-trips .trip-bottom ul li{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .top-destination .nav li a::before {

        border-top: 10px solid <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .top-destination .nav li a:hover,
    .top-destination .nav li a.active{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .top-destination .single-package:hover{

        border-bottom-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .top-destination .trip-offer {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .top-destination .trip-details .left h4:hover a{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .top-destination .trip-details .left p i {

        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .top-destination .trip-details .right span {

        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .team .team-position {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .team .team-social li.active a{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .trip-single .trip-head h2:before{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .trip-single .trip-head p span{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .trip-tab .nav-tabs li a.active,.trip-tab .nav-tabs li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        border-bottom-color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .trip-tab .tab-content .tab-pane .list li::before {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .main-sidebar .single-widget .title:before{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .main-sidebar .single-widget .title:after{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .blog-search .button:hover {
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .category-list li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .recent-post .single-post .content h5 a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .side-tags li a:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .newsletter-form a {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .blog-cta-inner .btn:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?> !important;
    }

    .blog-single-main .blog-meta .author i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .blog-single-main .blog-meta span a i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .blog-single-main .blog-meta span a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .blog-single-main blockquote {

        border-left: 3px solid <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .blog-single-main blockquote i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .share-social .content-tags .tag-inner li a:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .comments .comment-title:before{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .comments .comment-title:after{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .comments .single-comment .content a:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .comment-p-reply .reply-title:before{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .comment-p-reply.reply-title:after{

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .single-faq .faq-title a::before {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .single-faq .faq-body {
        border-top: 1px dashed <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .contact-us .title h4 {

        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .contact-us .single-contact i {

        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .contact-us .single-contact ul li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .error-page .error-inner h2 span {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .error-page .button .btn i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .error-page .button .btn:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .error-page .error-search-form .elena-btn {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .error-page .error-search-form .elena-btn:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .pagination li.active a,
    .pagination li:hover a {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .preloader-spinner {
        border: 10px solid <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .f-about .social li a:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .f-about .social li.active a{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
        border-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .f-link ul li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .tags ul li a:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .single-news h4 a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .single-contact i {
        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .f-contact p a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .copyright-content p a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .footer .footer-links li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    #scrollUp {

        color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    #scrollUp:hover{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    0, 0, 0.30);
    }

    .title-line .title-border {

        background-color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .title-line .title-border::before {

        background-color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .title-line .title-border::after {

        background-color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    .btn {

        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .breadcrumbs .bread-list {
        background: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }

    .slicknav_nav li:hover a{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .slicknav_nav li:hover a{
        background:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;

    }
    .slicknav_nav li .dropdown li a:hover{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .slicknav_nav .slicknav_arrow{
        color:<?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }
    .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
    background-color: <?php echo esc_attr(get_theme_mod('yala_travel_primary_theme_color_setting'));?>;
    }

    <?php endif;?>
</style>	
<?php
}
add_action('wp_head','yala_travel_color_font_css');