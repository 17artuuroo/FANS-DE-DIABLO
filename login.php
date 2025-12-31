<?php
include "conexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"]; // Puede ser usuario o correo
  $password = $_POST["password"];

  $sql = "SELECT * FROM usuarios WHERE usuario=? OR correo=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $login, $login);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
      $_SESSION["usuario"] = $row["usuario"];
      header("Location: dashboard.php");
    } else {
      echo "Contraseña incorrecta";
    }
  } else {
    echo "Usuario o correo no existe";
  }
}
?>