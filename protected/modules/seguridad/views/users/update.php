<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading navbar-tool">
                <?php if (Yii::app()->user->getState('rol') == 2): ?>
                     <h1>Actualizar Vendedor <b><?php echo $model->username; ?></b></h1> 
                <?php else: ?>
                     <h1>Actualizar Usuario <b><?php echo $model->username; ?></b></h1> 
                <?php endif; ?>
            </div>
            <div class="panel-body">
               <?php $this->renderPartial('_form', array('model'=>$model,'modelPersonas'=>$modelPersonas,)); ?>
            </div>
        </div>
    </div>
</div>



