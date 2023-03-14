<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-plus-circle"></i> Registrar nueva venta</h3>       
    </div>
    <div class="panel-body">
        <?php
        $this->renderPartial('_form', array(
            'model' => $model,
            'modelVentaMovile' => $modelVentaMovile,
            'modelVentasFijas' => $modelVentasFijas,
            'modelVentaSesion' => $modelVentaSesion,
        ));
        ?>
    </div>
</div>

