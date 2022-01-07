<?php

    require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    require_once(dirname(__FILE__, 2) . '/src/models/Users.php');

    $user = new User(['name' => 'João', 'email' => 'joao@email.com']);
    // print_r($user);
    // $user->email = 'joao_alterado@email.com';
    // echo '<br><br>';
    // print_r($user->email);
    // $user->set('email', "joao_alterado@email.com");
    // print_r($user->__get('email'));

    // $sql = "SELECT * FROM users";
    // $result = DataBase::getResultFromQuery($sql);

    // while($row = $result->fetch_assoc()) {
    //     print_r($row);
    //     echo "<br>";
    // }

    echo $user->getSelect(['id' => 1], 'name, email');
    echo '<br>';
    echo User::getSelect(['name' => 'Chaves', 'email' => 'chaves@cod3r.com.br']);
?>