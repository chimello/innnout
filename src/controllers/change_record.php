<?php
    session_start();
    requireValidSession(true);

    setlocale(LC_TIME, 'pt-BR.uft-8');
    
    $user = $_SESSION['user'];
    $selectedUserId = $user->id;
    $users = null;
    if ($user->is_admin) {
        $users = User::get();
        $selectedUserId = $_POST['user'] ? $_POST['user'] : $user->id;
    }
    $selectedUser = $_POST['user'];

    $date = (new Datetime())->getTimestamp();
    $today = strftime('%A, %d de %B de %Y', $date);

    // if($_POST['pointdate'] < '1970-01-01') {
    //     $_POST['pointdate'] = strftime('%Y-%m-%d', $date);
    // }

    $pointDate = $_POST['pointdate'] ?? strftime('%Y-%m-%d', $date);

    $timesSelectedDay = WorkingHours::getOne(['user_id' => $selectedUser ?? $user->id,
                                                'work_date' => $pointDate]);

    loadTemplateView('change_record' ,
        ['today'=> $today,
        'timesSelectedDay' => $timesSelectedDay,
        'pointDate' => $pointDate,
        'users' => $users,
        'selectedUserId' => $selectedUserId,
    ]);
?>