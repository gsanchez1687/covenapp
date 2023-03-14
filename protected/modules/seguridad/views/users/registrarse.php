<section class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div id="login-wrapper">
                 <header class="hidden-xs">
                    <div class="brand">
                        <a href="index.html" class="logo">
                            <i class="icon-layers"></i>
                            <span>Promo</span>Novelty</a>
                    </div>
                </header>
                <div class="panel panel-primary">
                    
                    <div class="panel-body">
                        <p>Ya estas registrado? <a href="<?php echo Yii::app()->request->baseUrl . '/site/login' ?>"><strong>iniciar sesión</strong></a></p>

                        <form style="color: #1A6899" role="form">
                            <?php $form = $this->beginWidget('CActiveForm', array('id' => 'users-form', 'method' => 'POST','enableClientValidation' => true, 'clientOptions' => array('validateOnSubmit' => true), 'enableAjaxValidation' => true, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
                            <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger')); ?>                          
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($model, 'email'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 120, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'email'); ?>
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
                                    <?php echo $form->labelEx($model, 'firstname'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php echo $form->textField($model, 'firstname', array('size' => 60, 'maxlength' => 120, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'firstname'); ?>
                                </div>            
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($model, 'lastname'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php echo $form->textField($model, 'lastname', array('size' => 60, 'maxlength' => 120, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'lastname'); ?>
                                </div>            
                            </div>                                                  
                            
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($model, 'image'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php echo CHtml::activeFileField($model, 'image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'image'); ?>
                                </div>             
                            </div>

                            <div class="buttons">                
                                <?php echo CHtml::submitButton('Registrarse', array('class' => Yii::app()->params['save-btn'])); ?>                                
                            </div>
                            <?php $this->endWidget(); ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>