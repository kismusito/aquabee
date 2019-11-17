<div class="card-contrat mt-3">
    <div class="card-header-row">
        <h3 class="m-0 t-center">Seleccionar un contrato</h3>
        <a href="#myModal" class="btn-outline-blue"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nuevo contrato</a>
    </div>
    <div class="select-contrat">
        <table class="table-responsive">
            <tr>
                <th>Número de contrato</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($params['data']['user_contrats'] as $contrat_data): ?>
                <tr>
                    <td><?php echo $contrat_data->idcontrat?></td>
                    <td><?php echo $contrat_data->description?></td>
                    <td class="table-actions">
                        <ul class="m-0">
                            <li class="navbar-item">
                                <a href="<?php echo URL_PROJECT . '/home/setContrat/' .  $contrat_data->idcontrat?>"><i class="fas fa-check fz-1-2 text-blue"></i></a>
                                <a href="<?php echo URL_PROJECT . '/home/setContrat/' .  $contrat_data->idcontrat?>" class="fz-0-9 text-blue">Seleccionar</a>
                            </li>
                            <li class="navbar-item">
                                <a href="#"><i class="fas fa-edit fz-1-2 text-blue"></i></a>
                                <a href="#" class="fz-0-9 text-blue">Editar</a>
                            </li>
                            <li class="navbar-item">
                                <a href="#"><i class="far fa-trash-alt fz-1-2 text-blue"></i></a>
                                <a href="#" class="fz-0-9 text-blue">Eliminar</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div id="myModal">
    <div class="modalDesign">
        <span class="fz-1-2"><a href="#" class="text-blue"><i class="fas fa-times "></i></a></span>
        <div class="body_modal">
            <h3 class="m-0">Nuevo contrato</h3>

            <form action="<?php echo URL_PROJECT?>/contrat/newContrat" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $params['user_id'] ?>">

                <div class="form-group">
                    <input type="number" class="form-control" name="contrat_id" placeholder="Número del contrato" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="contrat_description" placeholder="Descripción" required>
                </div>

                <button class="btn btn-blue btn-block">Enviar</button>
            </form>
        </div>
    </div>
</div>