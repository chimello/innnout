<?php
    session_start();
    requireValidSession();

    setlocale(LC_TIME, 'pt-BR.uft-8');
    
    $user = $_SESSION['user'];
    $date = (new Datetime())->getTimestamp();
    $today = strftime('%A, %d de %B de %Y', $date);
    $pointDate = $_POST['pointdate'] ?? strftime('%Y-%m-%d', $date);

    $timesSelectedDay = WorkingHours::getOne(['user_id' => $user->id,
                                                'work_date' => $pointDate]);

    loadTemplateView('day_records' ,
        ['today'=> $today,
        'timesSelectedDay' => $timesSelectedDay,
        'pointDate' => $pointDate,
    ]);
?>