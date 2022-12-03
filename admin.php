<?php
include 'cabecalho.php';
include 'banco.php';

$declaracoes = buscarDeclaracaoTodos($_SESSION['id']);
$empresas = buscarEmpresas();

?>


<div class=" text-white d-flex jumbotron justify-content-center">
    <div class="card col-md-6" style="margin-top: 5%;">
        <div class="bg-dark card-header">
            <h3 class="card-title">Todas as declarações cadastradas</h3>
        </div>
        <div class="card-body list-group list-group-flush" style="margin: 8px;">
            <fieldset>
                <table class="table table-bordered text-black" style="margin-top: 4px; margin-right: 30px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="text-align: center">Empresa</th>
                            <th style="text-align: center">CNPJ</th>
                            <th style="text-align: center">Tipo da declaração</th>
                            <th style="text-align: center">Data de entrega</th>
                            <th style="text-align: center">Mês de referencia</th>
                            <th style="text-align: center">Cadastrado por</th>

                        </tr>
                    </thead>

                    <tbody class="text-black">
                        <?php foreach ($declaracoes as $declaracao) { ?>
                            <tr>
                                <td><?= $declaracao['id'] ?></td>
                                <td><?= $declaracao['empresa'] ?></td>
                                <td><?= $declaracao['CNPJ'] ?></td>
                                <td><?= $declaracao['tipo'] ?></td>
                                <td><?= $declaracao['data'] ?></td>
                                <td><?= $declaracao['mes'] ?></td>
                                <td class="bg-success"><?= $declaracao['usuario'] ?></td>
                            </tr>

                        <?php } ?>

                    </tbody>


                </table>



            </fieldset>

        </div>
    </div>



</div>

<?php include "rodape.php"; ?>