<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 21/11/15
 * Time: 17:43
 */

namespace Vtex\ApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


class Configuration implements ConfigurationInterface{

    public function getConfigTreeBuilder(){
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('vtex_api');

        $rootNode
            ->children()
                ->scalarNode('base_uri')->cannotBeEmpty()->end()
                ->arrayNode('headers')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('accept')->cannotBeEmpty()->defaultValue('application/json')->end()
                        ->scalarNode('content_type')->cannotBeEmpty()->defaultValue('application/json')->end()
                    ->end()
                ->end()
                ->arrayNode('auth')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('app_key')->cannotBeEmpty()->defaultNull()->end()
                        ->scalarNode('app_secret')->cannotBeEmpty()->defaultNull()->end()
                    ->end()
                ->end()
            ->end();


        return $treeBuilder;
    }

}