<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">View ValoresComisionBaseCargosBasicos #<?php echo $model->id; ?></h3>
                <div class="actions pull-right">
                    <i class="fa fa-expand"></i>
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-footer">
                <div class="btn-group">
                    <?php echo CHtml::link('Nuevo', array('valoresComisionBaseCargosBasicos/create'), array('class' => 'btn btn-info btn-square')); ?>                      
                    <?php echo CHtml::link('Editar', array('valoresComisionBaseCargosBasicos/update/id/' . $model->id), array('class' => 'btn btn-info btn-square')); ?>                      
                    <?php echo CHtml::link('Administrador', array('valoresComisionBaseCargosBasicos/admin'), array('class' => 'btn btn-info btn-square')); ?>                      
                </div>
            </div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(                       
                        array('name'=>'tipo_id','type'=>'raw','value'=>$model->tipo->tipo),
                        'comision',
                        'cesantia_mercantil',
                         array('name'=>'activo','type'=>'raw','value'=>Controller::getActivos($model->activo)),
                    ),
                ));
                ?>
            </div>

        </div>
    </div>
</div>



