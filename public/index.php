<?php
/**
 * Ouvet PHP Framework
 * Initialize core and load all libraries.
 * Do not change any of those. Except if you know what are you doing.
 */
defined("APPLICATION_ROOT") || define("APPLICATION_ROOT", getcwd()."/../");
require_once APPLICATION_ROOT . 'conf.php';
require_once APPLICATION_ROOT . 'libs/Ouvet/Core/OuvetFrameworkInit.php';

Configuration::Init($conf);     // Initialize configuration methods
LibLoader::Init();              // Initialize and load libraries and components
Localisation::Init();           // Initialize and enable multi-language
Assets::Init();                 // Initialize and enable assets like less, js, img
Routes::Init();                 // Initialize routes configuration
Routes::Dispatcher();           // Initialize routes dispatcher

/**
 * Below you can add something for initialization
 */