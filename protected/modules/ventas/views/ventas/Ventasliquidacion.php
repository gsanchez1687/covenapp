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

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?php echo Yii::t('app','Administrador de ventas'); ?></h3>                
                <div id="busqueda">
                    <?php echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button')); ?>
                        <div class="search-form" style="display:none">
                            <?php $this->renderPartial('_search', array('model' => $model,));  ?>
                        </div><!-- search-form -->
                        
                        <?php if (Yii::app()->authRBAC->checkAccess('ventas_create')): ?>
                        <div class="text-center">
                                <?php echo CHtml::link('<i class="fa fa-plus" aria-hidden="true"></i> Nueva Venta', array('ventas/create'), array('class' => 'btn btn-info btn-square')); ?>  
                        </div>
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
                            'id' => 'ventas-grid',
                            'itemsCssClass' => 'table table-striped table-hover table-responsive table-condensed',
                            'dataProvider' => $model->liquidacion(),
                            'filter' => $model,
                            'columns' => array(
                                'contrato',
                                array('name'=>'vendedor_id','type' => 'text','value' =>'$data->vendedor->persona->nombre." ".$data->vendedor->persona->apellido'),                              
                                array('name'=>'cliente_id','type'=>'raw','value'=>'CHtml::link($data->cliente->nombre, array("../clientes/clientes/view/id/".$data->cliente->id),array("target"=>"_blank"))'),
                                array('name'=>'operador_id','type' => 'text','value' => '$data->operador->tipo','filter'=> Ventas::getOperador()),
                                array('name'=>'plan_id','type' => 'text','value' => '$data->plan->nombre'),
//                                array('name'=>'habeas_data','type'=>'text','value'=>'Ventas::habea($data->habeas_data)','filter'=>Ventas::habeasSelect()),                               
//                                array('name'=>'envio_factura_id','type' => 'text','value' => '$data->envioFactura->tipo','filter'=> Ventas::getEnvioFactura()),                                
                                array('name'=>'estado_id','type' => 'html','value' => 'Ventas::EstadoLabel($data->estado->tipo)','filter'=> Ventas::getEstados()),

                                array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['view-text'],
                                    'label' => Yii::app()->params['view-icon'],
                                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                                    //'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_view')
                                ),
                                array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['update-text'],
                                    'label' => Yii::app()->params['update-icon'],
                                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                                    //'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_update')
                                ),
                                array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['delete-text'],
                                    'label' => Yii::app()->params['delete-icon'],
                                    'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
                                    //'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_delete')
                                ),
                            ),
                        ));
                        ?>
                   
                </div>
            </div>
        </div>
    </div>
</div>



