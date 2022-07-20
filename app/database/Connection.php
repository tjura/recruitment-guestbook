<?php

namespace app\database;

use app\Setting;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

/**
 * @author Tomasz Jura <jura.tomasz@gmail.com>
 */
class Connection
{
    protected EntityManager $entityManager;

    public function __construct()
    {
        $dbParams = [
            'driver' => Setting::DATABASE_DRIVER,
            'user' => Setting::DATABASE_USER,
            'password' => Setting::DATABASE_PASSWORD,
            'dbname' => Setting::DATABASE_NAME,
            'host' => Setting::DATABASE_HOST,
        ];

        $config = ORMSetup::createAttributeMetadataConfiguration(paths: ['/models']);
        $this->entityManager = EntityManager::create(connection: $dbParams, config: $config);
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

}
