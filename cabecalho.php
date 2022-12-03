<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>ACCAP Management v0.1</title>
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>

    <?php session_start();
    ?>
</head>

<body>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">ACCAP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">

                    <?php
                    if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
                    ?>

                    <<form class="form-inline my-2 my-lg-0" action="logar.php">
                        <button class="btn btn-outline-success my-2 my-sm-0 align-content-end pull-right justify-content-end" type="submit">Login</button>
                    </form>
                </ul>
                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="listar.php">Listar empresas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="cadastrar.php">Cadastrar empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="declaracao.php">Cadastrar declaração</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tipo.php">Novo tipo de declação</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="usuario.php">Seus cadastros</a>
                    </li>

                    <?php if ($_SESSION["nivel"] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="admUsuarios.php">Gerenciar usuários</a>
                        </li>

                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php">Painel declarações.</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0" action="deslogar.php">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Sair</button>
                </form>


            <?php } ?>



            </div>
        </div>
    </nav>

</body>

<body class="bg-dark text-white" style="margin: 6px">