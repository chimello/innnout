<?php
//CONTROLER TEMPORÁRIO!;

    loadModel('WorkingHours');

    $wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));
    
    echo '<br>';
    $workedIntervalString = $wh->getWorkedInterval()->format('%H:%I:%S');
    print_r($workedIntervalString);
    echo '<br>';

?>