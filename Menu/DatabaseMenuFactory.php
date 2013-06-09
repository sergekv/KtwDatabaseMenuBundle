<?php

/*
 * This file is part of the KtwDatabaseMenuBundle package.
 *
 * (c) Kevin T. Weber <https://github.com/kevintweber/KtwDatabaseMenuBundle/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace kevintweber\KtwDatabaseMenuBundle\Menu

use kevintweber\KtwDatabaseMenuBundle\Entity\MenuItem as KtwMenuItem;
use Knp\Menu\Silex\RouteAwareFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DatabaseMenuFactory extends RouteAwareFactory
{
    protected $container;

    /**
     * Constructor
     */
    public function __construct(UrlGeneratorInterface $generator, ContainerInterface $container)
    {
        $this->container = $container;
        $this->generator = $generator;
    }

    public function createItem($name, array $options = array())
    {
        $item = new KtwMenuItem($name, $this);

        $options = $this->buildOptions($options);
        $this->configureItem($item, $options);

        return $item;
    }
}