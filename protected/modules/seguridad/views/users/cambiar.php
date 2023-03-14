<section style="margin-top: 100px;" id="cambiar">
    
    <div class="form text-center">
        <?php $form = $this->beginWidget('CActiveForm', array('id' => 'users-form','action'=>Yii::app()->request->baseUrl.'/users/cambiar', 'enableAjaxValidation' => false)); ?>
        <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger')); ?>
        
            <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="alert alert-info" role="alert">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div> 
        <?php endif; ?>
        
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-2">
                 <?php echo $form->labelEx($model, 'password'); ?>
                 <?php echo $form->passwordField($model, 'password', array('size' => 32, 'maxlength' => 15, 'autocomplete' => 'off', 'value' => '', 'class' => 'form-control input-alfanumerico')); ?>
                 <?php echo $form->error($model, 'password'); ?>
            </div>
                     
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-2">
                <?php echo $form->labelEx($model, 'passwordconfirm'); ?>
                <?php echo $form->passwordField($model,'passwordconfirm', array('size' => 32, 'maxlength' => 15, 'autocomplete' => 'off', 'value' => '', 'class' => 'form-control input-alfanumerico')); ?>
                <?php echo $form->error($model, 'passwordconfirm'); ?>
            </div>                   
        </div>

        
        <div style="margin-left: -100px" class="row">           
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', array('class' => 'btn btn-orange btn-square')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>

</section>
<script>
    $(document).ready(function() { 
    $('#Users_password').val(''); 
});
    
</script>