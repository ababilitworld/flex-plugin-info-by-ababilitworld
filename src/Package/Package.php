<?php

namespace Ababilitworld\FlexPluginInfoByAbabilitworld\Package;

(defined( 'ABSPATH' ) && defined( 'WPINC' )) || die();

use Ababilitworld\FlexTraitByAbabilitworld\Trait\StaticTrait\StaticTrait;
use function Ababilitworld\{
    FlexPluginInfoByAbabilitworld\Package\Service\service as plugin_info,
};

if ( ! class_exists( '\Ababilitworld\FlexPluginInfoByAbabilitworld\Package\Package' ) ) 
{
    class Package 
    {
        use StaticTrait;

        /**
         * Static Vendor Name
         *
         * @var string
         */
        public static $vendor_name;

        /**
         * Static Vendor Package Name
         *
         * @var string
         */
        public static $package_name;

        /**
         * Static Vendor Package Version
         *
         * @var string
         */
        public static $package_version;

        /**
         * Static Vendor Package Prefix with Underscore
         *
         * @var string
         */
        public static $package_pre_unds;

        /**
         * Static Vendor Package Prefix with Hyphen
         *
         * @var string
         */
        public static $package_pre_hyph;

        /**
         * Static Package DIR
         *
         * @var string
         */
        public static $package_dir;

        /**
         * Static Package File
         *
         * @var string
         */
        public static $package_file;

        /**
         * Static Package Asset URL
         *
         * @var string
         */
        public static $package_asset_url;

        /**
         * Private Package Parent Plugin Info
         *
         * @var object
         */
        private $package_parent_plugin_info;

        /**
         * Constructor
         */
        public function __construct() 
		{
            self::set_static('vendor_name', 'ababilitworld');
            self::set_static('package_name', 'flex-plugin-info-by-ababilitworld');
            self::set_static('package_version', '1.0.0');
            self::set_static('package_pre_unds', 'flex_plugin_info_by_ababilitworld');
            self::set_static('package_pre_hyph', 'flex-plugin-info-by-ababilitworld');
            self::set_static('package_dir', __DIR__);
            self::set_static('package_file', __FILE__);
            
            $this->package_parent_plugin_info = plugin_info();
            
            if ($this->package_parent_plugin_info && isset($this->package_parent_plugin_info->parent_plugin_url)) 
            {
                self::set_static('package_asset_url', $this->package_parent_plugin_info->parent_plugin_url . '/vendor/' . self::$vendor_name. '/' . self::$package_name . '/src/Package/Asset/');
            }
            else 
            {
                self::set_static('package_asset_url', '');
            }
        }

    }

    //new Package();
	
    /**
     * Return the instance
     *
     * @return \Ababilitworld\FlexPluginInfoByAbabilitworld\Package\Package
     */
    function package() 
    {
        return Package::instance();
    }

    // take off
    //package();

		
}

?>
