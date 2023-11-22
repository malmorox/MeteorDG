<?php
// Conexión a la BBDD
// function connectDB() {

    // $servername = "mysql:host=localhost"; // "51.68.47.14"
    // $username = "probador";
    // $password = "1234";
    // $dbname = "pruebas";

    // $conn = new PDO($servername, $username, $password, $dbname); // PDO

    // if ($conn->connect_error) {
    //     die("Error en la conexión a la base de datos: " . $conn->connect_error);
    // }

    // return $conn;
//}
    function connectDB() {
        $servername = "localhost"; // Server name
        $username = "probador";
        $password = "1234";
        $dbname = "pruebas";
        $charset = "utf8mb4"; // You can adjust the character set if needed
    
        try {
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
            $conn = new PDO($dsn, $username, $password);
            // Set PDO to throw exceptions on error
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }
    

?>
