<?php
/**
 * Created by PhpStorm.
 * User: dest
 * Date: 28/01/16
 * Time: 07:00 PM
 */

namespace GestionBundle\DependencyInjection;

use Symfony\Component\DependencyInjection;


class GestionBundleExtension extends Extension
{
    public function load(array $cocnfig, ContainerBuilder $container)
    {
        $loader = new Loader\YmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('admin.yml');
    }
}

