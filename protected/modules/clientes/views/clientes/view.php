<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Detalle del Cliente <b>#<?php echo $modelCliente->id; ?></b></h3>
                <div class="actions pull-right">
                    <i class="fa fa-expand"></i>
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-footer">
                <div class="btn-group">
                    <?php echo CHtml::link(Yii::app()->params['iconoNuevo'].'Nuevo Cliente', array('clientes/create'), array('class' => 'btn btn-info')); ?>                      
                    
                    <?php  if (Yii::app()->authRBAC->checkAccess('clientes_editar')): ?>
                        <?php echo CHtml::link(Yii::app()->params['iconoEditar'].'Editar Cliente', array('clientes/update/id/' . $modelCliente->id), array('class' => 'btn btn-info')); ?>                      
                    <?php endif; ?>
                    
                    <?php echo CHtml::link(Yii::app()->params['iconoAdmin'].'Administrador', array('clientes/admin'), array('class' => 'btn btn-info')); ?>                      
                    <?php echo CHtml::link(Yii::app()->params['iconoPanel'].'Panel', Yii::app()->controller->createUrl('/site/index') , array('class' => 'btn btn-info btn-square')); ?>                      
                </div>
            </div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $modelCliente,
                    'attributes' => array(
                        'id',
                        'nombre',
                        'apellido',
                        'fecha_expedicion',
                        'fijo',
                        'movil',
                        'direccion',
                        'email',
                        array('name' => 'ciudad_id','type' => 'raw','value' =>@$modelCliente->ciudad->tipo),
                        'fecha_nacimiento',
                        array('name' => 'tipo_documento','type' => 'raw','value' =>@$modelCliente->tipoDocumento->tipo),
                        'tipo_cliente',
                    ),
                ));
                ?>

            </div>

        </div>
    </div>
</div>


