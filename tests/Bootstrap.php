<?php
 
use Zend\ServiceManager\ServiceManager;
use    Zend\Mvc\Service\ServiceManagerConfiguration;

chdir(dirname(__DIR__));
 
include __DIR__ . '/../init_autoloader.php';
 
Zend\Mvc\Application::init(include 'config/application.config.php');