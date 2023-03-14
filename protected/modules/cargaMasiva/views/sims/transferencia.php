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
                
                <center>
                    <?php if (Yii::app()->user->hasFlash('app')): ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo Yii::app()->user->getFlash('app'); ?>
                        </div> 
                    <?php endif; ?>
                </center>                

                <div class="actions pull-right">
                    <i class="fa fa-expand"></i>
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php echo CHtml::dropDownList('Users[nombre]', $selected_value = '1', Ventas::getVendedores(), array('empty' => 'Seleccione a un vendedor'));?>
                    <div class="help-block">Seleccione a su vendedor para enviarle las sims</div>
                    
                    <?php echo CHtml::htmlButton('<i class="fa fa-send"></i> Enviar Simcard',array("id"=>'chtmlbutton',"class"=>'btn btn-info btn-square','Onclick'=>'enviarsimscard()')); ?>
                    
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'sims-grid',
                        'itemsCssClass' => 'table table-striped table-hover table-responsive',
                        'dataProvider' => $model->transferencia(),
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
                                    'value' => '$data->usuario->persona->nombre." ".$data->usuario->persona->apellido',
//                                                                           
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

<script>
    
 function enviarsimscard(){
        
       var checkboxValues = new Array();        
        $('input[name="selectedItems[]"]:checked').each(function() {
                checkboxValues.push($(this).val());
        });
        JSONSimcard = JSON.stringify(checkboxValues);  
        
        Users_nombre =  $('#Users_nombre').val();
       
        
        $.ajax({
            
            url: 'enviarsimscard',
            data: 'JSONSimcard='+JSONSimcard+'&Users_nombre='+Users_nombre,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#preloader").html("<i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i>");
            },
                    
            complete: function () {
                $("#preloader").html("");
            },
            error: function () {
                 $('#mensaje').html('Error al cambiar, Intente mas tarde');
            },
            success: function (rs) {
                
                var respuesta = eval('(' + rs + ')');
                if(respuesta.ok == true){
                      location.reload();
                      $('#mensaje').html('Se han realizado los cambios');
                }else {
                        $('#mensaje').html('No se puedo realizar el cambio');
                      }
                  
             }

        });  
 }
 
</script>