<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = trim($_POST["usuario"]);
    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];

    if (empty($usuario) || empty($correo) || empty($password)) {
        echo "Todos los campos son obligatorios";
        exit;
    }

    // Validar correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "Correo inválido";
        exit;
    }

    // Hashear la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Preparar INSERT
    $sql = "INSERT INTO usuarios (usuario, correo, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $usuario, $correo, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registro exitoso ✅";
    } else {
        echo "Usuario o correo ya existe ❌";
    }
}
