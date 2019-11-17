<?php 

include_once URL_APP . '/views/partials/header.php';

include_once URL_APP . '/views/partials/second_navbar.php';

?>
<div class="design-main-page">
    <div class="container">
        <div class="auth-action-design">
            <div class="img-news-aquabee">
                <img src="<?php echo URL_PROJECT ?>/img/gota.png" class="aquabee-pet">
                <h2 class="quote-day-aquabee">Una gota de agua es más valiosa para un hombre sediento que un saco de oro</h2>
            </div>
            <div class="form-design-main">
                <h3 class="header-form">Registrarme</h3>
                <form action="<?php echo URL_PROJECT ?>/register/auth" method="POST" class="form-desing">
                    <div class="form-group">
                        <input type="text" class="form-control <?php if(isset($_SESSION['error_auth'])){echo 'form-error';} ?>" name="document" required placeholder="Documento">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control <?php if(isset($_SESSION['error_auth'])){echo 'form-error';} ?>" name="pass" required placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control <?php if(isset($_SESSION['error_auth'])){echo 'form-error';} ?>" name="pass_comfirm" required placeholder="Confirmar contraseña">
                    </div>

                    <?php if(isset($_SESSION['error_auth'])): ?>
                        <div class="alert-auth">
                            <?php echo $_SESSION['error_auth'] ?>
                        </div>
                    <?php unset($_SESSION['error_auth']); endif ?>
                   
                    <button type="submit" class="btn-auth">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 

include_once URL_APP . '/views/partials/footer.php';

?>