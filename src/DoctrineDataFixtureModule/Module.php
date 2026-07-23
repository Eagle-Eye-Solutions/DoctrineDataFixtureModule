<?php

namespace DoctrineDataFixtureModule;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\EventManager\EventInterface;
use Laminas\ModuleManager\ModuleManager;
use DoctrineDataFixtureModule\Command\FixturesLoadCommand;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;

class Module implements ConfigProviderInterface
{
    public function init(ModuleManager $moduleManager): void
    {
        $events = $moduleManager->getEventManager()->getSharedManager();
        $events->attach('doctrine', 'loadCli.post', [$this, 'addFixturesLoadCommand']);
    }

    public function getConfig(): array
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function addFixturesLoadCommand(EventInterface $event): void
    {
        /* @var Application $application */
        $application = $event->getTarget();

        /* @var ContainerInterface $container */
        $container = $event->getParam('ServiceManager');
        $fixturesLoadCommand = new FixturesLoadCommand($container);
        $application->addCommand($fixturesLoadCommand);
    }
}
