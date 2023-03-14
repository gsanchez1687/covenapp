<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading navbar-tool">
                <h4 class="panel-title">Editar Cliente <?php echo $modelCliente->id; ?></h4>            
            </div>
            <div class="panel-body">
               <?php $this->renderPartial('_form', array('modelCliente'=>$modelCliente)); ?>
            </div>
        </div>
    </div>
</div>


