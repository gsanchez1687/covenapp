<?php

class FormHelper {
	/**
	 * Retorna el código HMTL de un select basado en la tabla de Catálogos.
	 * @param CActiveForm $form : Formulario activo dentro del cual se mostrará el dropDownList.
	 * @param CActiveRecord $model : Modelo que será utilizado.
	 * @param string $fieldName : Nombre del dropDownList que será desplegado.
	 * @param integer $catId : ID del Catálogo.
	 * @param string $htmlOptions : (Opcional) Atributos HTML adicionales. Ver documentación de CHtml::dropDownList().
	 * @param string $prompt : (Opcional) Mensaje que se desea mostrar para indicar que el usuario debe seleccionar una opción.
	 * @return string Código HMTL del dropDownList.
	 */
  public static function dropDownListCatalogo($form, $model, $fieldName, $catId, $htmlOptions=array(), $prompt = '-Seleccione-') {
    return self::dropDownList($form, $model, $fieldName, CatalogoDetalle::searchByIdDominio($catId), 'operador_id', 'tipo', '', $htmlOptions, $prompt);
  }
  
  public static function dropDownListCatalogosimple($form, $model, $fieldName, $catId, $htmlOptions=array()) {
    return self::dropDownList($form, $model, $fieldName, CatalogoDetalle::searchByIdCatalogo($catId), 'id_catalogo_detalle', 'cat_descp', '', $htmlOptions);
  }
  
	/**
	 * Retorna el código HMTL de un select basado en una lista de elementos pasados como parámetros.
	 * @param CActiveForm $form : Formulario activo dentro del cual se mostrará el dropDownList.
	 * @param CActiveRecord $model : Modelo que será utilizado.
	 * @param string $fieldName : Nombre del dropDownList que será desplegado.
	 * @param array() $modelsList : Lista de elementos que será usada como base para generar el dropDownList.
	 * @param string $valueField : El nombre del atributo o función anónima (PHP 5.3+) para los valores de las opciones del dropDownList.
	 * @param string $textField : El nombre del atributo o función anónima (PHP 5.3+) para los textos de las opciones del dropDownList.
	 * @param string $groupField : (Opcional) El nombre del atributo o función anónima (PHP 5.3+) para los nombres de grupos de la lista de opciones. Si está vacío, no se generarán grupos.
	 * @param string $htmlOptions : (Opcional) Atributos HTML adicionales. Ver documentación de CHtml::dropDownList().
	 * @param string $prompt : (Opcional) Mensaje que se desea mostrar para indicar que el usuario debe seleccionar una opción.
	 * @return string Código HMTL del dropDownList
	 */
  public static function dropDownList($form, $model, $fieldName, array $modelsList, $valueField, $textField, $groupField = '', $htmlOptions=array('class'=>'form-control'), $prompt = '-Seleccione-') {
    $htmlOptions['prompt'] = $prompt;
    return $form->dropDownList($model, $fieldName, CHtml::listData($modelsList, $valueField, $textField, $groupField), $htmlOptions);
  }
}