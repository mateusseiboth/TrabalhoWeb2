<?php

function buscarEmpresas(){
    include 'conecta.php';
    $empresas = array();
    $res = mysqli_query($conexao, "select * from empresa;") or die("erro ao selecionar");
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($empresas, $row);
    }
    return $empresas;
}

function buscarTipoDeclaracao(){
    include 'conecta.php';
    $tipos = array();
    $res = mysqli_query($conexao, "select * from tipoDeclaracao;") or die("erro ao selecionar");
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($tipos, $row);
    }
    return $tipos;
}

function usuarios() {
    include 'conecta.php';
    $usuarios = array();
    $res = mysqli_query($conexao, "SELECT * FROM usuario") or die("erro ao selecionar");
    while ($usuario = mysqli_fetch_assoc($res)) {
        array_push($usuarios, $usuario);
    }
    return $usuarios;
}


function cadastrarEmpresa($nome, $telefone, $email, $declara, $cnpj) {
    include 'conecta.php';
    $query = "insert into empresa (nome, telefone, email, declara, ativo, cnpj) values ('{$nome}', '{$telefone}', '{$email}', '{$declara}', '1', '{$cnpj}')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        header("Location:loading.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao enviar');window.location.href='cadastrar.php'</script>";
    }
    
}

function cadastrarDeclaracao($mes, $empresaid, $declaracaoid) {
    include 'conecta.php';
    $query = "insert into declaracao (nome, usuario_id, empresa_id, tipoID) values ('{$mes}', '{$_SESSION['id']}', '{$empresaid}', '{$declaracaoid}')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        header("Location:loading.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao enviar');window.location.href='declaracao.php'</script>";
    }
    
}

function cadastrarTipo($nome) {
    include 'conecta.php';
    $query = "insert into tipoDeclaracao (nome) values ('{$nome}')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        header("Location:loading.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao enviar');window.location.href='tipo.php'</script>";
    }
    
}

function checarUsuario($username, $password){
    include 'conecta.php';
    $res = mysqli_query($conexao, "select * from usuario where username = '$username' and senha = '$password';") or die("erro ao selecionar");
    if (mysqli_num_rows($res) <= 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
        die("Erro ao conectar");
    } else {
        $usuario = mysqli_fetch_assoc($res);
        $_SESSION['id'] = $usuario['id'];
        $_SESSION["nivel"] = $usuario["nivel"];
        $_SESSION["logado"] = TRUE;
        $_SESSION["nome"] = $usuario["username"];
        echo"<script language='javascript' type='text/javascript'>alert('Logado com sucesso');window.location.href='index.php';</script>";


    }
}

function buscarDeclaracaoUsuario($id){
    include 'conecta.php';
    $declaracao = array();
    $res = mysqli_query($conexao, "select d.id id, d.nome mes, t.nome tipo, e.nome empresa, e.CNPJ CNPJ, DATE_FORMAT(d.data_cadastro, '%d/%m/%Y - %H:%i') data
    from declaracao d
    join tipoDeclaracao t
    on t.id = d.tipoID
    join usuario u
    on d.usuario_id = u.id
    join empresa e 
    on d.empresa_id = e.id
    where u.id = '$id';") or die("erro ao selecionar");
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($declaracao, $row);
    }
    return $declaracao;
}

function buscarDeclaracaoTodos($id){
    include 'conecta.php';
    $declaracao = array();
    $res = mysqli_query($conexao, "select d.id id, d.nome mes, t.nome tipo, e.nome empresa, e.CNPJ CNPJ, DATE_FORMAT(d.data_cadastro, '%d/%m/%Y - %H:%i') data, u.username usuario
    from declaracao d
    join tipoDeclaracao t
    on t.id = d.tipoID
    join usuario u
    on d.usuario_id = u.id
    join empresa e 
    on d.empresa_id = e.id;") or die("erro ao selecionar");
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($declaracao, $row);
    }
    return $declaracao;
}

function alterarEstado($id, $estado){
    include 'conecta.php';
    $query = "update empresa set ativo = '$estado' where id = '$id'";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        header("Location:loading.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao enviar');window.location.href='listar.php'</script>";
    }
    
}

function buscarEmpresa($id){
    include 'conecta.php';
    $empresas = 
    $res = mysqli_query($conexao, "select * from empresa where id = '{$id}';") or die("erro ao selecionar");
    $empresas = mysqli_fetch_assoc($res);
    return $empresas;
}

function atualizaEmpresa($id, $nome, $telefone, $email, $declara, $cnpj) {
    include 'conecta.php';
    $query = "update empresa set nome = '{$nome}', telefone =  '{$telefone}', email = '{$email}', declara = '{$declara}', cnpj = '{$cnpj}' where id = '{$id}';";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        header("Location:loading.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao enviar');window.location.href='listar.php'</script>";
    }
    
}

function cadastrarUsuario($username, $senha, $tipo) {
    include 'conecta.php';
    $query = "insert into usuario (username, senha, nivel) values ('{$username}', '{$senha}', '{$tipo}')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        header("Location:loading.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao enviar');window.location.href='admUsuarios.php'</script>";
    }
    
}