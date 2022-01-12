<?php

    session_start();
    requireValidSession();

    $activeUsersCount = User::getActiveUsersCount();
    $absentUsers = WorkingHours::getAbsentUsers();

    loadTemplateView('manager_report', [
        'activeUsersCount' => $activeUsersCount,
        'absentUsers' => $absentUsers
    ]);

?>