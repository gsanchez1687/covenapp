<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menus-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo Yii::t('app', 'Modulos'); ?></h4>
            </div>
            <br />
            <center>
                <div class="btn-group" role="group" aria-label="...">
                    <?php echo CHtml::link('<i class="fa fa-cog" aria-hidden="true"></i> Panel', array('site/panel'), array('class' => 'btn btn-info btn-square')); ?>                  
                    <?php echo CHtml::link('<i class="fa fa-plus" aria-hidden="true"></i> Nuevo modulo', array('menus/create'), array('class' => 'btn btn-info btn-square')); ?>                                  
                </div>
            </center>



            <div class="panel-body">
                <div class="table-responsive">

                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'menus-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'itemsCssClass' => 'table table-striped table-bordered table-hover',
                        'columns' => array(
                            'name',
                            'icon',
                            'position',
                            'url',
                            'category',
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
