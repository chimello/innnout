<?php
    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt-BR', 'pt-BR.uft8', 'portuguese');

    //pastas do projeto
    define('MODEL_PATH', realpath(dirname(__FILE__). '/../models'));
    define('VIEW_PATH', realpath(dirname(__FILE__). '/../views'));
    define('CONTROLER_PATH', realpath(dirname(__FILE__). '/../controllers'));

    //arquivos do projeto
    require_once(realpath(dirname(__FILE__) . '/database.php'));
    require_once(realpath(dirname(__FILE__) . '/loader.php'));
    require_once(realpath(MODEL_PATH . '/Model.php'));

?>