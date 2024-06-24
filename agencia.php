<div class="card">
    <div class="card-header">
        Agência
        <button type="button" class="btn btn-outline-success" style="margin-left: 85%;" data-bs-toggle="modal" data-bs-target="#cadastraragencia">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Agência</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'config/conexao.php';
                include_once 'config/constantes.php';

                $conn = connection();

                $select = $conn->prepare("SELECT * FROM agencia");
                $conn->beginTransaction();
                $select->execute();
                $conn->commit();


                if ($select->rowCount() > 0) {
                    foreach ($select as $table) {
                        $idagencia = $table['idagencia'];
                        $agencia = $table['agencia'];
                        $cnpj = $table['cnpj'];



                ?>
                        <tr>
                            <th scope="row"><?php echo $idagencia ?></th>
                            <td><?php echo $agencia ?></td>
                            <td><?php echo $cnpj ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#veragencia<?php echo $idagencia ?>">Ver Mais</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#excluiragencia<?php echo $idagencia ?>">Excluir</button>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Ver mais -->
                        <div class="modal fade" id="veragencia<?php echo $idagencia ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5 text-white " id="h1prodcad">Ver Veículo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-7">
                                            <p><b>Código: </b><?php echo $idagencia ?></p>
                                            <p><b>Agência: </b><?php echo $agencia ?></p>
                                            <p><b>CNPJ: </b><?php echo $cnpj ?></p>
                                        </div>
                                        </div>
                                        
                                        <center><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="excluiragencia<?php echo $idagencia ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Agência</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="delete.php" method="get">
                        <h5 class="text-danger">VOCÊ TEM CERTEZA QUE DESEJA EXCLUIR A AGÊNCIA "<?php echo $agencia ?>"??</h5>

                        <center><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Não</button>
                            <a href="delete.php?idagencia=<?php echo $idagencia ?>" class="btn btn-outline-danger">Sim <i class="bi bi-ban"></i></a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
                    }
                } else {
                    echo 'Nenhuma agência encontrada.';
                }
?>
</tbody>
</table>


</div>
</div>

<!-- Modal cadastro-->
<div class="modal fade" id="cadastraragencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white " id="h1prodcad">Cadastrar Agência</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cad.php" method="post">
                    <div class="mb-3">
                        <label for="nomeagencia" class="form-label text-dark">Nome da Agência:</label>
                        <input type="text" class="form-control" id="nomeagencia" name="nomeagencia">
                    </div>
                    <div class="mb-3">
                        <label for="cnpj" class="form-label text-dark">CNPJ:</label>
                        <input type="number" class="form-control" id="cnpj" name="cnpj">
                    </div>
                    <center><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>