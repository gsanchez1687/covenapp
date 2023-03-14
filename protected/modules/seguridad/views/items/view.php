<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading navbar-tool">
                <h1>Detalle del Items #<?php echo $model->name; ?></h1>         
            </div>
            <div class="btn-group">
                <?php echo CHtml::link('Nuevo item', array('items/create'), array('class' => 'btn btn-info btn-square')); ?>                      
                <?php echo CHtml::link('Actualizar Items', array('items/update/' . $model->id), array('class' => 'btn btn-info btn-square')); ?>                      
                <?php echo CHtml::link('Administrador', array('items/admin'), array('class' => 'btn btn-info btn-square')); ?>                      
                <?php echo CHtml::link('Panel', array('site/panel'), array('class' => 'btn btn-info btn-square')); ?>                      
            </div>
            <div class="panel-body">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(                       
                        'item',
                        'name',
                        array('name' => 'menu_id', 'value' => $model->menu->name),
                        array('name' => 'active','type' => 'raw','value' =>$model->active),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>

