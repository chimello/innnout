<?php

    session_start();
    requireValidSession();

    $exception = null;

    if (count($_POST) > 0) {
        try {
            $dbUser = new User($_POST);
            $dbUser->insert();
            addSuccessMsg('Usuário Cadastrado com Sucesso!');
            $_POST = [];
        } catch (Exception $e) {
            $exception = $e;
        }
    }

    loadTemplateView('save_user', [
        'exception' => $exception
    ]);

?>