<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // recuperar de datos
    $username = $_POST['username'];
    $password = $_POST['password'];

    // conexión base de datos
    $host = "localhost";
    $db_username = "root";
    $db_password = ""; 
    $db_name = "auth_php"; 

    $conn = new mysqli($host, $db_username, $db_password, $db_name);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    // validar la autenticación de inicio de sesión
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // inicio de sesión exitoso
        header("Location: success.html");
        exit();
    } else {
        // inicio de sesión fallido
        header("Location: error.html");
        exit();
    }

    $conn->close();
}

?>