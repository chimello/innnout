<?php

    require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    require_once(dirname(__FILE__, 2) . '/src/models/Users.php');

    $user = new User(['name' => 'João', 'email' => 'joao@email.com']);
    print_r($user);

    // $sql = "SELECT * FROM users";
    // $result = DataBase::getResultFromQuery($sql);

    // while($row = $result->fetch_assoc()) {
    //     print_r($row);
    //     echo "<br>";
    // }

?>