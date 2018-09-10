<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(
        \Psr\Container\ContainerInterface $container,
        \App\Service\Telegram\Model\Methods\Send\Message\Factory $factory
    ) {

        $a = $factory->create(1, '21');
        //$logger = $container->get('app.config');

        $logger = $this->container->get('doctrine.dbal.default_connection');
        //$a = $this->getParameter('api_user');

        $configDirectories = ['C:\OSPanel\domains\telegram-bot-platform\config'];

        $fileLocator   = new FileLocator($configDirectories);
        $yamlUserFiles = $fileLocator->locate('routes.yaml', null, false);

        $a            = file_get_contents('C:\OSPanel\domains\telegram-bot-platform\config\services.yaml');
        $configValues = Yaml::parse($a);

        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('doctrine');

        $a = 1;

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
