<?php if (isset($_SESSION['susscess'])) : ?>
    <script>
        Swal.fire(
            'Buen Trabajo!',
            'La acción se ha realizado correctamente',
            'success'
        )
    </script>
<?php unset($_SESSION['susscess']);
endif ?>
</body>

</html>