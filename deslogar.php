<?php

session_start();
    $_SESSION["nivel"] = "";
    $_SESSION["logado"] = FALSE;
    $_SESSION["nome"] = "";
session_destroy();

header("Location: ./logar.php");
