<?php
// Datos de conexión a la base de datos
$host = "localhost";      // Servidor de la base de datos
$user = "root";           // Usuario de la base de datos
$pass = "";               // Contraseña de la base de datos
$db   = "login_db";       // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Revisar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar codificación de caracteres
$conn->set_charset("utf8");


