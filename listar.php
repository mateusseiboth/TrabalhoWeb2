<?php
include 'cabecalho.php';
include 'banco.php';


$empresas = buscarEmpresas();

if ($empresas == null) {

?>

    <h1>Perdão, ainda não temos empresas cadastradas</h1>


<?php } else { ?>



    <div class="text-white d-flex jumbotron justify-content-center">
        <div class="card col-md-8" style="margin-top: 5%;">
            <div class="bg-dark card-header">
                <h3 class="card-title">Empresas cadastradas</h3>
            </div>
            <div class="card-body list-group list-group-flush" style="margin: 8px;">
                <table class="table table-bordered text-black" style="margin-top: 4px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="text-align: center">CNPJ</th>
                            <th style="text-align: center">Nome</th>
                            <th style="text-align: center">Telefone</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Declarações</th>
                            <th style="text-align: center">Situação</th>
                            <th style="text-align: center">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="text-black">
                        <?php foreach ($empresas as $empresa) { ?>
                            <tr>
                                <td><?= $empresa['id'] ?></td>
                                <td><?= $empresa['CNPJ'] ?></td>
                                <td><?= $empresa['nome'] ?></td>
                                <td><?= $empresa['telefone'] ?></td>
                                <td><?= $empresa['email'] ?></td>
                                <td><?= $empresa['declara'] ?></td>

                                <?php if ($empresa['ativo'] == 1) { ?>
                                    <td class="bg-success">Ativo</td>
                                <?php } else { ?>
                                    <td class="bg-danger">Inativo</td>
                                <?php } ?>

                                <td class="pull-right"><a class="btn btn-primary" href="editar.php?id=<?= $empresa['id'] ?>">Editar</a>
                                    <a class="btn btn-danger" href="mudarEstado.php?id=<?= $empresa['id'] ?>&ativo=<?= $empresa['ativo'] ?>">Ativar/Desativar</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>


                </table>


            </div>
        </div>




    </div>


<?php } ?>

<?php include "rodape.php"; ?>