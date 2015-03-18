<?php
    require_once 'config.php';
    require_once 'class/loader.php';
    $loader = new Loader();
    spl_autoload($loader, 'load');
