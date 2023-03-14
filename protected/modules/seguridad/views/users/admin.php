<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#users-grid').yiiGridView('update', {
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
                <h3> <?php echo Controller::TipoUsuarioPorRoles(); ?></h3>                
                <div id="busqueda">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <?php echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button')); ?>
                    <div class="search-form" style="display:none">
                        <?php
                        $this->renderPartial('_search', array('model' => $model,));
                        ?>
                    </div><!-- search-form -->                    
                </div>
                <?php if (Yii::app()->authRBAC->checkAccess('users_nuevo')): ?>
                    <center>
                        <?php echo CHtml::link(Yii::app()->params['iconoNuevo'].Yii::t('app','Nueva Usuario'), array('users/create'), array('class' => 'btn btn-info btn-square')); ?>  
                        <?php echo CHtml::link(Yii::app()->params['iconoNuevo'].Yii::t('app','Carga Masiva'), array('users/carga'), array('class' => 'btn btn-info btn-square')); ?>  
                    </center>
                <?php endif; ?>

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
                        'id' => 'users-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive table-condensed',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(                             
                            array('name'=>'rol_id','type'=>'text','value'=>'@$data->rol->name','filter'=> Users::getRoles()),                        
                            array('name'=>'gerente_id','type'=>'text','value'=>'@$data->gerente->persona->nombre','filter'=> Users::getGerente()),   
                            array('name'=>'coordinador_id','type'=>'text','value'=>'@$data->coordinador->persona->nombre','filter'=> Users::getCoordinador()),                                                        
                            array('name'=>'nombre','type'=>'text','value'=>'@$data->persona->nombre'),
                            array('name'=>'segundo_nombre','type'=>'text','value'=>'@$data->persona->segundo_nombre'),
                            array('name'=>'apellido','header'=>'Apellido','type'=>'text','value'=>'@$data->persona->apellido'),                            
                            array('name'=>'segundo_apellido','type'=>'text','value'=>'@$data->persona->segundo_apellido'),                                                        
                            'username',           
                            array('name'=>'documento','header'=>'RUT','type'=>'html','value'=>'Users::getDocumento($data->persona->documento)','filter'=>Users::getDocumentacion()),
                            array('name'=>'numero_cuenta','type'=>'html','value'=>'@$data->persona->numero_cuenta'),
                            array('name'=>'correo','type'=>'html','value'=>'@$data->persona->correo'),
                            array('name'=>'telefono','type'=>'html','value'=>'@$data->persona->movil'),
                            array('name'=>'fecha_ingreso','type'=>'html','value'=>'@$data->persona->fecha_ingreso'),
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['grafica-text'],
                                    'label' => Yii::app()->params['grafica-icon'],
                                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['grafica-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("grafico",array("id"=>$data->id))',
                                    'visible' => Yii::app()->authRBAC->checkAccess('users_grafico')
                                ),
                            
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['view-text'],
                                    'label' => Yii::app()->params['view-icon'],
                                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                                    'visible' => Yii::app()->authRBAC->checkAccess('users_ver')
                                ),
                            
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['update-text'],
                                    'label' => Yii::app()->params['update-icon'],
                                    'linkHtmlOptions' => array('class' => 'edit ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("update",array("id"=>$data->id))',
                                    'visible' => Yii::app()->authRBAC->checkAccess('users_editar')
                                ),
                            
                            array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['delete-text'],
                                    'label' => Yii::app()->params['delete-icon'],
                                    'linkHtmlOptions' => array('class' => 'delete ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->id))',
                                    'visible' => Yii::app()->authRBAC->checkAccess('users_eliminar')
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