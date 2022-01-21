<?php
    session_start();
    requireValidSession();
    
    $user = $_SESSION['user'];
    $date = (new Datetime())->getTimestamp();
    $today = strftime('%A, %d de %B de %Y', $date);
    $pointDate = $_POST['pointdate'] ?? $date;

    $timesSelectedDay = WorkingHours::getOne(['user_id' => $user->id,
                                                'work_date' => $pointDate]);

    loadTemplateView('change_record' ,
        ['today'=> $today,
        'timesSelectedDay' => $timesSelectedDay,
        'pointdate' => $pointDate,
    ]);
?>