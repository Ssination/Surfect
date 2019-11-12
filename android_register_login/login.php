<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'connect.php';

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();

    if(mysqli_num_rows($response) === 1) {

        $row = mysqli_fetch_assoc($response);

        if(password_verify($password, $row['password'])){

            $index['name'] = $row['name'];
            $index['email'] = $row['email'];

            array_push($result['login'], $index);

            $result['sucesso'] = "1";
            $result['mensagem'] = "sucesso";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            $result['sucesso'] = "0";
            $result['mensagem'] = "erro";
            echo json_encode($result);

            mysqli_close($conn);

        }
    }
}

?>