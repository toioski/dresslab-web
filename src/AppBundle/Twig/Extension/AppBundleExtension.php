<?php

namespace AppBundle\Twig\Extension;

class AppBundleExtension extends \Twig_Extension
{
    private $container;
    private $gulp_rev_manifest;
    
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName() {
        return 'app_extension';
    }
    
    public function __construct($container) {
        $this->container = $container;
        
        // Gulp manifest
        $this->gulp_rev_manifest = [];
        $app_dir = $container->get('kernel')->getRootDir();
        $manifestPath = $app_dir . '/Resources/assets/rev-manifest.json';

        if (file_exists($manifestPath)) {
            $this->gulp_rev_manifest = json_decode(file_get_contents($manifestPath), TRUE);
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFilters() {
        return array(
            'gulp_asset_version' => new \Twig_Filter_Method($this, 'gulpAssetVersion')
        );
    }

    public function gulpAssetVersion($filename) {
        if (array_key_exists($filename, $this->gulp_rev_manifest)) {
            return $this->gulp_rev_manifest[$filename];
        } else {
            return $filename;
        }
    }
    
}