<?php if (Yii::app()->authRBAC->checkAccess('clientes_admin')): ?>
    <div class="col-md-4">
        <div class="panel panel-solid-warning widget-mini">

            <div class="panel-body">
                <span class="total text-center"><?php echo Controller::totales('Clientes').' Clientes'; ?></span>
            </div>
            <div class="panel-footer">
                <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Ver Clientes'), array('clientes/clientes/admin')); ?>  </span>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if (Yii::app()->authRBAC->checkAccess('ventas_admin')): ?>

    <div class="col-md-4">
        <div class="panel panel-solid-success widget-mini">

            <div class="panel-body">
                <span class="total text-center"><?php echo Controller::TotalesVentas('Ventas').' Ventas'; ?></span>
            </div>
            <div class="panel-footer">

                <?php if (Yii::app()->user->getState('rol') == 2 || Yii::app()->user->getState('rol') == 1): ?>
                
                    <div class="col-xs-6 col-md-6">
                        <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Lista de Ventas'), array('ventas/ventas/vendedores')); ?></span>
                    </div>
                    <div class="col-xs-6 col-md-6">
                         <span><?php echo CHtml::link(Yii::t('app', 'Nueva Venta'), array('ventas/ventas/create')); ?></span>
                    </div>
                
                <?php elseif(Yii::app()->user->getState('rol') == 3 ): ?>  
                
                        <div class="col-xs-6 col-md-6">
                            <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Lista de Ventas'), array('ventas/ventas/gerentes')); ?></span>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <span class="title text-center"></span><?php echo CHtml::link(Yii::t('app', 'Nueva Venta'), array('ventas/ventas/create')); ?></span>
                        </div>
                
                
                <?php else: ?>    
                    
                        <div class="col-xs-6 col-md-6">
                            <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Lista de Ventas'), array('ventas/ventas/admin')); ?></span>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Nueva Venta'), array('ventas/ventas/create')); ?></span>
                        </div>
                
                <?php endif; ?>
                
                <br />
            </div>
        </div>
    </div>

<?php endif; ?>

<?php if (Yii::app()->authRBAC->checkAccess('users_admin')): ?>
    <div class="col-md-4">
        <div class="panel panel-solid-danger widget-mini">            
            <div class="panel-body">
                <span class="total text-center">
                    <?php if (Yii::app()->user->getState('rol') == 8 || Yii::app()->user->getState('rol') == 9): ?>
                        <?php echo Controller::totales('Users'). ' Usuarios'; ?>
                    <?php else: ?>
                        <?php echo Controller::totalesUsuarios().' Vendedores'; ?>
                    <?php endif; ?>
                </span>

            </div>
            <div class="panel-footer">
                <span class="title text-center">
                    <?php if (Yii::app()->user->getState('rol') == 2): ?>
                        <?php echo CHtml::link(Yii::t('app', 'Ver Vendedores'), array('seguridad/users/admin')); ?>
                    <?php else: ?>
                        <?php echo CHtml::link(Yii::t('app', 'Ver Usuarios'), array('seguridad/users/admin')); ?>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php  if (Yii::app()->authRBAC->checkAccess('estadisticas_generales')): ?>

    <div class="col-md-4">
        <div class="panel panel-solid-default widget-mini">
            
            <div class="panel-body">
                <span class="total text-center">Estadísticas Generales</span>
            </div>
            <div class="panel-footer">
                <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Ver Gráficos'), array('ventas/ventas/graficos')); ?></span>
            </div>
        </div>
    </div>

<?php  endif; ?>

<?php if (Yii::app()->authRBAC->checkAccess('planes_admin')): ?>

    <div class="col-md-4">
        <div class="panel panel-solid-info widget-mini">
            
            <div class="panel-body">
                <span class="total text-center"><?php echo Controller::totales('Planes').' Planes'; ?></span>
            </div>
            <div class="panel-footer">
                  <span class="title text-center"> <?php echo CHtml::link(Yii::t('app', 'Ver Planes'), array('cargaMasiva/planes/admin')); ?></span>
            </div>
        </div>
    </div>

<?php  endif; ?>



<?php if (Yii::app()->authRBAC->checkAccess('log_admin')): ?>
    <div class="col-md-4">
        <div class="panel panel-solid-orange widget-mini">

            <div class="panel-body">
                <span class="total text-center"><?php echo Controller::totales('Logs').' Registros '; ?></span>
            </div>
            <div class="panel-footer">
                <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Accesos'), array('logs/logs/admin')); ?></span>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (Yii::app()->authRBAC->checkAccess('mis_estadisticas')): ?>
    <div class="col-md-4">
        <div class="panel panel-solid-violeta widget-mini">

            <div class="panel-body">
                <span class="total text-center"><?php echo 'Mis Estadisticas'; ?></span>
            </div>
            <div class="panel-footer">
                <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Mis Estadisticas '), array('seguridad/users/grafico/id/'.Yii::app()->user->id)); ?></span>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (Yii::app()->authRBAC->checkAccess('sims_vendedores')): ?>
    <div class="col-md-4">
        <div class="panel panel-solid-violeta widget-mini">

            <div class="panel-body">
                <span class="total text-center"><?php echo 'Mis Simcard'; ?></span>
            </div>
            <div class="panel-footer">
                <span class="title text-center"><?php echo CHtml::link(Yii::t('app', 'Mis Simcard '), array('cargaMasiva/sims/simcardvendedores')); ?></span>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><b>Significado de los estados de las ventas</b></div>
            
            <table class="table table-bordered table-responsive table-striped">
                    <thead>
                    <tr>
                        <td><b>Estados</b></td>
                        <td><b>Descripcion</b></td>
                    </tr>
                    </thead>
                    <tr>
                        <td><span class="label   label-en-proceso">Activada</span></td>
                        <td>Venta que ya fue activada pero no se ha legalizado el contrato.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-completado">Completado</span></td>
                        <td>Venta que ya fue activada y legalizada dentro de los tiempos correctos.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-devolucion">Devolucion</span></td>
                        <td>Venta de la cual se devolvió el contrato ya que este contiene incongruencias de firmas o huellas, etc.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-en-proceso">En proceso</span></td>
                        <td>Venta que ya se está trabajando por parte del departamento de activaciones y aún no esta activada ni legalizada.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-fuera-de-corte">Fuera de Corte</span></td>
                        <td>Venta que ya fue activada pero legalizada después del corte semanal de liquidacion de comision.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-legalizacion-tardia">Legalizacion Tardia</span></td>
                        <td>Venta que ya fue activada pero legalizada después de los 3 días hábiles y se somete a penalización.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-legalizada">Legalizada</span></td>
                        <td>Venta que ya se legalizó el contrato pero no se ha activado aún.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-pendiente">Pendiente</span></td>
                        <td>Venta a la cual le faltó algún tipo de documentación, alguna firma o cambio copia de la cédula ya que esta no era legible.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-portabilidad">Portabilidad</span></td>
                        <td>Venta a la cual ya se le programó la fecha de cambio de operador y está en espera de que llegue esa fecha.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-rechazada">Rechazada</span></td>
                        <td>Venta en la que se detectó fraude o procesos similares que van en contra de la calidad y honestidad.</td>
                    </tr>
                    <tr>
                        <td><span class="label label-sin-estado">Sin estado</span></td>
                        <td>Venta a la cual no se le a realizado ningún tipo de proceso ni de activación ni de legalización, todas las ventas al momento de ser ingresadas al sistema quedan en este estado.</td>
                    </tr>
                
            </table>
        </div>
    </div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>   


