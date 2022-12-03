<?php
include 'cabecalho.php';
include 'banco.php';

$usuarios = usuarios();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //chamada após submit

    $username = $_POST['username'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];


    cadastrarUsuario($username, $senha, $tipo);
}

?>
<div class="container-fluid">

    <div class="row">


        <div class="bg-dark text-white">
            <div class="card col-4" style="margin-top: 1%;">
                <div class="bg-dark card-header">
                    <h3 class="card-title">Cadastro de usuário</h3>
                </div>
                <div class="card-body list-group list-group-flush" style="margin: 8px;">
                    <form accept-charset="UTF-8" role="form" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" method="post">
                        <fieldset>
                            <div class="col-auto" style="margin-top: 2px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-text"><i class="fa fa-address-card fa-fw "></i></div>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-text"><i class="fa fa-address-card fa-fw "></i></div>
                                    <input type="text" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                                </div>

                                <div class="input-group col-auto mb-3" style="color: black;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-radio-input" type="radio" id="administrador" name="tipo" value="1">
                                        <label class="form-radio-label" for="administrador">Administrador</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-radio-input" type="radio" id="comum" name="tipo" value="0">
                                        <label class="form-radio-label" for="comum">Comum</label>
                                    </div>
                                </div>


                            </div>

                        </fieldset>

                        <div class="form-group pull-left col-md-2">
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Cadastrar">
                        </div>

                    </form>

                </div>
            </div>



        </div>

        <div class="bg-dark text-white">
            <div class="card col-4" style="margin-top: 1%;">
                <div class="bg-dark card-header">
                    <h3 class="card-title">Listagem de usuários</h3>
                </div>
                <div class="card-body list-group list-group-flush" style="margin: 8px;">
                    <table class="table table-bordered text-white table-responsive" style="margin-top: 15px;">
                        <thead style="color:black;">
                            <tr>
                                <th>ID</th>
                                <th style="text-align: center;">Nome</th>
                                <th style="text-align: center;">Tipo</th>
                            </tr>
                        </thead>

                        <tbody class="text-black">
                            <?php foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td><?= $usuario['id'] ?></td>
                                    <td><?= $usuario['username'] ?></td>
                                    <?php if ($usuario['nivel'] == 1) { ?>
                                        <td>Administrador</td>
                                    <?php } else { ?>
                                        <td>Comum</td>
                                    <?php } ?>
                                </tr>

                            <?php } ?>

                        </tbody>


                    </table>

                </div>
            </div>



        </div>


    </div>
</div>


<?php include "rodape.php"; ?>