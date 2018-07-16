<?php
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Component\Console\Helper\HelperSet;
use WIPCMS\core\database\ORM;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../autoload.php';

return new HelperSet([
    'em' => new EntityManagerHelper(ORM::getInstance()->getEntityManager()),
    'db' => new ConnectionHelper(ORM::getInstance()->getEntityManager()->getConnection()),
]);