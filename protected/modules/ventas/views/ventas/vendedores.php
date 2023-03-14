<?php if (Yii::app()->authRBAC->checkAccess('ventas_nuevo')): ?>
                    
<?php endif; ?>  
<div style="background-color: #FFF;" class="search-form">
    <?php $this->renderPartial('_search', array('model' => $modelMisVendedores)); ?>
</div><!-- search-form -->

<?php

$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
        'Mis Ventas'=>array('id'=>'misventas','content'=>$this->renderPartial(
										'_coordinadores',
										array('modelMisVentasCoordinador'=>$modelMisVentasCoordinador),TRUE
										)),
       
        'Mis Vendedores'=>array('id'=>'misvendedores','content'=>$this->renderPartial(
										'_vendedores',
										array('modelMisVendedores'=>$modelMisVendedores),TRUE
										)),        
       
    ),
   
    'options'=>array(
        'collapsible'=>false,
    ),
    'id'=>'Mistab',
));
?>
