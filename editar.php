<?php 
include 'cabecalho.php';
include 'banco.php';

$id = $_GET['id'];

$empresa = buscarEmpresa($id);

$tipoDeclara = buscarTipoDeclaracao();

if ($_SERVER["REQUEST_METHOD"] == "POST"){ //chamada após submit

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $declara = $_POST['declara'];
    $cnpj = $_POST['cnpj'];

    $str = implode(", ", $declara);

    atualizaEmpresa($id, $nome, $telefone, $email, $str, $cnpj);
} 

?>

<div class=" text-white d-flex jumbotron justify-content-center">
    <div class="card col-md-6" style="margin-top: 5%;">
        <div class="bg-dark card-header">
            <h3 class="card-title">Cadastro de empresa</h3>
        </div>
        <div class="card-body list-group list-group-flush" style="margin: 8px;">
            <form accept-charset="UTF-8" role="form" action="<?= $_SERVER['PHP_SELF'] ?>"  method="post">
                <fieldset>
                    <div class="col-auto" style="margin-top: 2px;">
                        <div class="input-group mb-3">
                            <div class="input-group-text"><i class="fa fa-address-card fa-fw "></i></div>
                            <input type="text" class="form-control" value="<?php echo $empresa['CNPJ'] ?>" id="cnpj" name="cnpj" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-text"><i class="fa fa-address-card fa-fw "></i></div>
                            <input type="text" class="form-control" value="<?php echo $empresa['nome'] ?>" id="nome" name="nome" required>
                        </div>

                        <div class="input-group col-auto mb-3">
                            <div class="input-group-text"><i class="fa fa-phone fa-fw"></i></div>
                            <input type="text" class="form-control" value="<?php echo $empresa['telefone'] ?>" id="telefone" name="telefone" required>
                        </div>

                        <div class="input-group col-auto mb-3">
                            <div class="input-group-text"><i class="fa fa-envelope fa-fw"></i></div>
                            <input type="email" class="form-control" value="<?php echo $empresa['email'] ?>" id="email" name="email" required>
                        </div>

                        <div class="input-group col-auto mb-3">
                            <div class="input-group-text"><i class="fa fa-certificate fa-fw"></i></div>
                            <input type="text" class="form-control" value="<?php echo $empresa['declara'] ?>" id="declaracao" name="declaracao" disabled>
                        </div>

                    </div>

                    <div class="form-group col-md-12 list-group-item">
                        <p>Declarações:</p>
                        <?php foreach ($tipoDeclara as $tipo) { ?>
                            <div class="form-check form-check-inline">

                                <input class="form-check-input" name="declara[]" value="<?php echo $tipo['nome'] ?>" type="checkbox" id="<?php echo $tipo['nome'] ?>">
                                <label class="form-check-label" for="<?php echo $tipo['nome'] ?>"><?php echo $tipo['nome'] ?></label>
                            </div>
                        <?php } ?>
                    </div>



                </fieldset>

                <div class="form-group pull-left col-md-2">
                    </br>
                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Atualizar">
                </div>

            </form>

        </div>
    </div>



</div>



<?php include "rodape.php"; ?>
