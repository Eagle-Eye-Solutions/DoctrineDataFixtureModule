<?php

namespace DoctrineDataFixtureModule\Loader;

use Doctrine\Common\DataFixtures\Loader;
use Psr\Container\ContainerInterface;

class DataFixturesLoader extends Loader
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
