<?php
    require_once __DIR__. '/vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $server = $_ENV['DB_HOST'];
    $db = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];

    if( $conn= mysqli_connect($server, $user, $pass, $db)){
        echo "Contectado ao db";
    }else echo 'erro';

    function mostrar_data($data){
        $data2 = explode('-', $data);
        $escreve = $data2[2] ."/" .$data2[1] ."/" .$data2[0];
        return $escreve;
    }
?>