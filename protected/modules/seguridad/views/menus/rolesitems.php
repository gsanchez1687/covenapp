<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#items-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo Yii::t('app', 'Accesos por Roles'); ?></h4>                
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    
                    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'items-form', 'enableAjaxValidation' => false,)); ?>

                    <div class="row">
                        <div class="col-xs-3 col-separacion">
                            <?php echo $form->labelEx($model, 'rol_id'); ?>
                        </div>
                        <div class="col-xs-9 col-separacion">
                            <?php echo $form->dropDownList($model, 'rol_id', Roles::getListRoles(), array('class' => 'form-control', 'prompt' => 'Seleccione', 'onchange' => 'this.form.submit()')); ?>
                            <?php echo $form->error($model, 'rol_id'); ?>
                        </div>
                    </div>


                    <?php if ($model->rol_id != NULL) { ?>

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


                        <?php foreach ($options as $menu) { ?>
                            <div class="row">
                                <div class="col-md-12 col-separacion" id="<?php echo $menu['menu']; ?>">
                                    <hr class="hrblack" />
                                    <h4 class="text-uppercase"><strong><?php echo $menu['menuicon']; ?> <?php echo $menu['menu']; ?></strong></h4>

                                </div>
                            </div>
                            <div class="row">
                                <?php foreach ($options[$menu['menu']]['data'] as $opcion) { ?>

                                    <div class="col-sm-2 col-separacion">
                                        <p class="text-right"><?php echo @$opcion['name']; ?></p>
                                    </div>
                                    <div class="col-sm-1 col-separacion">
                                        <?php
                                        $this->widget('application.extensions.SwitchToggle.SwitchToggle', array(
                                            'id' => @$opcion['opcion'],
                                            'attribute' => 'Items[' . @$opcion['opcion'] . ']',
                                            'state' => $opcion['value'],
                                            'type' => 'item',
                                            'coloron' => 'color1',
                                                )
                                        );
                                        ?>
                                        <?php echo $form->error($model, 'itemname'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <hr />

                        <?php } ?>    
                    </div>
                    <div style="margin-left: 14px;" class="btn-group">
                        <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('rolesitems'), array('class' => Yii::app()->params['cancel-btn'])); ?>	                
                        <?php echo CHtml::htmlButton('Guardar', array('class' => 'btn btn-info btn-square ', 'Type' => 'submit')); ?>            
                    </div>

                <?php } ?>

                <?php $this->endWidget(); ?>

            </div>
        </div>
    </div>
</div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    