<?php

include_once URL_APP . '/views/partials/header.php';

include_once URL_APP . '/views/partials/second_navbar.php';

?>

<div class="design-main-page">
    <div class="container">
        <div class="auth-action-design">
            <div class="img-news-aquabee">
                <img src="<?php echo URL_PROJECT ?>/img/gota.png" class="aquabee-pet">
                <h2 class="quote-day-aquabee">En una gota de agua encontramos todos los secretos del océano</h2>
            </div>
            <div class="form-design-main">
                <h3 class="header-form">Iniciar sesión</h3>
                <form action="<?php echo URL_PROJECT ?>/login/auth" method="POST" class="form-desing">
                    <div class="form-group">
                        <input type="text" class="form-control <?php if(isset($_SESSION['error_auth'])){echo 'form-error';} ?>" name="document" required placeholder="Documento">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control <?php if(isset($_SESSION['error_auth'])){echo 'form-error';} ?>" name="pass" required placeholder="Contraseña">
                    </div>

                    <?php if(isset($_SESSION['success_auth'])): ?>
                        <div class="alert-auth-success">
                            <?php echo $_SESSION['success_auth'] ?>
                        </div>
                    <?php unset($_SESSION['success_auth']); endif ?>

                    <?php if(isset($_SESSION['error_auth'])): ?>
                        <div class="alert-auth">
                            <?php echo $_SESSION['error_auth'] ?>
                        </div>
                    <?php unset($_SESSION['error_auth']); endif ?>
                   
                    <button type="submit" class="btn-auth">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

include_once URL_APP . '/views/partials/footer.php';

?>