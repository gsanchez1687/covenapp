<?php if (Yii::app()->user->isGuest): ?>

    <section id="login-wrapper" class="container animated fadeInUp">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">                
                <header><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
                    <div class="brand">
                        <a href="<?php echo Yii::app()->baseUrl . '/site/index' ?>" class="logo">
                            <i class="icon-layers"></i>
                            <span>Covenapp</span></a>
                    </div>
                </header>
                <div class="panel panel-primary">                   
                    <div class="panel-body">
                        <center>
                            <?php if (Yii::app()->user->hasFlash('success')): ?>
                                <div class="alert alert-info" role="alert">
                                    <?php echo Yii::app()->user->getFlash('success'); ?>
                                </div> 
                            <?php endif; ?>

                        </center>
                        <?php $form = $this->beginWidget('CActiveForm', array('id' => 'login-form', 'enableClientValidation' => true, 'clientOptions' => array('validateOnSubmit' => true))); ?>
                        
                        <form class="form-horizontal" role="form">
                            <?php //echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
                            <div class="form-group2">
                                <div class="col-md-12">
                                    <?php echo $form->textField($model, 'username', array('autocomplete' => 'off', 'class' => 'form-control input-alfanumerico-space-special', 'placeholder' => 'usuario')); ?>                                        
                                    <?php //echo $form->error($model,'username'); ?>
                                </div>
                            </div>
                            <br />
                            <br />
                            <br />
                            
                            
                          
                            <div class="form-group2">
                                <div class="col-md-12">
                                    <?php echo $form->passwordField($model, 'password', array('autocomplete' => 'off', 'class' => 'form-control input-alfanumerico', 'size' => '10', 'placeholder' => 'contraseña')); ?>                                        
                                    <?php // echo $form->error($model,'password'); ?>
                                    <div class="btn-group">
                                        <a href=""  class="help-block"><?php //echo Yii::t('app','Recuperar contraseña'); ?></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="" class="help-block">Recuperar contraseña</a>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php echo CHtml::submitButton(Yii::t('app', 'ENTRAR'), array('class' => 'btn btn-info btn-square btn-block')); ?>
                                    <hr />
                                    <div style="color: #3498db" class="rememberMe">
                                        <?php echo $form->checkBox($model, 'rememberMe',array('checked'=>'checked')); ?>
                                        <?php echo $form->label($model, 'rememberMe'); ?>
                                        <?php echo $form->error($model, 'rememberMe'); ?>
                                    </div> 
                                    
                                </div>
                            </div>


                        </form>

                        <?php $this->endWidget(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section>


<?php else: ?>
    <?php $this->redirect('site/index'); ?>
<?php endif; 
