<section id="login-wrapper" class="container animated fadeInUp">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">                
            <header>
                <div class="brand">
                    <a href="<?php echo Yii::app()->baseUrl . '/site/principal' ?>" class="logo">
                        <i class="icon-layers"></i>
                        <span>Promo</span>Novelty</a>
                </div>
            </header>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>ACTIVACIÓN DE LA CUENTA</h3>
                </div>
                <div class="panel-body">

                    <center>
                        <div class="alert alert-info" role="alert">
                            <p><?php echo @$mensaje; ?></p>
                            <p>Puede continuar <a href="<?php echo Yii::app()->request->baseUrl . '/site/login' ?>"><strong>iniciar sesión</strong></a></p>
                        </div> 
                    </center>

                </div>
            </div>

        </div>
    </div>

</section>
