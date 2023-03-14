<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ventas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<section id="ventas-grid2">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo Yii::t('app', '<i class="fa fa-cogs"></i> Administrador de clientes'); ?></h3>                 
                </div>

                <br />
                <?php if (Yii::app()->authRBAC->checkAccess('clientes_crear')): ?>
                    <center>
                        <?php echo CHtml::link('<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Cliente', array('clientes/create'), array('class' => 'btn btn-info btn-square')); ?>                      
                    </center>
                <?php endif; ?>



                <div class="panel-body">
                    <div class="table-responsive">      
                        <div id="altoanchopantalla">
                            <?php
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'id' => 'clientes-grid',
                                'itemsCssClass' => 'table table-striped table-hover table-responsive table-condensed',
                                'dataProvider' => $modelCliente->search(),
                                'filter' => $modelCliente,
                                'columns' => array(
                                    'nombre',
                                    'segundo_nombre',
                                    'apellido',
                                    'segundo_apellido',
                                    'fijo',
                                    'movil',
                                    'email',
                                    array('name' => 'ciudad_id', 'type' => 'raw', 'value' => '@$data->ciudad->tipo', 'filter' => Clientes::getCiudad()),
//                            'fecha_nacimiento',                            
//                            array('name' => 'tipo_documento','type' => 'raw','value' => '$data->tipoDocumento->tipo', 'filter' =>Clientes::getTipoDocumento()),
                                    array(
                                        'class' => 'CLinkColumn',
                                        'header' => Yii::app()->params['view-text'],
                                        'label' => Yii::app()->params['view-icon'],
                                        'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['cancel-btn']),
                                        'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                                        'visible' => Yii::app()->authRBAC->checkAccess('clientes_detalle')
                                    ),
                                    array(
                                        'class' => 'CLinkColumn',
                                        'header' => Yii::app()->params['update-text'],
                                        'label' => Yii::app()->params['update-icon'],
                                        'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['cancel-btn']),
                                        'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                                        'visible' => Yii::app()->authRBAC->checkAccess('clientes_editar')
                                    ),
                                    array(
                                        'class' => 'CLinkColumn',
                                        'header' => Yii::app()->params['delete-text'],
                                        'label' => Yii::app()->params['delete-icon'],
                                        'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['cancel-btn']),
                                        'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
                                        'visible' => Yii::app()->authRBAC->checkAccess('clientes_eliminar')
                                    ),
                                ),
                            ));
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<link href="<?php echo Yii::app()->request->baseUrl ?>/css/datapiker.min.css" rel="stylesheet" type="text/css"/>

