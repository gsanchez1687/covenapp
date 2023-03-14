<?php
/**
 * GUpload class file.
 *
 * @author Gustavo Salgado <gsalgadotoledo@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * GUpload displays a star rating control that can collect user rating input.
 *
 * GUpload is based on {@link http://www.fyneworks.com/jquery/star-rating/ jQuery Star Rating Plugin}.
 * It displays a list of stars indicating the rating values. Users can toggle these stars
 * to indicate their rating input. On the server side, when the rating input is submitted,
 * the value can be retrieved in the same way as working with a normal HTML input.
 * For example, using
 * <pre>
 * $this->widget('pat.to.location.GUpload',array('name'=>'rating'));
 * </pre>
 * we can retrieve the rating value via <code>$_POST['rating']</code>.
 *
 * GUpload allows customization of its appearance. It also supports empty rating as well as read-only rating.
 *
 * @author Gustavo Salgado <gsalgadotoledo@gmail.com>
 * @package system.web.widgets
 * @since 1.0
 */
class GTextfield extends CInputWidget
{
	public $allowed=50; // $this->createUrl('upload')
	
	/**
	 * Executes the widget.
	 * This method registers all needed client scripts and renders
	 * the text field.
	 */
	public function run()
	{
		list($name,$id)=$this->resolveNameID();
		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];

		$this->registerClientScript($id);
		echo CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions);
	}

	/**
	 * Registers the necessary javascript and css scripts.
	 * @param string $id the ID of the container
	 */
	public function registerClientScript($id)
	{
		$warning=($this->allowed*15)/100;
		$js="
			$('#{$id}').charCount({
                allowed: {$this->allowed},        
                warning: {$warning},
                counterText: '/{$this->allowed}'  
            });
		";
		
		$css="
			form .counter{
				font-size: 13px;
				font-weight: 700;
				color: #ccc;
			}
			form .warning{color:#600;}	
			form .exceeded{color:#e00;}
		";
		
		$assets=Yii::app()->assetManager->publish(dirname(__FILE__)."/assets/");
		$cs=Yii::app()->getClientScript();
		$cs->registerScriptFile($assets."/charCount.js");
		$cs->registerScript('ext.GTextarea#'.$id,$js,CClientScript::POS_READY);
		$cs->registerCss('ext.GTextarea.Css',$css);
	}
}