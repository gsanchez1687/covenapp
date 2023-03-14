<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dominios-grid').yiiGridView('update', {
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
                <h3><?php echo Yii::t('app','<i class="fa fa-cogs"></i> Administrador de Variables') ?></h3>                
                <center>
                        <?php echo CHtml::link('Nuevo', array('dominios/create'), array('class' => 'btn btn-info btn-square')); ?>                      
                </center>

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
                        'id' => 'dominios-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(                            
                            'tipo',                            
                            array('name'=>'parametro','type'=>'text','value'=>'$data->parametro'),                            
                            array('name'=>'activo','type'=>'html','value'=>'Dominios::getActivo($data->activo)','filter'=> Dominios::getActivoFilter()),
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['view-text'],
                                    'label' => Yii::app()->params['view-icon'],
                                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['view-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                                    //'visible' => Yii::app()->authRBAC->checkAccess($this->modulo . '_view')
                                    ),
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['update-text'],
                                    'label' => Yii::app()->params['update-icon'],
                                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['edit-btn']),
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
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 


