<?php
    include_once URL_APP . "/views/partials/header.php";
    include_once URL_APP . "/views/partials/main_navbar.php";
?>

<div class="container">
    <?php
        if (isset($_SESSION['contrat_id'])) { 
            include_once URL_APP . "/views/pages/dashboard/dashboard.php";
        } else {
            include_once URL_APP . "/views/pages/contrat/contrat_form.php";
        }
    ?>
</div>

<?php
    include_once URL_APP . '/views/partials/footer.php';
?>