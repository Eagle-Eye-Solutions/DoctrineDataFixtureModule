<?php
namespace DoctrineDataFixtureTest\TestAsset\Fixtures\NoSL;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FixtureA implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    }
}
