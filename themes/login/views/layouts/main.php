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
    <title>COVENAPP</title>
    <meta name="description" content="Covenapp es el primer sistema para la gestion de ventas y comisiones en el area de las telecomunicación ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="author" CONTENT="Guillermo Enrique gsanchez1687@gmail.com">
    <meta name="theme-color" content="#2962FF" />     
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/favicon.ico" type="image/x-icon">    
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo Yii::app()->request->baseUrl ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo Yii::app()->request->baseUrl ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::app()->request->baseUrl ?>/images/favicon/favicon-16x16.png">
    <!--Fin  Favicon -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fonts  -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/simple-line-icons.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/animate.css">
    <!-- Daterange Picker -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/plugins/daterangepicker/daterangepicker-bs3.css">  
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
    <section class="main-content-wrapper2">

        <section style="margin-top: 0px !important; z-index: 1000" id="main-content" class="animated fadeInUp">

            <?php foreach (Yii::app()->user->getFlashes() as $key => $message) : ?>

                <input type="hidden" class="mensajes" value="<?php echo $message; ?>">

            <?php endforeach; ?>

            <?php echo $content; ?>
            <div class="clear"></div>

        </section>
    </section>
    
    <!--Global JS-->
   <script src="<?php echo Yii::app()->request->baseUrl ?>/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/navgoco/jquery.navgoco.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/fullscreen/jquery.fullscreen-min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/src/app.js"></script>  
    <script src="<?php echo Yii::app()->request->baseUrl ?>/js/funciones/funciones.js" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
</body>
</html>
