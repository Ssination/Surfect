<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $primeiroNome = $_POST['primeiroNome'];
        $ultimoNome = $_POST['ultimoNome'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $numeroTelemovel = $_POST['numeroTelemovel'];
        $dataNascimento = $_POST['dataNascimento'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        require_once 'connect.php';

        $sql = "INSERT INTO users (name, surname, email, password, numeroTelemovel, birth_date) 
                VALUES ($primeiroNome, $ultimoNome, $email, $password, $numeroTelemovel, $dataNascimento)";

        if(mysqli_query($conn, $sql)){
            $result["sucesso"] = "1";
            $result["mensagem"] = "sucesso";

            echo json_encode($result);
            mysqli_close($conn);
        } 
        else {
            $result["sucesso"] = "0";
            $result["mensagem"] = "erro";

            echo json_encode($result);
            mysqli_close($conn);
        }
    }

?>