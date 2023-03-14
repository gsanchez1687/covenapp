<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Covenapp</title>    
    <meta name="description" content="CONEXCEL es una empresa privada líder en el área de las telecomunicaciones que ofrece a los colombianos grandes facilidades para poder estar al día con la tecnología. Rompemos el paradigma de asociar las telecomunicaciones con altos costos. Queremos que nuestros clientes entiendan que la telefonía celular es una inversión verdaderamente eficiente para alcanzar sus metas comerciales y personales, manteniéndose comunicados y al día con el mundo.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />    
    <meta name="author" CONTENT="Guillermo Enrique gsanchez1687@gmail.com">
    <meta name="theme-color" content="#2962FF" />          
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl ?>/images/logo.png" type="image/x-icon">    
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#4F80E1">
    <meta name="msapplication-TileImage" content="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/ms-icon-144x144.png">     
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/css/bootstrap.min.css">
    
    <!-- Fonts  -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/simple-line-icons.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/animate.css">

    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/main.css">
    <!-- Feature detection -->
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/vendor/modernizr-2.6.2.min.js"></script>  
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117246014-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-117246014-1');
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/vendor/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/vendor/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
    <section id="main-wrapper" class="theme-blue">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="<?php echo Yii::app()->request->baseUrl,'/site/index'; ?>" class="logo">
                    <i class="icon-layers"></i>
                    <span>COVENAPP</span>
                </a>
            </div>
            <!--logo end-->
            <ul class="nav navbar-nav navbar-left">
                <li class="toggle-navigation toggle-left">
                    <button class="sidebar-toggle" id="toggle-left">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
                <li class="toggle-profile hidden-xs">
                    <button type="button" class="btn btn-default" id="toggle-profile">
                        <i class="icon-user"></i>
                    </button>
                </li>
                
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown profile hidden-xs">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="meta">
                            <span class="avatar">
                              <?php echo Controller::imagen_dia(); ?>
                            </span>
                            <span class="text"><?php echo Controller::saludo().' '.Yii::app()->user->getState('nombre'). ' '.Yii::app()->user->getState('apellido') ?> </span>
                        <span class="caret"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight" role="menu">                        
                       
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl.'/seguridad/users/perfil'?>">
                                <span class="icon"><i class="fa fa-user"></i>
                                </span><?php echo Yii::t('app','Mi cuenta'); ?>
                            </a>
                        </li>                       
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl.'/site/logout'; ?>">
                                <span class="icon"><i class="fa fa-sign-out"></i>
                                </span><?php echo Yii::t('app','Cerrar Sesion'); ?></a>
                        </li>
                    </ul>
                </li>              
                
                 <li class="toggle-fullscreen hidden-xs">
                    <button type="button" class="btn btn-default expand" id="toggle-fullscreen">
                        <i class="fa fa-expand"></i>
                    </button>
                </li>               
            </ul>
        </header>
        
        
        
        <!--sidebar left start-->
        <aside class="sidebar sidebar-left">
            <div class="sidebar-profile">
                <div class="avatar">
                    <img class="img-circle profile-image" src="<?php echo Yii::app()->request->baseUrl.'/images/profile2.png' ?>" alt="profile">
                    <i class="on border-dark animated bounceIn"></i>
                </div>
                <div class="profile-body dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <h5><?php echo Yii::app()->user->getState('nombre').' '.Yii::app()->user->getState('apellido'); ?><span class="caret"></span></h5>
                    </a>
                    <small class="title"><?php echo Controller::TipoRol(Yii::app()->user->getState('rol')); ?></small>
                    <ul class="dropdown-menu animated fadeInRight" role="menu">                        
                      
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl.'/seguridad/users/perfil' ?>">
                                <span class="icon"><i class="fa fa-user"></i>
                                </span><?php echo Yii::t('app','Mi cuenta'); ?>
                            </a>
                        </li> 
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl.'/site/logout' ?>">
                                <span class="icon"><i class="fa fa-sign-out"></i>
                                </span><?php echo Yii::t('app','Cerrar Sesion'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <nav>
                <h5 class="sidebar-header"><?php echo Yii::t('app','Menu de navegacion'); ?></h5>
                <ul  class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="<?php echo Yii::app()->request->baseUrl.'/site/index'; ?>" title="Dashboard">
                            <i class="fa fa-fw fa-tachometer"></i>
                            <?php echo Yii::t('app','Panel de control'); ?>
                        </a>
                    </li>             
                  
                    <?php if(Yii::app()->params['clientes'] == true): ?>
                        <?php if (Yii::app()->authRBAC->checkAccess('clientes_admin')): ?>
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl.'/clientes/clientes/admin'; ?>" title="Clientes">
                                <i class="fa fa-fw fa-address-book" aria-hidden="true"></i>
                                <?php echo Yii::t('app','Clientes'); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if (Yii::app()->authRBAC->checkAccess('users_admin')): ?>    
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl.'/seguridad/users/admin'; ?>" title="Usuarios">
                            <i class="fa fa-fw fa-address-book" aria-hidden="true"></i>
                              <?php echo Controller::TipoUsuarioPorRoles(); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php //if (Yii::app()->authRBAC->checkAccess('Users_misahijados')): ?>  
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl.'/seguridad/users/ahijados'; ?>" title="Usuarios">
                            <i class="fa fa-fw fa-address-book" aria-hidden="true"></i>
                              <?php echo Yii::t('app', 'Mis Ahijados'); ?>
                        </a>
                    </li>
                    <?php //endif; ?>
                    
                    <?php if (Yii::app()->authRBAC->checkAccess('sims_transferencia')): ?>  
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl . '/cargaMasiva/sims/transferencia'; ?>" title="Mis Sims">
                            <i class="fa fa-fw fa-address-book" aria-hidden="true"></i>
                            <?php echo Yii::t('app', 'Transferencia de sims'); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </nav>
            
            <nav>
                <?php if(Yii::app()->params['ventas'] == true): ?>
                <h5 class="sidebar-header"><?php echo Yii::t('app','Ventas'); ?></h5>
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-dropdown">                        
                       
                        <a href="#" title="Pages">
                            <i class="fa fa-fw fa-cart-plus"></i>
                            <?php echo Yii::t('app', 'Ventas'); ?>
                        </a>
                        
                        <ul class="nav-sub">
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_SoloAdmin')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/admin'; ?>" title="Ventas Administradores">
                                    <i class="fa fa-fw fa-users"></i>
                                    <?php echo Yii::t('app', 'Ventas Administradores'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_vendedores')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/vendedores'; ?>" title="Ventas Vendedores">
                                    <i class="fa fa-fw fa-users"></i>
                                    <?php echo Yii::t('app', 'Ventas Vendedores'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_radicador')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/radicador'; ?>" title="Ventas Radicardor">
                                    <i class="fa fa-fw fa-users"></i>
                                    <?php echo Yii::t('app', 'Ventas Radicadores'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_gerentes')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/gerentes'; ?>" title="Ventas Gerentes">
                                    <i class="fa fa-fw fa-users"></i>
                                    <?php echo Yii::t('app', 'Ventas Gerentes'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_preliquidacion')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/VentasPreliquidacion'; ?>" title="Ventas Preliquidadas">
                                    <i class="fa fa-fw fa-paper-plane-o"></i>
                                    <?php echo Yii::t('app', 'Ventas Preliquidadas'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_liquidacion')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/Ventasliquidacion'; ?>" title="Ventas Liquidacion">
                                    <i class="fa fa-fw fa-magnet"></i>
                                    <?php echo Yii::t('app', 'Ventas Liquidadas'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_contabilizadas')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/ventascontabilizadas'; ?>" title="Ventas Contabilizadas">
                                    <i class="fa fa-fw fa-line-chart"></i>
                                    <?php echo Yii::t('app', 'Ventas Contabilizadas'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('ventas_pagadas')): ?>                            
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/ventas/ventas/ventaspagadas'; ?>" title="Ventas Pagadas">
                                    <i class="fa fa-fw fa-money"></i>
                                    <?php echo Yii::t('app', 'Ventas Pagadas'); ?>
                                </a>
                            </li>
                           <?php endif; ?>

                           <?php if (Yii::app()->authRBAC->checkAccess('ventas_trazabilidad')): ?>                            
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/trazabilidad/ventasTraza/admin'; ?>" title="Ventas Trazabilidad">
                                    <i class="fa fa-fw fa-money"></i>
                                    <?php echo Yii::t('app', 'Historial Activadores'); ?>
                                </a>
                            </li>
                           <?php endif; ?>                            

                            
                        </ul>
                       
                    </li>
                    
                </ul>
                <?php endif; ?><!---modulo de ventas-->
            </nav>
            
            <nav>
               <?php if (Yii::app()->authRBAC->checkAccess('carga_masiva_menu')): ?>
                <h5 class="sidebar-header"><?php echo Yii::t('app','Carga Masiva'); ?></h5>
                <ul  class="nav nav-pills nav-stacked">
                    <li class="nav-dropdown">
                        
                        <a href="#" title="Pages">
                            <i class="fa fa-fw  fa-server"></i>
                            <?php echo Yii::t('app', 'Carga Masiva'); ?>
                        </a>
                        <ul class="nav-sub">
                            <?php if (Yii::app()->authRBAC->checkAccess('planes_admin')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/cargaMasiva/planes/admin'; ?>" title="Planes">
                                    <i class="fa fa-bolt" aria-hidden="true"></i>
                                    <?php echo Yii::t('app', 'Planes'); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('sims_admin')): ?>
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl . '/cargaMasiva/Sims/admin'; ?>" title="Sims">
                                    <i class="fa fa-bolt" aria-hidden="true"></i>
                                    <?php echo Yii::t('app', 'Sims'); ?>
                                </a>
                            </li>
                            <?php endif; ?>                            
                            
                        </ul>
                    </li>
                    
                </ul>
                <?php endif; ?>
            </nav>
            
            <h5 class="sidebar-header"><?php echo Yii::t('app','Configuracion'); ?></h5>
            <ul class="nav nav-pills nav-stacked">
                    <li class="nav-dropdown">
                        
                     <?php if(Yii::app()->params['seguridad'] == true): ?>   
                        
                        <?php if (Yii::app()->authRBAC->checkAccess('roles_menu_seguridad')): ?>
                        <a href="#" title="Pages">
                            <i class="fa fa-fw fa-user-secret" aria-hidden="true"></i>
                            <?php echo Yii::t('app', 'Seguridad'); ?>
                        </a>
                        <?php endif; ?>
                        
                        <ul class="nav-sub">
                            <?php if (Yii::app()->authRBAC->checkAccess('roles_menu_modulo')): ?>
                                <li>
                                    <a  href="<?php echo Yii::app()->createUrl('seguridad/menus/admin') ?>">
                                        <?php echo Yii::t('app',Yii::app()->params['menu-seguridad-icono'].'Modulos') ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                                
                            <?php if (Yii::app()->authRBAC->checkAccess('roles_menu_item')): ?>    
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('seguridad/items/admin') ?>">
                                    <?php echo Yii::t('app',Yii::app()->params['menu-seguridad-icono'].'Items') ?>
                                </a>                                
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('roles_rolesitems')): ?>    
                            <li>
                                <a  href="<?php echo Yii::app()->createUrl('seguridad/menus/rolesitems') ?>">
                                      <?php echo Yii::t('app',Yii::app()->params['menu-seguridad-icono'].'Permiso por roles') ?>
                                </a>                                
                            </li>
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('roles_usuario')): ?>
                            <li>
                                <a  href="<?php echo Yii::app()->createUrl('seguridad/menus/user') ?>">
                                      <?php echo Yii::t('app',Yii::app()->params['menu-seguridad-icono'].'Permiso por usuario') ?>
                                </a>                                  
                            </li>
                            <?php endif; ?>
                            
                            <?php endif; ?>
                            
                            <?php if (Yii::app()->authRBAC->checkAccess('log_admin')): ?>
                            <li>
                                <a  href="<?php echo Yii::app()->createUrl('logs/logs/admin') ?>">
                                      <?php echo Yii::t('app',Yii::app()->params['menu-seguridad-icono'].'Logs') ?>
                                </a>                                  
                            </li>
                            <?php endif; ?>
                            
                            <li>
                                <a  href="<?php echo Yii::app()->createUrl('administrador/dominios/admin') ?>">
                                      <?php echo Yii::t('app',Yii::app()->params['menu-seguridad-icono'].'Variables') ?>
                                </a>                                  
                            </li>
                            
                            <li>
                                <a  href="<?php echo Yii::app()->createUrl('seguridad/rol/admin') ?>">
                                      <?php echo Yii::t('app',Yii::app()->params['menu-seguridad-icono'].'Roles') ?>
                                </a>                                  
                            </li>                            
                            
                        </ul>
                            <li>
                                <a  href="<?php echo Yii::app()->request->baseUrl.'/site/logout'; ?>">
                                      <?php echo Yii::t('app','<i class="fa fa-sign-out"></i>'.'Cerrar Sesion') ?>
                                </a>                                  
                            </li>
                    </li>
                </ul>
            
        </aside>
        
        
        <!--sidebar left end-->
        <!--main content start-->
        <section class="main-content-wrapper">               
            
            
            <section style="margin-top: 0px !important; z-index: 1" id="main-content" > 
                                
                <?php if (!Yii::app()->user->isGuest): ?>
                    
                    <?php echo $content; ?>
                
                    <div class="clear"></div>
                    
                <?php else: ?>    
                    
                    <?php $this->redirect('login'); ?>
                    
                <?php endif; ?>
                    
            </section>
            
        </section>
        <!--main content end-->
    </section>
    
    <!--Global JS-->
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>   
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/funciones/funciones.js"></script>    
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/navgoco/jquery.navgoco.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/fullscreen/jquery.fullscreen-min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/shortcuts/shortcuts.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/src/app.js"></script>          
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/vendor/underscore_1.5.2.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/funciones/jquery.validate.js" type="text/javascript"></script>
</body>
</html>
