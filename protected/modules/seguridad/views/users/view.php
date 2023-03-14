<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php if (Yii::app()->user->getState('rol') == 2): ?>
                <h1>Detalles del Vendedor <b>#<?php echo $model->username; ?></b></h1>                                
                <?php else: ?>
                <h1>Detalles del Usuario <b>#<?php echo $model->username; ?></b></h1>                                
                <?php endif; ?>
                
            </div>
            <div class="panel-footer">
                <div class="btn-group">
                    <?php echo CHtml::link(Yii::app()->params['iconoNuevo'].'Nuevo Usuario', array('users/create'), array('class' => 'btn btn-info btn-square')); ?>                      
                     
                    <?php  if (Yii::app()->authRBAC->checkAccess('users_editar')): ?>                    
                        <?php echo CHtml::link(Yii::app()->params['iconoEditar'].'Editar Usuario', array('users/update/id/' . $model->id), array('class' => 'btn btn-info btn-square')); ?>                      
                    <?php endif;  ?>
                    
                    <?php echo CHtml::link(Yii::app()->params['iconoAdmin'].'Administrador', array('users/admin'), array('class' => 'btn btn-info btn-square')); ?>                      
                    <?php echo CHtml::link(Yii::app()->params['iconoPanel'].'Panel', Yii::app()->controller->createUrl('/site/index') , array('class' => 'btn btn-info btn-square')); ?>                      
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                         <?php echo CHtml::image(Yii::app()->baseUrl . "/images/usuarios/" . $model->foto,"", array("class"=>"img-rounded","width"=>"150px")); ?>
                    </div>
                    <div class="col-md-4">                        
                        <p><b>Perfil </b><?php echo  @$model->rol->name; ?></p>
                        <p><b>Nombre </b><?php echo  @$modelPersona->nombre; ?></p>
                        <p><b>Apellido </b><?php echo  @$modelPersona->apellido; ?></p>
                        <p><b>Telefono </b><?php echo  @$modelPersona->movil; ?></p>
                        <p><b>Ingreso </b><?php echo  @$modelPersona->fecha_ingreso; ?></p>
                    </div>                    
                </div>
                <br />
               
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => array($model,$modelPersona),
                    'attributes' => array(                                                    
                        array('name'=>'username','type'=>'raw','value'=>$model->username),                     
                        array('name'=>'coordinador_id','type'=>'raw','value'=>@$model->coordinador->persona->nombre),
                        array('name'=>'gerente_id','type'=>'raw','value'=>@$model->gerente->persona->nombre),                        
                        array('name'=>'cargo_id','type'=>'raw','value'=>$modelPersona->cargo->tipo),  
                        array('name'=>'estado_id','type'=>'raw','value'=>$modelPersona->estado->tipo),                       
                        array('name'=>'banco','type'=>'raw','value'=>$modelPersona->banco),  
                        array('name'=>'tipo_cuenta','type'=>'raw','value'=>@$modelPersona->tipoCuenta->tipo),  
                        array('name'=>'numero_cuenta','type'=>'raw','value'=>$modelPersona->numero_cuenta),  
                        array('name'=>'padrino_id','type'=>'raw','value'=>@$modelPersona->padrino->nombre.' '.@$modelPersona->padrino->apellido),  
                        array('name'=>'fin_padrino','type'=>'raw','value'=>$modelPersona->fin_padrino),  
                        array('name'=>'sucursal','type'=>'raw','value'=>$modelPersona->sucursal0->tipo),  
                        array('name'=>'documento','type'=>'raw','value'=>$modelPersona->documento),  
                        array('name'=>'legalizacion','type'=>'raw','value'=> Users::getLegalizacionView($modelPersona->legalizacion)),  
                        array('name'=>'regimen_id','type'=>'raw','value'=>$modelPersona->regimen->tipo),  
                        array('name'=>'rete_fuente','type'=>'raw','value'=>Users::getReteFuenteView($modelPersona->rete_fuente)),  
                    ),
                ));                                            
                ?>

            </div>

        </div>
    </div>
</div>
  <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    

