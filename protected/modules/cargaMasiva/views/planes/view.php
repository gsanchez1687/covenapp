<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading navbar-tool">
                <h3>Detalle del Plan #<?php echo $model->nombre; ?></h3>            
            </div>
            <div class="container btn-group">
                <?php echo CHtml::link(Yii::app()->params['iconoNuevo'].'Nuevo Plan', array('planes/create'), array('class' => 'btn btn-info btn-square')); ?>                      
                <?php echo CHtml::link(Yii::app()->params['iconoEditar'].'Actualizar Plan', array('planes/update/id/' . $model->id), array('class' => 'btn btn-info btn-square')); ?>                      
                <?php echo CHtml::link(Yii::app()->params['iconoAdmin'].'Administrador', array('planes/admin'), array('class' => 'btn btn-info btn-square')); ?>                      
            </div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'id',
                        'nombre',
                        'valor',
                        'operador_id',
                        'fecha_vigencia',
                        'fecha_vencimiento',
                    ),
                ));
                ?>

            </div>
        </div>
    </div>
</div>


