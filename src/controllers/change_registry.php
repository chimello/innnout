<?php

    session_start();
    requireValidSession();

    $user = $_SESSION['user'];
    $date = (new Datetime())->getTimestamp();
    $date = strftime('%Y-%m-%d', $date);
    
    if($_POST['pointdate'] < '1970-01-01') {
        $_POST['pointdate'] = strftime('%Y-%m-%d', $date);
    }

    $pointDate = strftime('%Y-%m-%d', $_POST['pointdate']); //?? strftime('%Y-%m-%d', $date);

    $_POST['altertime1'] = $timesSelectedDay->time1;
    $_POST['altertime2'] = $timesSelectedDay->time2;
    $_POST['altertime3'] = $timesSelectedDay->time3;
    $_POST['altertime4'] = $timesSelectedDay->time4;

    $altertime1 = $_POST['altertime1'];
    $records = WorkingHours::loadFromUserAndDate($user->id, $pointDate);
    $timesSelectedDay = WorkingHours::getOne(['user_id' => $user->id,
                                                'work_date' => $pointDate]);

    try {
        $currentTime = strftime('%H:%M:%S', time());
        $secondtest = $timesSelectedDay->time1;
        $timetest = $_POST['altertime1'];

        if ($altertime1 > 0) {
            $currentTime = $_POST['altertime1'];
        }


        $records->innout($timesSelectedDay); //bate o ponto
        addSuccessMsg('Ponto Inserido com Sucesso!');
    } catch (AppException $e) {
        addErrorMsg($e->getMessage());
    }

    header('Location: change_record.php');

?>