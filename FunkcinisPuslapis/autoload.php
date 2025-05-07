<?php
spl_autoload_register(function ($klase) {
    $failas = __DIR__ . '/' . str_replace('\\', '/', $klase) . '.php';

    if (file_exists($failas)) {
        require $failas;
    }
});
