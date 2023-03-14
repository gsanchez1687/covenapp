<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Mi Perfil</h3>
                <div class="actions pull-right">
                    <i class="fa fa-expand"></i>
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
           
            <div class="panel-body">
                <div class="form">
                    <center>
                        <?php if (Yii::app()->user->hasFlash('app')): ?>
                            <div class="alert alert-info" role="alert">
                                <?php echo Yii::app()->user->getFlash('app'); ?>
                            </div> 
                        <?php endif; ?>

                    </center>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array('id' => 'users-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array('validateOnSubmit' => true),
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));
                    ?>

                    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

                    <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger')); ?>
                    <?php echo $form->errorSummary($modelPersonas, null, null, array('class' => 'alert alert-danger')); ?>
                    
                    
                     <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($model, 'foto'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                             <?php
                                $this->widget('CMultiFileUpload', array(
                                    'model'=>$model,
                                    'name' => 'foto',                                   
                                    'max'=>1,
                                    'accept' =>'png|jpg',
                                    'duplicate' => 'Duplicate file!', 
                                    'denied' => 'Solo con formato .png y .jpg',
                                ));  
                                echo $form->error($model,'foto'); 
                                ?>  
                        </div>            
                    </div>
                    
                   



                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($model, 'password'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'password'); ?>
                        </div>            
                    </div>


                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($modelPersonas, 'nombre'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">            
                            <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelPersonas, 'attribute' => 'nombre', 'allowed' => 20, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                            <?php echo $form->error($modelPersonas, 'nombre'); ?>
                        </div>            
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($modelPersonas, 'segundo_nombre'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">            
                            <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelPersonas, 'attribute' => 'segundo_nombre', 'allowed' => 20, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                            <?php echo $form->error($modelPersonas, 'segundo_nombre'); ?>
                        </div>            
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($modelPersonas, 'apellido'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelPersonas, 'attribute' => 'apellido', 'allowed' => 20, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                            <?php echo $form->error($modelPersonas, 'apellido'); ?>
                        </div>            
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($modelPersonas, 'segundo_apellido'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">            
                            <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelPersonas, 'attribute' => 'segundo_apellido', 'allowed' => 20, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                            <?php echo $form->error($modelPersonas, 'segundo_apellido'); ?>
                        </div>            
                    </div>



                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($modelPersonas, 'correo'); ?>
                        </div>
                            <div class="col-xs-12 col-sm-9">            
                                <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelPersonas, 'attribute' => 'correo', 'allowed' => 100, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                                <?php echo $form->error($modelPersonas, 'correo'); ?>
                        </div>            
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($modelPersonas, 'movil'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $modelPersonas, "attribute" => "movil", "mask" => '(999)999-99-99', "clientOptions" => array("autoUnmask" => true), "defaults" => array("removeMaskOnSubmit" => true),)) ?>
                            <?php echo $form->error($modelPersonas, 'movil'); ?>
                        </div>            
                    </div>
                </div>

                <div class="row buttons">                    
                        <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
                        <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
                </div>
                
                
                <?php $this->endWidget(); ?>
            </div>

        </div>
    </div>
</div>





<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
<script>
    $(document).ready(function () {

        $('input[type="password"]').val('');

    });
</script>
