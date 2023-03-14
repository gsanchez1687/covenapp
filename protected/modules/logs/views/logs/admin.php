<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#logs-grid').yiiGridView('update', {
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
                <h3><i class="fa fa-user-secret" aria-hidden="true"></i>Admin Logs</h3>                                

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
                        'id' => 'logs-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive table-condensed',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(
                            array('name' => 'usuario_id', 'type' => 'raw', 'value' => '$data->usuario->username'),
                            'modulo',
                            'actividad',
                            'pais',
                            'ip',
                            array('name' => 'fecha', 'type' => 'raw', 'value' => 'Controller::fechaesp($data->fecha)'),
                            'dipositivo',
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
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    

