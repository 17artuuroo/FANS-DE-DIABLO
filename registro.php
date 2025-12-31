<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST["usuario"];
  $correo = $_POST["correo"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (usuario, correo, password) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $usuario, $correo, $password);

  if ($stmt->execute()) {
    echo "Registro exitoso";
  } else {
    echo "Usuario o correo ya existe";
  }
}
?>