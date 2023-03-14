<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comisiones-vendedores-grid').yiiGridView('update', {
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
                <h3 class="panel-title">Comisiones</h3>                 
                <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
                <div class="search-form" style="display:none">
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
                </div><!-- search-form -->
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'comisiones-vendedores-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'itemsCssClass' => 'table table-striped table-hover table-responsive',
                        'columns' => array(
                            'id',
                            'venta_id',
                            'comprobantes_pagos_totalizadas_id',
                            'revenue',
                            'comision_conexcel',
                            'base_comision',                           
                            'comision_inicial',
                            'fondo',
                            'comision_menos_fondo',
                            'rete_fuente',
                            'reteica',
                            'iva',
                            'precomision',
                            'incumplimiento_legalizacion',
                            'liquidacion',
                             
                            array(
                                'class' => 'CButtonColumn',
                            ),
                        ),
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>