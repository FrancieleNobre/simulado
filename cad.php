<?php
include_once("./config/conexao.php");
include_once("./config/constantes.php");
include_once("./func/funcoes.php");

$conn = connection();
if (isset($_POST['veiculo'])) {
    $agencia = $_POST['agencia'];
    $veiculo = $_POST['veiculo'];
    $valor = $_POST['valor'];
    $stmt = $conn->prepare("INSERT INTO `saepsimu2`.`veiculo` (idagencia, veiculo, valor) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $agencia);
    $stmt->bindParam(2, $veiculo);
    $stmt->bindParam(3, $valor);
    $conn->beginTransaction();
    $stmt->execute();
    $conn->commit();
    header('location:dashboard.php?page=veiculo');
}

if (isset($_POST['nomeagencia'])) {
    $agencia = $_POST['nomeagencia'];
    $cnpj = $_POST['cnpj'];
    $stmt = $conn->prepare("INSERT INTO `saepsimu2`.`agencia` (agencia, cnpj) VALUES (?, ?)");
    $stmt->bindParam(1, $agencia);
    $stmt->bindParam(2, $cnpj);
    $conn->beginTransaction();
    $stmt->execute();
    $conn->commit();
    header('location:dashboard.php?page=agencia');
}
 