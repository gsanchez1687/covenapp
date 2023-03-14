<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading navbar-tool">
                <h3></h3>            
            </div>
            <div class="panel-body">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'users-form', 
                    'enableClientValidation' => false,
                    'clientOptions' => array('validateOnSubmit' => false),
                    'enableAjaxValidation'=>false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data')
                    ));
                ?>
                
                <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
                
               
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                        <?php echo $form->labelEx($model, 'image'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php echo CHtml::activeFileField($model,'image',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                        <?php echo $form->error($model, 'image'); ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                        <?php echo $form->labelEx($model, 'firstname'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php echo $form->textField($model, 'firstname', array('class' => 'form-control input-alfanumerico-email', 'maxlength' => 120)); ?>
                        <?php echo $form->error($model, 'firstname'); ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                         <?php echo $form->labelEx($model, 'lastname'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php echo $form->textField($model, 'lastname', array('class' => 'form-control input-alfanumerico-email', 'maxlength' => 120)); ?>
                        <?php echo $form->error($model, 'lastname'); ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                         <?php echo $form->labelEx($model, 'rnc'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php echo $form->textField($model, 'rnc', array('class' => 'form-control input-integer-space', 'maxlength' => 120)); ?>
                        <?php echo $form->error($model, 'rnc'); ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                         <?php echo $form->labelEx($model, 'email'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php echo $form->textField($model, 'email', array('class' => 'form-control input-alfanumerico-space-special', 'maxlength' => 120)); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>              
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                         <?php echo $form->labelEx($model, 'username'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php echo $form->textField($model, 'username', array('maxlength' => 50, 'class' => 'form-control input-alfanumerico-space-special', 'disabled' => 'true')); ?>
                        <?php echo $form->error($model, 'username'); ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                        <?php echo $form->labelEx($model, 'phone'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php //echo $form->textField($model, 'phone', array('class' => 'form-control', 'maxlength' => 15)); ?>
                        <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $model,"attribute" => "phone","mask" => '999-999-99-99',"clientOptions" => array("autoUnmask"=> true),"defaults"=>array("removeMaskOnSubmit"=>true),))  ?>                
                        <?php echo $form->error($model, 'phone'); ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                         <?php echo $form->labelEx($model, 'address'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php echo $form->textField($model, 'address', array('class' => 'form-control input-alfanumerico-space-special', 'maxlength' => 120)); ?>
                        <?php echo $form->error($model, 'address'); ?>
                    </div>            
                </div>
                

                <div class="btn-group">                 
                       <?php echo CHtml::link('Regresar', Yii::app()->createUrl('users/perfil'), array('class' => 'btn btn-default btn-square')) ?>                      
                       <?php echo CHtml::submitButton('Guardar', array('class' => 'btn - btn-orange btn-square')); ?> 
                </div>

                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
