<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcoes.php");
$conn = connection();

if (isset($_GET['idveiculo'])) {
  $id = $_GET['idveiculo'];
  $delete = "DELETE FROM veiculo WHERE idveiculo = :id";
  $delete = $conn->prepare($delete);
  $delete->bindParam(':id', $id);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header('location:dashboard.php?page=veiculo');
}

if (isset($_GET['idagencia'])) {
  $id = $_GET['idagencia'];
  $delete = "DELETE FROM agencia WHERE idagencia = :id";
  $delete = $conn->prepare($delete);
  $delete->bindParam(':id', $id);
  $conn->beginTransaction();
  $delete->execute();
  $conn->commit();
  header('location:dashboard.php?page=agencia');
}
