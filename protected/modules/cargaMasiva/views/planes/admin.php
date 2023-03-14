<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#planes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><i class="fa fa-archive" aria-hidden="true"></i> Planes</h3>                
                <div id="busqueda">
                    <h3><?php echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button')); ?></h3>
                    <div class="search-form" style="display:none">
                        <?php
                        $this->renderPartial('_search', array('model' => $model,));
                        ?>
                    </div><!-- search-form -->
                    <?php if (Yii::app()->authRBAC->checkAccess('planes_crear')): ?>
                        <center>
                            <?php echo CHtml::link(Yii::app()->params['iconoNuevo']. 'Nuevo Plan', array('planes/create'), array('class' => 'btn btn-info btn-square')); ?>                      
                            <?php echo CHtml::link(Yii::app()->params['iconoSubir'].'Subir Archivo', array('planes/carga'), array('class' => 'btn btn-info btn-square')); ?>                      
                        </center>
                    <?php endif; ?>
                </div>

                <div class="actions pull-right">
                    <i class="fa fa-expand"></i>
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'planes-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive table-condensed',     
                        
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(                                
                            'nombre',                          
                            array('name'=>'valor','type'=>'raw','value'=>'Yii::app()->numberFormatter->formatCurrency($data->valor,"CO")'),
                            array('name'=>'operador_id','type' => 'text','value' => '$data->operador->tipo','filter'=>Planes::getOperador()),
                            'fecha_vigencia',
                            'fecha_vencimiento',                                 
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['update-text'],
                                    'label' => Yii::app()->params['update-icon'],
                                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                                    'visible' => Yii::app()->authRBAC->checkAccess('planes_editar')
                                ),
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['delete-text'],
                                    'label' => Yii::app()->params['delete-icon'],
                                    'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
                                    'visible' => Yii::app()->authRBAC->checkAccess('planes_eliminar')
                                ),
                        ),
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
