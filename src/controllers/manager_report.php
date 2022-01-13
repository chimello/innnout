<?php

    session_start();
    requireValidSession();

    $activeUsersCount = User::getActiveUsersCount();
    $absentUsers = WorkingHours::getAbsentUsers();

    $yearAndMonth = (new DateTime())->format('Y-m-d');
    $seconds = WorkingHours::getWorkedTimeInMonth($yearAndMonth);
    $hoursInMonth = explode(':', getTimeStringFromSeconds($seconds));

    loadTemplateView('manager_report', [
        'activeUsersCount' => $activeUsersCount,
        'absentUsers' => $absentUsers,
        'hoursInMonth' => $hoursInMonth
    ]);

?>