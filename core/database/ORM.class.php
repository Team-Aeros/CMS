<?php
namespace WIPCMS\core\database;

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Helper\HelperSet;

class ORM {
    private static $_instance;
    private $paths;
    private $isDevMode;
    private $dbParams;
    private $config;
    private $entityManager;

    private function __construct()
    {
        $this->paths = ['../entities'];
        $this->isDevMode = true;
        $this->dbParams = include 'migrations-db.php';
        $this->config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
        $this->entityManager = EntityManager::create($this->dbParams, $this->config);
    }

    public static function getInstance() : ORM
    {
        if (self::$_instance == null)
            self::$_instance = new self();

        return self::$_instance;
    }

    /**
     * @return array
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @return bool
     */
    public function isDevMode()
    {
        return $this->isDevMode;
    }

    /**
     * @return mixed
     */
    public function getDbParams()
    {
        return $this->dbParams;
    }

    /**
     * @return \Doctrine\ORM\Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }
}