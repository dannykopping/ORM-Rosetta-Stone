<?php
    /**
     * Doctrine CLI configuration
     */

    use Doctrine\ORM\Tools\Console\ConsoleRunner;
    use ORMTest\Base\Registry;
    use ORMTest\Factory;

    require_once __DIR__ . '/bootstrap.php';

    $orm = Registry::get(Factory::DOCTRINE2);
    $entityManager = $orm->getEntityManager();

    $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
        'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
        'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
    ));