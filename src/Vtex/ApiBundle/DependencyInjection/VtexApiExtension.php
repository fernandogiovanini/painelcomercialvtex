<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 21/11/15
 * Time: 17:29
 */

namespace Vtex\ApiBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class VtexApiExtension extends Extension{

    public function load(array $configs, ContainerBuilder $container){
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this-> setParameters($container, $config);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__  . '/../Resources/config')
        );
        $loader->load('services.yml');
    }

    private function setParameters($container, $config){
        $container->setParameter('vtex_api.base_uri', $config['base_uri']);
        $container->setParameter('vtex_api.headers.accept', $config['headers']['accept']);
        $container->setParameter('vtex_api.headers.content_type', $config['headers']['content_type']);
        $container->setParameter('vtex_api.auth.app_key', $config['auth']['app_key']);
        $container->setParameter('vtex_api.auth.app_secret', $config['auth']['app_secret']);
        return $container;
    }
}