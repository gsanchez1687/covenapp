<?php $form = $this->beginWidget('CActiveForm', array('id' => 'ventas-form','enableClientValidation' => true,'enableAjaxValidation'=>false,'clientOptions' => array('validateOnSubmit' => true),)); ?>

        <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>       
        <?php //echo $form->errorSummary($modelVentaMovile,null,null,array('class'=>'alert alert-danger')); ?>
	<?php echo $form->errorSummary($modelVentasFijas,null,null,array('class'=>'alert alert-danger')); ?>


        <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($model, 'contrato'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                               
                    <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$model,'attribute'=>'contrato','allowed' => 30,'htmlOptions' => array('class'=>'form-control'),),true); ?>
                    <?php echo $form->error($model, 'contrato'); ?>                   
                </div>            
        </div> 


        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'operador_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">                
                <?php echo $form->dropDownList($model,'operador_id',$model->getOperador()) ?>
		<?php echo $form->error($model,'operador_id'); ?>
            </div>            
        </div>




<?php $this->endWidget(); ?>

