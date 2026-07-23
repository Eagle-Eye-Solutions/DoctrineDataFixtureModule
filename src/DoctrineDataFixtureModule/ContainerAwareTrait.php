<?php

namespace DoctrineDataFixtureModule;

use Psr\Container\ContainerInterface;

trait ContainerAwareTrait
{
    /**
     * @var \Psr\Container\ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
