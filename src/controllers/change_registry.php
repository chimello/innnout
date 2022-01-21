<?php

    session_start();
    requireValidSession();

    $user = $_SESSION['user'];
    $date = (new Datetime())->getTimestamp();
    $pointDate = $_POST['pointdate'];
    $altertime1 = $_POST['altertime1'];
    $records = WorkingHours::loadFromUserAndDate($user->id, $pointDate ?? $date);
    $timesSelectedDay = WorkingHours::getOne(['user_id' => $user->id,
                                                'work_date' => $pointDate ?? $date]);

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