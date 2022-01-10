<?php
    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt-BR', 'pt-BR.uft8', 'portuguese');

    //constantes Gerais
    define('DAILY_TIME', 60 * 60 * 8);

    //pastas do projeto
    define('MODEL_PATH', realpath(dirname(__FILE__). '/../models'));
    define('VIEW_PATH', realpath(dirname(__FILE__). '/../views'));
    define('TEMPLATE_PATH', realpath(dirname(__FILE__). '/../views/template'));
    define('CONTROLER_PATH', realpath(dirname(__FILE__). '/../controllers'));
    define('EXCEPTION_PATH', realpath(dirname(__FILE__). '/../exceptions'));

    //arquivos do projeto
    require_once(realpath(dirname(__FILE__) . '/database.php'));
    require_once(realpath(dirname(__FILE__) . '/loader.php'));
    require_once(realpath(dirname(__FILE__) . '/session.php'));
    require_once(realpath(MODEL_PATH . '/Model.php'));
    require_once(realpath(MODEL_PATH . '/User.php'));
    require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
    require_once(realpath(EXCEPTION_PATH . '/ValidationException.php'));

?>