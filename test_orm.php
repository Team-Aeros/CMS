<?php
// create_user.php
use WIPCMS\core\database\ORM;

require __DIR__ . '/config/config.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';

require_once "config/cli-config.php";
$user = new User();
$user->setName("testName");
$user->setEmail("test@test.nl");
$user->setPassword("newPassword");
$entityManager = ORM::getInstance()->getEntityManager();
$entityManager->persist($user);
$entityManager->flush();
echo "Created User with ID " . $user->getId() . "\n";