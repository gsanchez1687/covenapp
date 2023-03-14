<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Detalle de la  variable <b>#<?php echo $model->tipo; ?></b></h3>
                <div class="actions pull-right">
                    <i class="fa fa-expand"></i>
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-footer">
                <div class="btn-group">
                    <?php echo CHtml::link('Nuevo', array('dominios/create'), array('class' => 'btn btn-info')); ?>                      
                    <?php echo CHtml::link('Editar', array('dominios/update/id/' . $model->id), array('class' => 'btn btn-info')); ?>                      
                    <?php echo CHtml::link('Administrador', array('dominios/admin'), array('class' => 'btn btn-info')); ?>                      
                </div>
            </div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(                       
                        'tipo',
                        'parametro',                        
                        array('name'=>'activo','type'=>'raw','value'=> Dominios::getActivo($model->activo) ),
                    ),
                ));
                ?>
            </div>

        </div>
    </div>
</div>



