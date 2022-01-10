<?php

    session_start();
    requireValidSession();

    loadModel('WorkingHours');

    $user = $_SESSION['user'];
    $records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

    try {
        $currentTime = strftime('%H:%M:%S', time());
        $records->innout($currentTime); //bate o ponto
        addSuccessMsg('Ponto Inserido com Sucesso!');
    } catch (AppException $e) {
        addErrorMsg($e->getMessage());
    }

    header('Location: day_records.php');

?>