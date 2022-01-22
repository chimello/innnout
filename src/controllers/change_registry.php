<?php

    session_start();
    requireValidSession(true);

    $user = $_SESSION['user'];
    $date = (new Datetime())->getTimestamp();
    $date = strftime('%Y-%m-%d', $date);

    $pointDate = $_POST['pointdate'];
    
    $records = WorkingHours::loadFromUserAndDate($user->id, $pointDate);
    $timesSelectedDay = WorkingHours::getOne(['user_id' => $user->id,
    'work_date' => $pointDate]);
    
    $records->time1 = $_POST['altertime1'];
    $records->time2 = $_POST['altertime2'];
    $records->time3 = $_POST['altertime3'];
    $records->time4 = $_POST['altertime4'];
    $records->user_id = $_POST['user'];


    try {
        
        $records->update();
        addSuccessMsg('Ponto Alterado com Sucesso!');
    } catch (AppException $e) {
        addErrorMsg($e->getMessage());
    }

    header('Location: change_record.php');

?>