<?php
$conn = new mysqli("localhost", "root", "", "usuarios_db");
if ($conn->connect_error) {
  die("Error de conexión");
}
?>
