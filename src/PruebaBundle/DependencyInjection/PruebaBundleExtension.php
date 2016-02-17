<?php
/**
 * Created by PhpStorm.
 * User: dest
 * Date: 4/02/16
 * Time: 05:01 PM
 */

namespace PruebaBundle\DependencyInjection;


use Symfony\Component\DependencyInjection;


class PruebaBundleExtension extends Extension
{
    public function load(array $cocnfig, ContainerBuilder $container)
    {
        $loader = new Loader\YmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('admin.yml');
    }
}