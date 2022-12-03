<?php 
include 'cabecalho.php';
include 'banco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){ //chamada após submit

    $nome = $_POST['nome'];

    cadastrarTipo($nome);


} 

?>

<div class=" text-white d-flex jumbotron justify-content-center">
    <div class="card col-md-6" style="margin-top: 5%;">
        <div class="bg-dark card-header">
            <h3 class="card-title">Cadastrar novo tipo de declaração</h3>
        </div>
        <div class="card-body list-group list-group-flush" style="margin: 8px;">
            <form accept-charset="UTF-8" role="form" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" method="post">
                <fieldset>
                    <div class="col-auto" style="margin-top: 2px;">
                        <div class="input-group mb-3">
                            <div class="input-group-text"><i class="fa fa-address-card fa-fw "></i></div>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da declaração" required>
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
