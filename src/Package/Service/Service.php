<?php

namespace Ababilitworld\FlexPluginInfoByAbabilitworld\Package\Service;

(defined( 'ABSPATH' ) && defined( 'WPINC' )) || die();

use Ababilitworld\FlexTraitByAbabilitworld\Standard\Standard;

if ( ! class_exists( __NAMESPACE__.'\Service' ) ) 
{
    class Service 
    {
        use Standard;

        /**
         * Static Parent Plugin Name
         *
         * @var string
         */
        public static $parent_plugin_name;

        /**
         * Static Parent Plugin Dir
         *
         * @var string
         */
        public static $parent_plugin_dir;

        /**
         * Static Parent Plugin Url
         *
         * @var string
         */
        public static $parent_plugin_url;

        /**
         * Static Parent Plugin Info
         *
         * @var string
         */
        public static $parent_plugin_info;

        /**
         * Constructor
         */
        public function __construct() 
		{
            $this->parent_plugin_name = self::parent_plugin_name();
            $this->parent_plugin_dir = self::parent_plugin_dir();
            $this->parent_plugin_url = self::parent_plugin_url();
            $this->parent_plugin_info = self::parent_plugin_info();
        }

        public static function parent_plugin_dir() 
        {
            $backtrace = debug_backtrace();
            foreach ($backtrace as $trace) 
            {
                if (isset($trace['file']) && strpos($trace['file'], WP_PLUGIN_DIR) !== false) 
                {
                    return dirname($trace['file']);
                }
            }
            return null;
        }
    
        public static function parent_plugin_url() 
        {
            $plugin_dir = self::parent_plugin_dir();
            if ($plugin_dir) 
            {
                return plugin_dir_url($plugin_dir . '/dummy.php');
            }
            return null;
        }
    
        public static function parent_plugin_name() 
        {
            $plugin_dir = self::parent_plugin_dir();
            if ($plugin_dir) 
            {
                return basename($plugin_dir);
            }
            return null;
        }

        public static function parent_plugin_info() 
        {
            return array(
                'parent_plugin_name' => self::$parent_plugin_name,
                'parent_plugin_dir' => self::$parent_plugin_dir,
                'parent_plugin_url' => self::$parent_plugin_url
            );
        }

    }

    //new Service();
	
    /**
     * Return the instance
     *
     * @return \Ababilitworld\FlexPluginInfoByAbabilitworld\Package\Service\Service
     */
    function service() 
    {
        return Service::instance();
    }

    // take off
    //service();
		
}

?>
