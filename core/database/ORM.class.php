<?php
/**
 * WIP CMS
 * Open source content management system
 *
 * @version 1.0 Alpha 1
 * @author Aeros Development
 * @copyright 2018, WIP CMS
 * @link https://aeros.com/wipcms
 *
 * @license MIT
 */

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
        $this->paths = [__dir__ . '/../entities'];
        $this->isDevMode = true;
        $this->dbParams = CONFIG['database'];
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