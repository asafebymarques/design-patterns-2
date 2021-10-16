<?php

require 'vendor/autoload.php';

$log = new Monolog\Logger("teste");
$log->pushHandler(new Monolog\Handler\StreamHandler('erros.log', Monolog\Logger::WARNING));

$log->addError("Aviso!! Deu algo errado");