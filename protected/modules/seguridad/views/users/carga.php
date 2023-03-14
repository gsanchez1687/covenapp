<?php $form = $this->beginWidget('CActiveForm', array('id' => 'usuarios-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
        <div class="row">
            <div class="col-xs-12 col-md-10 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading navbar-tool">
                        <h3><i class="fa fa-upload" aria-hidden="true"></i> Subir Archivo csv</h3>            
                    </div>
                    
                    <?php if(Yii::app()->user->hasFlash('app')): ?>
                        <center>                        
                            <div class="alert alert-success" role="alert">

                                <?php echo Yii::app()->user->getFlash('app'); ?>

                            </div>
                        </center>
                    <?php endif; ?>
                    
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                                    <div class="col-xs-12 col-sm-3">
                                        <?php echo $form->labelEx($modelUsuarios,'importar'); ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-9">
                                        <?php echo CHtml::activeFileField($modelUsuarios, 'file'); ?>
                                        <?php echo $form->error($modelUsuarios, 'file'); ?>
                                        <p class="help-block">Solo archivos .CSV</p>
                                    </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($modelUsuarios,'rol_id'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                   <?php echo $form->dropDownList($modelUsuarios,'rol_id', Users::getRoles(), array('empty'=>'Seleccione..','class'=>'form-control')); ?>
                                   <?php echo $form->error($modelUsuarios,'rol_id'); ?>
                                </div>            
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($modelUsuarios, 'gerente_id'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php echo $form->dropDownList($modelUsuarios, 'gerente_id', Users::getGerente(), array('empty' => 'Seleccione...', 'class' => 'form-control')); ?>
                                    <?php echo $form->error($modelUsuarios, 'gerente_id'); ?>
                                </div>            
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($modelUsuarios, 'coordinador_id'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php echo $form->dropDownList($modelUsuarios, 'coordinador_id', Users::getCoordinador(), array('empty' => 'Seleccione...', 'class' => 'form-control')); ?>
                                    <?php echo $form->error($modelUsuarios, 'coordinador_id'); ?>
                                </div>            
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($modelUsuarios, 'padrino_id'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php echo $form->dropDownList($modelPersonas, 'padrino_id', Users::getPadrinos(), array('empty' => 'Seleccionar..', 'class' => 'form-control')); ?>
                                    <?php echo $form->error($modelPersonas, 'padrino_id'); ?>
                                </div>            
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($modelPersonas, 'fin_padrino'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'Personas[fin_padrino]',
                                        'value' => $modelPersonas->fin_padrino,
                                        'flat' => false, //remove to hide the datepicker
                                        'language' => 'es',
                                        'options' => array(
                                            'dateFormat' => 'yy-mm-dd',
                                            'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                            'changeMonth' => true,
                                            'changeYear' => true,
                                            'yearRange' => '2000:2099',
                                            'minDate' => 'now', // Fecha manima
                                            'maxDate' => '+2m', // Fecha maxima
                                        ),
                                        'htmlOptions' => array(
                                            'class' => 'form-control',
                                        ),
                                    ));
                                    ?>
                                    <?php echo $form->error($modelPersonas, 'fin_padrino'); ?>
                                </div>               
                            </div>
                            
                        </div>
                        <div class="btn-group buttons">                                   
                            <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>   
                            <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
<?php $this->endWidget(); ?>