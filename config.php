<?php

include_once __DIR__ . '/global.php';

$mysql = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);

$mysql->set_charset("utf8");

if ($mysql != true) {
    echo "erro na conexão";
}
