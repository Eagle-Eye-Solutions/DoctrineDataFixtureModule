<?php

namespace DoctrineDataFixtureModule\Loader;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\Loader;
use DoctrineDataFixtureModule\ContainerAwareInterface;
use Psr\Container\ContainerInterface;

class DataFixturesLoader extends Loader
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function addFixture(FixtureInterface $fixture): void
    {
        if ($fixture instanceof ContainerAwareInterface) {
            $fixture->setContainer($this->container);
        }

        parent::addFixture($fixture);
    }
}
