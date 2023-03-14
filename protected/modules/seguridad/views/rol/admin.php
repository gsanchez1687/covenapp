<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#roles-grid').yiiGridView('update', {
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
                <h3>Administrador de Roles</h3>                
                <center>
                        <?php echo CHtml::link('Nuevo Rol', array('rol/create'), array('class' => 'btn btn-info btn-square')); ?>                      
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
                        'id' => 'roles-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive table-condensed',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(                           
                            'name',
                            'description',                            
                            array('name'=>'active','type'=>'html','value'=>'Roles::getActivo($data->active)'),
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

