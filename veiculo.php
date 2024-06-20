<div class="card">
    <div class="card-header">
        Agência
        <button type="button" class="btn btn-outline-success" style="margin-left: 85%;" data-bs-toggle="modal" data-bs-target="#cadastrarveiculo">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Veículo</th>
                    <th scope="col">Agência</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'config/conexao.php';
                include_once 'config/constantes.php';

                $conn = connection();

                $select = $conn->prepare("SELECT v.idveiculo, v.veiculo, a.agencia, v.valor FROM veiculo v INNER JOIN agencia a ON a.idagencia = v.idagencia");
                $conn->beginTransaction();
                $select->execute();
                $conn->commit();


                if ($select->rowCount() > 0) {
                    foreach ($select as $table) {
                        $idveiculo = $table['idveiculo'];
                        $veiculo = $table['veiculo'];
                        $agencia = $table['agencia'];
                        $valor = $table['valor'];



                ?>
                        <tr>
                            <th scope="row"><?php echo $idveiculo ?></th>
                            <td><?php echo $veiculo ?></td>
                            <td><?php echo $agencia ?></td>
                            <td><?php echo $valor ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#verveiculo<?php echo $idveiculo ?>">Ver Mais</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluirveiculo<?php echo $idveiculo ?>">Excluir</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Ver mais -->
                        <div class="modal fade" id="verveiculo<?php echo $idveiculo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5 text-white " id="h1prodcad">Ver Veículo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                        </div>
                                        <div class="col-md-7">
                                            <p><b>Código: </b><?php echo $idveiculo ?></p>
                                            <p><b>Veículo: </b><?php echo $veiculo ?></p>
                                            <p><b>Agência: </b><?php echo $agencia ?></p>
                                            <p><b>Valor: </b><?php echo $valor ?></p>
                                        </div>
                                        <center><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="excluirveiculo<?php echo $idveiculo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="delete.php" method="get">
                        <h5 class="text-danger">VOCÊ TEM CERTEZA QUE DESEJA EXCLUIR O VEÍCULO "<?php echo $veiculo ?>"??</h5>

                        <center><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Não</button>
                            <a href="delete.php?idveiculo=<?php echo $idveiculo ?>" class="btn btn-outline-danger">Sim <i class="bi bi-ban"></i></a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
                    }
                } else {
                    echo 'Nenhum produto encontrado.';
                }
?>
</tbody>
</table>


</div>
</div>

<!-- Modal cadastro-->
<div class="modal fade" id="cadastrarveiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white " id="h1prodcad">Cadastrar Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cad.php" method="post">
                    <div class="mb-3">
                        <label for="veiculo" class="form-label text-dark">Nome do Veículo:</label>
                        <input type="text" class="form-control" id="veiculo" name="veiculo">
                    </div>
                    <div class="mb-3">
                        <label for="agencia" class="form-label text-dark">Agência:</label>
                        <select class="form-select" name="agencia" id="agencia" aria-label="Default select example">
                            <?php
                            $select = $conn->prepare("SELECT * FROM agencia");
                            $conn->beginTransaction();
                            $select->execute();
                            $conn->commit();


                            if ($select->rowCount() > 0) {
                                foreach ($select as $table) {
                                    $agencia = $table['agencia'];
                            ?>
                                    <option name="agencia" id="agencia" value="1"><?php echo $agencia ?></option>
                            <?php
                                }
                            } else {
                                echo 'Nenhuma Agência encontrada.';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label text-dark">Valor</label>
                        <input type="number" class="form-control" id="valor" name="valor">
                    </div>
                    <center><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>