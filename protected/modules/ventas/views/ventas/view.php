<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading navbar-tool">
                <h3><?php echo Yii::t('app','Detalle completo de la venta'); ?> <b>#<?php echo $model->contrato; ?></b></h3>            
            </div>
            <div class="panel-footer">
                <div class="btn-group">
                    <?php echo CHtml::link(Yii::app()->params['iconoNuevo'].' Nueva Venta', array('ventas/create'), array('class' => 'btn btn-info')); ?>                      
                    <?php //echo CHtml::link(Yii::app()->params['iconoEditar'].' Editar Venta', array('ventas/update/id/' . $model->id), array('class' => 'btn btn-info')); ?>                      
                    <?php //echo CHtml::link(Yii::app()->params['iconoAdmin'].'Administrador', array('ventas/admin'), array('class' => 'btn btn-info')); ?>                      
                    <?php echo CHtml::link(Yii::app()->params['iconoPanel'].'Panel', Yii::app()->controller->createUrl('/site/index') , array('class' => 'btn btn-info btn-square')); ?>                      
                </div>
            </div>
            <div class="panel-body">
                
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'contrato',                    
                        array('name'=>'vendedor_id','type' => 'raw','value' => CHtml::link('<i class="fa fa-paper-plane" aria-hidden="true"></i> '.$model->vendedor->persona->nombre." ".$model->vendedor->persona->apellido, Yii::app()->controller->createUrl('/seguridad/users/view/id/'.$model->vendedor_id),array('target'=>'blank'))),                      
                        array('name'=>'cliente_id','type'=>'raw','value' =>CHtml::link('<i class="fa fa-paper-plane" aria-hidden="true"></i> '.$model->cliente->nombre." ".$model->cliente->apellido, Yii::app()->controller->createUrl('/clientes/clientes/view/id/'.$model->cliente_id),array('target'=>'_blank'))),                        
                        array('name'=>'plan_id','type' => 'text','value' => $model->plan->nombre),
                        array('name'=>'operador_id','type' => 'text','value' => $model->operador->tipo),                        
                        array('name'=>'estado_id','type'=>'html','value'=> Ventas::EstadoLabel($model->estado->tipo)),
                        'radicador_id',
                        array('name'=>'numero_radicacion','value'=>$model->numero_radicacion),
                        'estado_admin_id',
                        array('name'=>'link_imagen','type'=>'html','value'=>@$model->link_imagen),
                        'observaciones',
                        'plataforma_id',
                        'documento_id',                 
                        'numero_asignado',
                        array('name'=>'habeas_data','value' =>Ventas::habea($model->habeas_data),'type' => 'text'),
                        'fecha_activacion',
                        'fecha_legalizacion',
                        'fecha_radica',                        
                        array('name'=>'fecha_venta','type'=>'raw','value'=>$model->fecha_venta),
                        'fecha_ingreso',                     
                        array('name'=>'envio_factura_id','value' => $model->envioFactura->tipo,'type' => 'text'), 
                        array('name'=>'activador_inicial','value' => $model->activadorInicial->persona->nombre,'type' => 'text'),
                        array('name'=>'activador_final','value' => @$model->activadorFinal->persona->nombre,'type' => 'text'),                        
                        array('name'=>'tipoVenta','type'=>'text','value'=>$model->tipoVenta->tipo),
                        'observacion_activacion',
                        'pedido_factura',
                        'estado_contrato_id',                        
                    ),
                ));
                ?>
                
              <?php if($modelVentaMovile != false): ?>
                <div class="panel panel-default">                      
                    <div class="panel-heading"><b>Ventas Moviles Asociada a la venta</b></div>
                        
                        <table class="table table-striped table-hover table-responsive">
                            <tr>
                                <td>Plan</td>
                                <td>Valor</td>
                                <td>Tipo Alta</td>
                                <td>Operador Donante</td>
                                <td>Origen Equipo</td>                             
                                <td>iccid</td>
                                <td>Equipo</td>
                                <td>Imei</td>
                            </tr>                                                
                               <tr>
                                   <td><?php echo $modelVentaMovile->plan->nombre; ?></td>
                                   <td><?php echo $modelVentaMovile->plan->valor; ?></td>
                                   <td><?php echo Ventas::getTipoAta(@$modelVentaMovile->tipo_alta); ?></td>
                                   <td><?php echo @$modelVentaMovile->operadorDonante->tipo; ?></td>
                                   <td><?php echo Ventas::getOrigenEquipo($modelVentaMovile->origen_equipo) ?></td>                                   
                                   <td><?php echo $modelVentaMovile->iccId;  ?></td>
                                   <td><?php echo $modelVentaMovile->equipo; ?></td>
                                   <td><?php echo $modelVentaMovile->Imei; ?></td>
                               </tr>                         
                        </table>
                </div>
              <?php endif; ?>  
                
                <br />
                <?php if($modelVentasFijas != false): ?>
                <div class="panel panel-default">                      
                    <div class="panel-heading"><b>Ventas Fijas Asociada a la venta</b></div>

                        
                        <table class="table table-striped table-hover table-responsive">
                            <tr>
                                <td>Canal de venta</td>
                                <td>Estrato</td>
                                <td>Barrio</td>
                                <td>Contacto</td>
                                <td>Telefono</td>
                                <td>Fecha tentativa</td>                              
                                <td>Direccion de Instalacion</td>                              
                            </tr>                         
                               <tr>
                                   <td><?php echo @$modelVentasFijas->canalVenta->tipo; ?></td>                             
                                   <td><?php echo @$modelVentasFijas->estrato ?></td>                             
                                   <td><?php echo @$modelVentasFijas->barrio; ?></td>                             
                                   <td><?php echo @$modelVentasFijas->nombre_contacto; ?></td>                             
                                   <td><?php echo @$modelVentasFijas->telefono_contacto; ?></td>                             
                                   <td><?php echo @$modelVentasFijas->fecha_tentativa; ?></td>                             
                                   <td><?php echo @$modelVentasFijas->direccion_instalacion; ?></td>                             
                               </tr>
                        
                        </table>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 