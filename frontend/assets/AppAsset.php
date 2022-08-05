<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "googleFonts",
        "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap",
        "vendor/bootstrap/css/bootstrap.min.css",
        "vendor/fontawesome-free/css/all.min.css",
        "vendor/animate/animate.compat.css",
        "vendor/simple-line-icons/css/simple-line-icons.min.css",
        "vendor/owl.carousel/assets/owl.carousel.min.css",
        "vendor/owl.carousel/assets/owl.theme.default.min.css",
        "vendor/magnific-popup/magnific-popup.min.css",
        "vendor/bootstrap-star-rating/css/star-rating.min.css",
        "vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css",
        "css/theme.css",
        "css/theme-elements.css",
        "css/theme-blog.css",
        "css/theme-shop.css",
        "css/demos/demo-auto-services.css",
        "css/skins/skin-auto-services.css",
        "css/skins/default.css",
        "css/custom.css",
        "vendor/modernizr/modernizr.min.js",

    ];
    public $js = [
        "https://www.googletagmanager.com/gtag/js?id=UA-42715764-11",
        "../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js",
        "vendor/modernizr/modernizr.min.js",
        // "vendor/jquery/jquery.min.js",
        "vendor/jquery.appear/jquery.appear.min.js",
        "vendor/jquery.easing/jquery.easing.min.js",
        "vendor/jquery.cookie/jquery.cookie.min.js",
        "vendor/bootstrap/js/bootstrap.bundle.min.js",
        "vendor/jquery.validation/jquery.validate.min.js",
        "vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js",
        "vendor/jquery.gmap/jquery.gmap.min.js",
        "vendor/lazysizes/lazysizes.min.js",
        "vendor/isotope/jquery.isotope.min.js",
        "vendor/owl.carousel/owl.carousel.min.js",
        // "vendor/magnific-popup/jquery.magnific-popup.min.js",
        "vendor/vide/jquery.vide.min.js",
        "vendor/vivus/vivus.min.js",
        // "vendor/bootstrap-star-rating/js/star-rating.min.js",
        // "vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js",
        "vendor/jquery.countdown/jquery.countdown.min.js",
        "vendor/elevatezoom/jquery.elevatezoom.min.js",
        "js/theme.js",
        "js/views/view.contact.js",
        "js/views/view.shop.js",
        "js/theme.init.js",
        "js/examples/examples.gallery.js",
        "js/demos/demo-auto-services.js",
        "https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194",
        'js/ajax.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
