<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sims-grid').yiiGridView('update', {
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
                <h3><i class="fa fa-caret-square-o-up" aria-hidden="true"></i> Sims</h3>         
                
                <?php if (Yii::app()->authRBAC->checkAccess('sims_carga')): ?>
                    <center>
                        <?php echo CHtml::link('<i class="fa fa-upload" aria-hidden="true"></i> Carga Masiva Sims', array('sims/carga'), array('class' => 'btn btn-info btn-square')); ?>                                       
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
                        'id' => 'sims-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive',
                        'dataProvider' => $model->search(),
                        'selectableRows'=>2,
                        'filter' => $model,
                        'columns' => array( 
                            array('id'=>'selectedItems','class'=>'CCheckBoxColumn'),
                            'ccid',                                                       
                           array(                  
                                    'class' => 'booster.widgets.TbEditableColumn',
                                    'name' => 'usuario_id',
                                    'id'=>'usuario_id',
                                    'type'=>'html',
                                    'htmlOptions'=>array('width'=>'150'),
                                    'value' => '@$data->usuario_id',
//                                    'filter'=>Ventas::getUsuarios(),
                                    'htmlOptions'=>array('onchange'=>'refrescarEstado()'),
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' =>Ventas::model()->getVendedores(),
                                            'url' => $this->createUrl('transferenciasims'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                           )
                            ),
                            array('name'=>'operador_id','type'=>'raw','value'=>'$data->operador->tipo','filter'=> Planes::getOperador()),                          
                            array('name'=>'estado_id','type'=>'raw','value'=>'$data->estado->tipo','filter'=>Sims::getEstados()),
//                            array(
//                                'class' => 'CButtonColumn',
//                            ),
                        ),
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 

<script>