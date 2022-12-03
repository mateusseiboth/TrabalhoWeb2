<?php
include 'cabecalho.php';
include 'banco.php';

$declaracoes = buscarDeclaracaoUsuario($_SESSION['id']);

?>


<div class="bg-dark text-white d-flex jumbotron justify-content-center">
    <div class="card col-md-8" style="margin-top: 5%;">
        <div class="bg-dark card-header">
            <h3 class="card-title">Seus cadastros</h3>
        </div>
        <div class="card-body list-group list-group-flush" style="margin: 8px;">
            <fieldset>
                <table class="table table-bordered text-black" style="margin-top: 4px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="text-align: center">Empresa</th>
                            <th style="text-align: center">CNPJ</th>
                            <th style="text-align: center">Tipo da declaração</th>
                            <th style="text-align: center">Data de entrega</th>
                            <th style="text-align: center">Mês de referencia</th>
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
                            </tr>

                        <?php } ?>

                    </tbody>


                </table>

            </fieldset>



        </div>
    </div>



</div>



<?php include "rodape.php"; ?>