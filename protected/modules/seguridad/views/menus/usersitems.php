<div class="panel panel-primary">
    <div class="panel-heading navbar-tool">
        <div class="row">
            <div class="col-xs-3 tool-title">Administrar <?php echo $this->modulo_name; ?></div>                                
        </div>
        
    </div>
    <div class="panel-body">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'items-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="row">
            <div class="col-sm-2 col-separacion">
                Seleccionar Todos
            </div>
            <div class="col-sm-10 col-separacion">
                <?php
                $this->widget('application.extensions.SwitchToggle.SwitchToggle', array(
                    'attribute' => 'rowSelectAll',
                    'type' => 'selectall',
                    'state' => FALSE,
                        )
                );
                ?>
            </div>
        </div>


        <div class="row">

            <?php foreach ($options as $menu): ?>       
            
                <div class="col-md-12 col-separacion" id="<?php echo @$menu['menu']; ?>">
                    <h4><?php echo @$menu['menuicon']; ?> <?php echo @$menu['menu']; ?></h4>
                </div>
            
                        <?php foreach ( $options[@$menu['menu']]['data'] as $opcion ) : ?>

                            <div class="col-md-3 col-separacion">
                                <p class="text-right"><?php echo @$opcion['name']; ?></p>
                            </div>
                            <div class="col-md-1 col-separacion">
                                <?php                       
                                $this->widget('application.extensions.SwitchToggle.SwitchToggle', array(
                                    'id' => @$opcion['opcion'],
                                    'attribute' => 'UsersRolesItems[' . @$opcion['opcion'] . ']',
                                    'state' => $opcion['value'],
                                    'type' => 'item',
                                    'coloron' => 'color1',
                                    'htmlOptions' => array('class' => 'itemch'),
                                        )
                                );
                                ?>
                                <?php echo $form->error($model, 'itemname'); ?>
                            </div>

                        <?php endforeach; ?>
                <hr />

            <?php endforeach; ?>   
                
        </div>
        <div class="clearfix"></div>
        
            <div class="btn-group">
                <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('user'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
                <?php echo CHtml::htmlButton('Guardar', array('class' => 'btn btn-info btn-square' , 'Type' => 'submit')); ?>                
            </div>
        

        <?php $this->endWidget(); ?>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  