<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading navbar-tool">
                <h3><?php echo Yii::t('app','<i class="fa fa-pencil" aria-hidden="true"></i> Actualizar Ventas'); ?> <b><?php echo $model->contrato; ?></b></h3>            
            </div>
            <div class="panel-body">
               <?php $this->renderPartial('_form', array(
                   'model'=>$model,
                   'modelVentaMovile'=>$modelVentaMovile,
                   'modelVentasFijas'=>$modelVentasFijas,
                   )
                   ); ?>
            </div>
        </div>
    </div>
</div>


