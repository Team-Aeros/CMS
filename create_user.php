<?php
// create_user.php
use WIPCMS\core\database\ORM;

require_once "config/cli-config.php";

$newUsername = $argv[1];

$user = new User();
$user->setUsername($newUsername);

$entityManager = ORM::getInstance()->getEntityManager();
$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";
