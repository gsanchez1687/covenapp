<section class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div id="login-wrapper">

                <header>
                    <div class="brand">
                        <a href="<?php echo Yii::app()->request->baseUrl . '/site/index' ?>" class="logo"><i class="icon-layers"></i>COVENAPP</a>
                    </div>
                </header>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar sesión</h3>
                    </div>

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
                            <div>
                                <div class="col-md-12">

                                    <?php echo $form->textField($model, 'username', array('autocomplete' => 'off', 'class' => 'form-control input-alfanumerico-space-special', 'placeholder' => 'usuario')); ?>                                        

                                </div>
                            </div>
                            <br /><br /><br />

                            <div class="col-md-12">

                                <?php echo $form->passwordField($model, 'password', array('autocomplete' => 'off', 'class' => 'form-control input-alfanumerico', 'size' => '10', 'placeholder' => 'contraseña')); ?>                                        

                            </div>

                            <div class="col-md-12">
                                <?php echo CHtml::submitButton(Yii::t('app', 'ENTRAR'), array('class' => 'btn btn-info btn-square btn-block')); ?>
                                <hr />
                                <div style="color: #3498db" class="rememberMe">
                                    <?php echo $form->checkBox($model, 'rememberMe', array('checked' => 'checked')); ?>
                                    <?php echo $form->label($model, 'rememberMe'); ?>
                                    <?php echo $form->error($model, 'rememberMe'); ?>
                                </div> 

                                <?php echo CHtml::linkButton('No recuerdo la contraseña', array("id" => 'chtmlbutton', "onclick" => 'recuperar()')); ?>

                            </div>

                        </form>

                        <?php $this->endWidget(); ?>
                        
                        <?php $form = $this->beginWidget('CActiveForm', array('action'=>'recuperar','id' => 'recuperar-form', 'enableClientValidation' => true, 'clientOptions' => array('validateOnSubmit' => true))); ?>

                        <div class="col-md-12">
                            <div id="formulario-recuperar">

                                <?php echo $form->textField($model, 'correo', array('autocomplete' => 'off', 'class' => 'form-control input-alfanumerico', 'size' => '10', 'placeholder' => 'ingrese su correo')); ?>
                                <?php echo CHtml::submitButton(Yii::t('app', 'RECUPERAR'), array('class' => 'btn btn-info btn-square btn-block')); ?>
                            </div>
                            <?php $this->endWidget(); ?>                        
                        </div>

                </div>
            </div>
        </div>
    </div>

</section>