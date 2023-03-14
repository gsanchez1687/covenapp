<?php
	class MyCUrlManager extends CUrlManager
	{
	    public function createUrl($route,$params=array(),$ampersand='&')
	    {
	        if (!isset($params['lg']))
	            $params['lg']=Yii::app()->language;
	        return parent::createUrl($route, $params, $ampersand);
	    }           
           
	}
