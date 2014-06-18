<?php
$conf = array(
    /*
     * Environment setting. Can be: dev, stage, test, prod
     */
	"env" => "dev",

    "dev_console" => true,

    /*
     * URI for redirect when exception occurs.
     */
	"exception_redirect_url" => array(
        "404" => "/404"
	),

    /*
     * Paths of various project parts
     */
    "system" => array(
        "controller_path" => "controllers/",
        "view_path" => "views/",
        "base_url" => "",   //e.g. www.domain.com/this-site
        "assets" => array(
            "less_full_path" => "assets/less/main.less",
            "compiled_css_full_path" => "public/css/main.css",
            "compiled_css_url" => "/css/main.css",
            "js_full_path" => "assets/javascript",
            "compiled_js_full_path" => "public/js/main.js",
            "compiled_js_url" => "/js/main.js",
            "images_assets_path" => "assets/images",
            "images_public_path" => "public/images"
        )
    ),

    /*
     * Localisation settings
     */
    "localisation" => array(
        "languages" => array("en", "lt"),
        "language" => "en",
        "locale" => "lt_LT",
        "timezone" => "Europe/Vilnius"
    )
);