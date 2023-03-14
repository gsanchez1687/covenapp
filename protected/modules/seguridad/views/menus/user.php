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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?php echo Yii::t('app','Acceso por usuario') ?></h3>                      
            </div>
            
            <div class="panel-body">
                <div class="table table-responsive">
                     <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'users-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive table-condensed',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(                             
                            array('name'=>'rol_id','type'=>'text','value'=>'$data->rol->name','filter'=> Users::getRoles()),                        
                            array('name'=>'gerente_id','type'=>'text','value'=>'@$data->gerente->persona->nombre','filter'=> Users::getGerente()),   
                            array('name'=>'coordinador_id','type'=>'text','value'=>'@$data->coordinador->persona->nombre','filter'=> Users::getCoordinador()),                                                        
                            array('name'=>'nombre','type'=>'text','value'=>'$data->persona->nombre'),
                            array('name'=>'segundo_nombre','type'=>'text','value'=>'$data->persona->segundo_nombre'),
                            array('name'=>'apellido','header'=>'Apellido','type'=>'text','value'=>'$data->persona->apellido'),                            
                            array('name'=>'segundo_apellido','type'=>'text','value'=>'$data->persona->segundo_apellido'),                                                        
                            'username',           
                            array('name'=>'documento','header'=>'RUT','type'=>'html','value'=>'Users::getDocumento($data->persona->documento)','filter'=>Users::getDocumentacion()),
                           
                            
                           array(
                                'class' => 'CLinkColumn',
                                'header' => 'Ver',
                                'label' => '<i class="fa fa-key" aria-hidden="true"></i>',
                                'linkHtmlOptions' => array('class' => 'view btn btn-info btn-square'),
                                'urlExpression' => 'Yii::app()->controller->createUrl("usersitems",array("id"=>$data->id))',
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