<?php

    session_start();
    requireValidSession();

    $currentDate = new DateTime();

    $user = $_SESSION['user'];
    $registries = WorkingHours::getMonthlyReport($user->id, new DateTime());

    $report = [];
    $workday = 0;
    $sumOfWorkedTime = 0;
    $lastDay = getLastDayOfMonth($currentDate)->format('d');

    for ($day = 1; $day <= $lastDay; $day++) {
        $date = $currentDate->format('Y-m') . '-' . sprintf('%02d', $day);
        $registry = $registries[$date];
    }

    // loadTemplateView('monthly_report', ['registries' => $registries]);


?>