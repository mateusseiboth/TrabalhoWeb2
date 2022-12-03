<?php
include 'cabecalho.php';
include 'banco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { //chamada após submit

    $username = $_POST['username'];
    $password = $_POST['password'];

    checarUsuario($username, $password);
}

?>

<div class="jumbotron d-flex justify-content-center">
    <div class=" text-white col-md-3">
        <div class="card" style="margin-top: 25%;">
            <div class="card-header bg-dark">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form accept-charset="UTF-8" role="form" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" method="post">
                    <fieldset>
                        <div class="col-lg-12" style="margin-top: 2px">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa fa-address-card fa-fw "></i></div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-lg-12" style="margin-top: 2px">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa fa-key fa-fw "></i></div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group pull-left col-md-2">
                        </br>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Entrar">
                    </div>

                </form>

            </div>
        </div>


    </div>
</div>


<?php include "rodape.php"; ?>