<?php
include 'cabecalho.php';
include 'banco.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") { //chamada após submit

    $empresaid = $_POST['empresa'];
    $declaracaoid = $_POST['declaracao'];
    $mes = $_POST['mes'];


    cadastrarDeclaracao($mes, $empresaid, $declaracaoid);
}

$empresas = buscarEmpresas();

$tipoDeclara = buscarTipoDeclaracao();

?>

<div class="text-white d-flex jumbotron justify-content-center">
    <div class="card col-md-6" style="margin-top: 5%;">
        <div class="bg-dark card-header">
            <h3 class="card-title">Cadastro de envio de declaração</h3>
        </div>
        <div class="card-body" style="margin: 8px;">
            <form accept-charset="UTF-8" role="form" action="<?= $_SERVER[" PHP_SELF "] ?>"  ?>" method="post">
                <fieldset>
                    <div class="col-auto" style="margin-top: 2px;">
                        <div class="input-group mb-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Opção</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>

                                        <td scope="col">Selecione a empresa</td>

                                        <td>
                                            <select class="form-select" name="empresa" id="empresa">
                                                <?php foreach ($empresas as $empresa) { ?>

                                                    <option value="<?php echo $empresa['id'] ?>"><?php echo $empresa['nome']; ?></option>

                                                <?php } ?>

                                            </select>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td scope="col">Selecione a declaração</td>
                                        <td>
                                            <select class="form-select" name="declaracao" id="declaracao">
                                                <?php foreach ($tipoDeclara as $declara) { ?>

                                                    <option value="<?php echo $declara['id'] ?>"><?php echo $declara['nome']; ?></option>

                                                <?php } ?>
                                            </select>

                                        </td>

                                    </tr>

                                    <tr>
                                        <td scope="col">Selecione o mês</td>

                                        <td>
                                            <select class="form-select" name="mes" id="mes">
                                                <option value="Janeiro">Janeiro</option>
                                                <option value="Fevereiro">Fevereiro</option>
                                                <option value="Março">Março</option>
                                                <option value="Abril">Abril</option>
                                                <option value="Maio">Maio</option>
                                                <option value="Junho">Junho</option>
                                                <option value="Julho">Julho</option>
                                                <option value="Agosto">Agosto</option>
                                                <option value="Setembro">Setembro</option>
                                                <option value="Outubro">Outubro</option>
                                                <option value="Novembro">Novembro</option>
                                                <option value="Dezembro">Dezembro</option>
                                            </select>

                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </fieldset>

                <div class="form-group pull-left col-md-2">
                    </br>
                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Cadastrar">
                </div>

            </form>

        </div>
    </div>
</div>


<?php include "rodape.php"; ?>