<?php $form = $this->beginWidget('CActiveForm', array('id' => 'planes-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>
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
                                <?php echo $form->labelEx($model,'importar'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <?php echo CHtml::activeFileField($model, 'file'); ?>
                                <?php echo $form->error($model, 'file'); ?>
                                <p class="help-block">Solo archivos .CSV</p>
                            </div>
                        
                    </div>  
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <?php echo $form->labelEx($model,'operador_id'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <?php
                            $this->widget('ext.yii-selectize.YiiSelectize', array(
                                'name' => 'Planes[operador_id]',
                                'value'=>$model->operador_id,
                                'id' => 'Planes_operador_id',
                                'fullWidth' => true,
                                'placeholder' => '- Seleccione -',
                                'multiple' => false,                    
                                'data' => Planes::getOperador(),
                                'useWithBootstrap' => true,
                                'options' => array(
                                    'plugins' => ['remove_button'],
                                    'create' => false,
                                    'persist' => false,
                                    'valueField' => 'value',
                                    'labelField' => 'text',
                                    'searchField' => 'text',
                                ),
                                'htmlOptions' => array(
                                    'class' => 'form-control',
                                ),
                            ));
                            ?>   
                            <?php echo $form->error($model,'operador_id'); ?>
                        </div>            
                    </div>
                    <div class="form-group">
                    <div class="col-xs-12 col-sm-3">
                        <?php echo $form->labelEx($model,'fecha_vigencia'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'Planes[fecha_vigencia]',
                                'value'=>$model->fecha_vigencia,
                                'flat'=>false,//remove to hide the datepicker
                                'language' => 'es',
                                'options'=>array(                            
                                    'dateFormat' => 'yy-mm-dd',
                                    'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                    'changeMonth'=>true,
                                    'changeYear'=>true,
                                    'yearRange'=>'2000:2099',
                                    'minDate' => '2000-01-01',      // Fecha manima
                                    'maxDate' => '2099-12-31',      // Fecha maxima

                                ),
                                'htmlOptions'=>array(
                                     'class'=>'form-control',
                                ),
                            ));
                            ?>
                        <?php echo $form->error($model,'fecha_vigencia'); ?>
                    </div>            
                </div>
                    <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'fecha_vencimiento'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">                
		<?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Planes[fecha_vencimiento]',
                        'value'=>$model->fecha_vencimiento,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'2000:2099',
                            'minDate' => 'now',      // Fecha manima
                            'maxDate' => '2099-12-31',      // Fecha maxima
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
		<?php echo $form->error($model,'fecha_vencimiento'); ?>
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
