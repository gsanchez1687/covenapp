<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'Conexcel',       
        'language' => 'es',
        'sourceLanguage' => 'es',
        'defaultController' => 'site/login',
        'theme' => 'classic',
        'charset' => 'utf-8',
        'timeZone' => 'America/Bogota', 

	// preloading 'log' component
	'preload'=>array('log','booster'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',  
                'application.extensions.yiichat.*',
	),

	'modules'=>array(
                'seguridad',
                'ventas',    
                'clientes',
                'cargaMasiva',
                'logs',
                'administrador',
                'parametrizacion',              
                'trazabilidad',
                'comisiones',
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'16871752',                     			
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
             'timeZone' => 'America/Bogota',

                'booster' => array('class' => 'ext.yiibooster.components.Booster'),            
           
                'widgetFactory' => array('widgets' => array('CListView' => array('itemsCssClass' => '', 'pagerCssClass' => 'gridview-pagination', 'pager' => array('cssFile' => false, 'header' => '', 'class' => 'CLinkPager', 'firstPageLabel' => '<<', 'prevPageLabel' => '<', 'nextPageLabel' => '>', 'lastPageLabel' => '>>', 'maxButtonCount' => 15)), 'CDetailView' => array('cssFile' => false, 'htmlOptions' => array('class' => 'table table-striped table-hover table-responsive table-condensed')), 'htmlOptions' => array('class' => 'container-grid-view'),'CGridView' => array('itemsCssClass' => '', 'pagerCssClass' => 'gridview-pagination', 'pager' => array('cssFile' => false, 'header' => '', 'class' => 'CLinkPager', 'firstPageLabel' => '<<', 'prevPageLabel' => '<', 'nextPageLabel' => '>', 'lastPageLabel' => '>>', 'maxButtonCount' => 15)), 'CDetailView' => array('cssFile' => false, 'htmlOptions' => array('class' => 'table table-striped table-hover table-responsive table-condensed')), 'htmlOptions' => array('class' => 'container-grid-view'),)),           
            
                'authRBAC' => array('class' => 'AuthRBAC'),
            
		'user'=>array('allowAutoLogin'=>true),
		
		'urlManager'=>array('showScriptName' => false,'urlFormat'=>'path','rules' => array('<controller:\w+>/<id:\d+>' => '<controller>/view','<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>','<controller:\w+>/<action:\w+>' => '<controller>/<action>'),),		

		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array('errorAction'=>YII_DEBUG ? null : 'site/error'),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'menu-seguridad-icono'=>'<i class="fa fa-unlock-alt" aria-hidden="true"></i>',
            
                /*FORMULARIO ADMIN*/
                'view-text' => 'Detalle',
                'view-icon' => '<i class="fa fa-eye"></i>',
                'view-btn' => 'btn btn-primary btn-square',
            
                'update-text' => 'Editar',
                'update-icon' => '<i class="fa fa-pencil" aria-hidden="true"></i>',
                'edit-btn' => 'btn btn-primary btn-square',
            
                'delete-text' => 'Quitar',
                'delete-icon' => '<i class="fa fa-trash"></i>',                   
                /*FIN DE FORMULARIO ADMIN*/
            
            
                /*vendedoeres grafica*/
                'grafica-text'=>'Ventas',
                'grafica-icon'=>'<i class="fa fa-line-chart" aria-hidden="true"></i>',
                'grafica-btn'=>'btn btn-primary btn-square',
            
                /*FORMULARIOS FORM*/
                'cancel-btn' => 'btn btn-info btn-square',             
                'cancel-text' => '<i class="fa fa-ban" aria-hidden="true"></i>Cancelar',
                'save-text' => 'Guardar',
                'save-btn' => 'btn btn-info btn-square',
                /*FIN FORMULARIO FORM*/
            
            
                /*admin*/
               'CrearCliente-text'=>'<i class="fa fa-plus" aria-hidden="true"></i> Crear Cliente',
               'CrearCliente-btn'=>'btn btn-info btn-square',
            
                /*View*/
               'iconoNuevo'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
               'iconoEditar'=>'<i class="fa fa-pencil" aria-hidden="true"></i>',
               'iconoAdmin'=>'<i class="fa fa-cog" aria-hidden="true"></i>',
               'iconoPanel'=>'<i class="fa fa-th" aria-hidden="true"></i>',
               'iconoSubir'=>'<i class="fa fa-upload" aria-hidden="true"></i>',
               'iconoComision'=>'<i class="fa fa-money" aria-hidden="true"></i>',
            
               'buscar-text'=>'Buscar',
               'buscar-btn'=>'btn btn-info btn-square',
               'iconoGraficos'=>'<i class="fa fa-area-chart" aria-hidden="true"></i>',
            
               /* notificaciones */
               'notificaciones'=>'<i class="fa fa-bell-o" aria-hidden="true"></i>',
               'refrescar'=>'<i class="fa fa-refresh" aria-hidden="true"></i>', 
            
               /*chat*/
               'chat'=>'<i class="fa fa-commenting-o" aria-hidden="true"></i>',
                
                /*modulos activos*/
                'seguridad'=>true,
                'ventas'=>true,
                'clientes'=> true,
                'planes'=>true,
            
                /*generar nuevo codigo*/
                'generar'=>'<i class="fa fa-refresh" aria-hidden="true"></i> ',
            
                /*PagerSize*/
                'defaultPageSize'=>10,
                'pageSizeOptions'=>array(1=>1,5=>5,10=>10,15=>15,20=>20,25=>25,30=>30,35=>35,40=>40,45=>45,50=>50,100=>100),
            
               /* arreglo de idionas */
                'languages' => array(
                    'en' => 'English',
                    'es' => 'Español',
                ),            
            
                /*ids segun la base de datos*/
                'SIN_ESTADO_ESTADOS'=>51,
                'FIJA_TIPO_VENTA'=>53,
                'USADO_SIMS_ESTADO'=>68,
                'HABILITADO_SIMS_ESTADO'=>69,
            
                'uploadPath'=>dirname(__FILE__).'/../../images/usuarios',
                'uploadUrl'=>'/images/upload',
            
                'fija'=>53,
                'movil'=>52,
            
                /*TECNOLOGIAS*/
                'cobre'=>73,
                'FTTC'=>74,
                'FTTH'=>75,
                'play1'=>78,
                'play2'=>79,
                'play3'=>80,                
            
                '3mb'=>83,
                '6mb'=>84,
                '10mb'=>86,
                '11mb'=>87,
                '15mb'=>88,
                '25mb'=>89,
                '50mb'=>90,
                '30mb'=>91,
                '60mb'=>92,
                '150mb'=>93,
                'telefonia'=>99,
            
                'nueva'=>76,
                'migracionlc'=>77,
                'migraciondc'=>98,
	),
);
