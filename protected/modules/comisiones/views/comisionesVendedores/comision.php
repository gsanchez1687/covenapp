<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?php echo Yii::t('app', 'Comisiones'); ?></h3>              
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <center>
                        <?php if (Yii::app()->user->hasFlash('app')): ?>
                            <div class="alert alert-info" role="alert">
                                <?php echo Yii::app()->user->getFlash('app'); ?>
                            </div> 
                        <?php endif; ?>

                    </center>

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'form-comision',                      
                        'enableClientValidation' => true,
                        'enableAjaxValidation' => false,
                        'clientOptions' => array('validateOnSubmit' => true),
                    ));
                    ?>
                    <center>                        
                        <div class="col-md-4 ">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'name' => 'Fecha_inicio',
                                'language' => 'es',
                                // additional javascript options for the date picker plugin
                                'options' => array(
                                    'dateFormat' => 'yy/mm/dd',
                                    'maxDate' => "now",
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                    'showAnim' => 'drop', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                ),
                                'htmlOptions' => array(
                                    'placeholder' => 'Fecha Inicio',
                                    'class' => 'form-control',
                                ),
                            ));
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'name' => 'Fecha_fin',
                                'language' => 'es',
                                'options' => array(
                                    'dateFormat' => 'yy/mm/dd',
                                    'maxDate' => "now",
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                    'showAnim' => 'drop', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                ),
                                'htmlOptions' => array(
                                    'placeholder' => 'Fecha Fin',
                                    'class' => 'form-control',
                                ),
                            ));
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo FormHelper::dropDownList($form, $ComisionFechas, 'id', Dominios::model()->findAll('parametro = "OPERADOR" '), 'id', 'tipo'); ?>             
                        </div>
                    </center>
                    <br />
                    <br />
                    <br />  
                    <?php
                    if($_POST):                      
                        $Fecha_inicio = Yii::app()->request->getPost('Fecha_inicio');
                        $Fecha_fin = Yii::app()->request->getPost('Fecha_fin');
                        $operador = $_POST['Ventas']['id'];
                    ?>    
                    
                    <center>    
                        <?php echo CHtml::submitButton('Filtrar por fechas', array('class' => Yii::app()->params['save-btn'])); ?>	
                        <?php echo CHtml::link('<i class="fa fa-send" aria-hidden="true"></i> Exportar a excel', array('/ventas/ventas/ExportaComision/?fecha_inicio='.$Fecha_inicio.'&fecha_fin='.$Fecha_fin.'&operador='.$operador), array('class' => 'btn btn-info btn-square')); ?>
                        <?php //echo CHtml::submitButton('Generar comisión', array('class' =>'btn btn-danger btn-square')); ?>	
                    </center>
                    
                    <?php else: ?>

                    <center>         
                        <?php echo CHtml::submitButton('Filtrar por fechas', array('class' => Yii::app()->params['save-btn'])); ?>	
                        <?php echo CHtml::link('<i class="fa fa-send" aria-hidden="true"></i> Exportar a excel', array('/ventas/ventas/ExportaComision'), array('class' => 'btn btn-info btn-square')); ?>
                        <?php //echo CHtml::submitButton('Generar comisión', array('class' =>'btn btn-danger btn-square')); ?>	
                    </center>
                    
                    <?php endif; ?>
                    

                </div>             

                <?php $this->endWidget(); ?>               
           
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>