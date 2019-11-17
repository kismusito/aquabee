<?php
    include_once URL_APP . "/views/partials/header.php";
    include_once URL_APP . "/views/partials/main_navbar.php";
?>

<div class="container">
    <div class="datos_consumo mt-3">
        <h2>Resultados del més</h2>
        <div class="<?php if($params['color'] == 2) { echo 'alert-auth-success';}else { echo 'alert-auth';} ?>">
            <p class="m-0">Este mes tu gasto fue de <strong><?php echo $params['month_consumo'] ?></strong> Ml de agua lo recomendado es <strong><?php echo $params['limitWaste'] ?></strong> Ml</p>
        </div>
        <h2>Sugerencias</h2>
    </div>
</div>

<?php
    include_once URL_APP . '/views/partials/footer.php';
?>