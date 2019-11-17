<?php foreach ($params['data']['house_information'] as $house_information) : ?>
    <div class="house_information mt-3">
        <div class="data_information">
            <h2 class="m-0 text-center">Información de la casa</h2>
            <div class="fz-1-2">
                <p><strong>Contrat: </strong> <?php echo $house_information->contrat_id ?></p>
                <p><strong>Dirección: </strong> <?php echo $house_information->address ?></p>
                <p><strong>Estrato: </strong> <?php echo $house_information->stratum ?></p>
                <p><strong>Número de habitantes: </strong> <?php echo $house_information->habitants ?></p>
                <a href="#myModal" class="btn btn-blue">Actualizar información</a>
            </div>
        </div>
        <div class="model_information">
            <?php if (!is_null($house_information->url_model)) {
                    echo '<h2>Modelo 3D</h2>';
                    echo $house_information->url_model;
                } else { ?>
                <a href="#myModal" class="btn btn-blue">Actualizar información</a>
            <?php } ?>
        </div>
    </div>



    <div id="myModal">
        <div class="modalDesign">
            <span class="fz-1-2"><a href="#" class="text-blue"><i class="fas fa-times "></i></a></span>
            <div class="body_modal">
                <h3 class="m-0">Actualizar información de la casa</h3>

                <form action="<?php echo URL_PROJECT ?>/contrat/updateHouseInformation" method="POST">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="contrat_id" placeholder="Número del contrato" value="<?php echo $house_information->contrat_id ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="url_model" placeholder="Modelo" value="<?php echo htmlspecialchars($house_information->url_model); ?>">
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" name="habitants" placeholder="Número de habitantes" value="<?php echo htmlspecialchars($house_information->habitants); ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Dirección" value="<?php echo $house_information->address ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="stratum" placeholder="Estrato" value="<?php echo $house_information->stratum ?>">
                    </div>

                    <button class="btn btn-blue btn-block">Editar</button>
                </form>
            </div>
        </div>
    </div>

<?php endforeach ?>

<div class="consumo_report mt-3">
    <a href="#myModal2" class="btn btn-blue">Nuevo reporte</a>
    <table class="table-responsive">
        <tr>
            <th>Número Contrato</th>
            <th>Lectura mes anterior</th>
            <th>Lectura mes actual</th>
            <th>Gasto total</th>
        </tr>
        <?php foreach ($params['data']['consumo'] as $consumo) : ?>
            <tr>
                <td><?php echo $consumo->id_contrat ?></td>
                <td><?php if (is_null($consumo->consumption_report_latest_month)) {
                            echo '0';
                        } else {
                            echo $consumo->consumption_report_latest_month;
                        } ?></td>
                <td><?php if (is_null($consumo->consumption_report_actual_month)) {
                            echo '0';
                        } else {
                            echo $consumo->consumption_report_actual_month;
                        } ?></td>
                <td><a href="<?php echo URL_PROJECT . '/contrat/seeConsump/' . $consumo->idreport . '/' . $consumo->id_contrat ?>" class="btn btn-blue">Ver gasto</a></td>
            </tr>
        <?php endforeach ?>


    </table>
</div>

<?php if (isset($_SESSION['contrat_id'])) : ?>
    <div id="myModal2">
        <div class="modalDesign">
            <span class="fz-1-2"><a href="#" class="text-blue"><i class="fas fa-times "></i></a></span>
            <div class="body_modal">
                <h3 class="m-0">Crear nuevo consumo</h3>

                <form action="<?php echo URL_PROJECT ?>/contrat/createConsumption" method="POST">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="contrat" value="<?php echo $_SESSION['contrat_id']; ?>">
                    </div>

                    <div class="form-group">
                        <?php foreach ($params['data']['lastConsumo'] as $lastConsumo) : ?>
                            <input type="hidden" class="form-control" name="last_consumo" value="<?php echo $lastConsumo ?>" required>
                        <?php endforeach ?>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" name="actual_consumo" placeholder="Consumo">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="month" placeholder="Més actual" value="<?php echo date('F') ?>" readonly>
                    </div>

                    <button class="btn btn-blue btn-block">Crear</button>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>