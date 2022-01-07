<?php
    loadModel('Login');

    if (count($_POST) > 0) {
        $login = new Login($_POST);
        try {
            $user = $login->checkLogin();
            echo "Usuário {$user->name} Logado!";
        } catch (Exception $e) {
            echo "Falha no Login! Verifique seus dados";
        }
    }

    loadView('login', $_POST);

?>