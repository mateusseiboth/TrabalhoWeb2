<?php
include 'cabecalho.php';

?>


<div class="card-header">
        <h3 class="d-flex justify-content-center md-2">Estamos processando sua solicitação, aguarde...</h3>
    </div>

<div class="text-white d-flex justify-content-center md-2">
    <div class="card" style="margin-top: 5%;">
        
        <div class="loader"></div>
        
    </div>

</div>


<?php
include 'rodape.php';

header("Refresh:5; url=index.php");

?>