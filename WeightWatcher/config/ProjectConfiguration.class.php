<?php
//require_once dirname(__FILE__).'/..\lib\vendor\symfony\lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');


  }

  static protected $zendLoaded = false;

  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }

    set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Search/Lucene.php';
    Zend_Loader_Autoloader::getInstance();
   // Zend_Loader::registerAutoload('Zend_Loader', false);
    self::$zendLoaded = true;
  }
}