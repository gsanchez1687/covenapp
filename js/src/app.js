var app = function() {

    $(function() {         
        portabiliadSesion();
        copypaste();
        autocomplete();
        alto();
        tableClick();
        toggleSettings();      
        navToggleLeft();
        navToggleSub();
        profileToggle();
        widgetToggle();
        widgetClose();
        widgetFlip();
        tooltips();       
        fullscreenWidget();
        fullscreenMode();
        shortcuts();
        TogglePlanes();
    });  


    var portabiliadSesion = function(){
        
        $("#radio2, #radio4").click(function () {            
              $("#operadorDonante").show(300);
        });
        
        $("#radio4").click(function () {            
             $(".ventaSesion").show(300);
        });
        
        
        $("#radio1, #radio3").click(function () {            
              $("#operadorDonante").hide(300);
              $(".ventaSesion").hide(300);
        });
        
    };
    
   
    
     var copypaste = function(){
         
          $('#Ventas_cliente_id').bind("cut copy paste",function(e) {
                 e.preventDefault();
	    });
            
          $('#Clientes_numero_identidad').bind("cut copy paste",function(e) {
                 e.preventDefault();
	    });
         
     };
     
    var autocomplete = function(){
        
        $('#Ventas_cliente_id').attr('autocomplete','off');
        $('#Clientes_fecha_expedicion').attr('autocomplete','off');
        $('#Clientes_fecha_nacimiento').attr('autocomplete','off');
        $('#Clientes_numero_identidad').attr('autocomplete','off');
        
    };

    var alto = function(){
        
        al =  $( window ).height() ;
        resul = al - 200;       
        $('#altoanchopantalla').css({ 'width':'100%', 'height':resul+'px','overflow-x':'scroll' });
        $('#altoanchopantallaVendedores').css({ 'width':'100%', 'height':resul+'px','overflow-x':'scroll' });
    };
    
    var tableClick = function(){
        
        $('.table-hover tbody tr').click(function() {
         $(this).addClass('ventasSeleccion').siblings().removeClass('ventasSeleccion');
        }); 
        
    };

    var TogglePlanes = function(){
       $('#link_imagen').hide(); 
       $('#Planes').hide();      
       $('#Ventas').hide(); 
       $('#VentaFija').hide(); 
       $('#VentaFijaOtro').hide(); 
       $('#VentMovile').hide(); 
       $('#VentaFijaETB').hide(); 
       
       $('#Ventas_operador_id').change(function(){
           
            operador = $('#Ventas_operador_id option:selected').val();   
            
            if(operador == '5' || operador == '1'){            
                   $('#link_imagen').show(300); 
                   $('#Planes').show(300); 
                
            }else if(operador != '5' || operador != '1'){
                   $('#link_imagen').hide(); 
                   $('#VentaFijaETB').hide(300); 
                   $('#Planes').show(300);  
                   
            }
            /*si son operador fijos*/
            if(operador == '5' || operador == '6' || operador == '7' || operador == '8' ){               
                   $('#Ventas').show(300); 
                   $('#VentaFija').show(300); 
                   $('#VentaFijaOtro').show(300); 
                   $('#VentMovile').hide(300); 
            }else{            
                   $('#Ventas').show(300); 
                   $('#VentaFijaOtro').hide(300); 
                   $('#VentaFija').hide(300); 
                   $('#VentMovile').show(300); 
            }
          
            
       });/*fin del change*/
       

        
    };
    
    var shortcuts = function(){
          shortcut.add("backspace", function () { });
          shortcut.add("enter", function () { });
    };

    var toggleSettings = function() {
        $('.config-link').click(function() {
            if ($(this).hasClass('open')) {
                $('#config').animate({
                    "right": "-205px"
                }, 150);
                $(this).removeClass('open').addClass('closed');
            } else {
                $("#config").animate({
                    "right": "0px"
                }, 150);
                $(this).removeClass('closed').addClass('open');
            }
        });
    };



    var navToggleLeft = function() {
        $('#toggle-left').on('click', function() {
            var bodyEl = $('#main-wrapper');
            ($(window).width() > 767) ? $(bodyEl).toggleClass('sidebar-mini'): $(bodyEl).toggleClass('sidebar-opened');
        });
    };

    var navToggleSub = function() {
        var subMenu = $('.sidebar .nav');
        $(subMenu).navgoco({
            caretHtml: false,
            accordion: true
        });

    };

    var profileToggle = function() {
        $('#toggle-profile').click(function() {
            $('.sidebar-profile').slideToggle();
        });
    };

    var widgetToggle = function() {
        $(".actions > .fa-chevron-down").click(function() {
            $(this).parent().parent().next().slideToggle("fast"), $(this).toggleClass("fa-chevron-down fa-chevron-up")
        });
    };

    var widgetClose = function() {
        $(".actions > .fa-times").click(function() {
            $(this).parent().parent().parent().fadeOut()
        });
    };

    var widgetFlip = function() {
        $(".actions > .fa-cog").click(function() {
            $(this).closest('.flip-wrapper').toggleClass('flipped')
        });
    };


    //tooltips
    var tooltips = function() {
        $('.tooltip-wrapper').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        })
    };


    var fullscreenWidget = function() {
        $('.panel .fa-expand').click(function() {
            var panel = $(this).closest('.panel');
            panel.toggleClass('widget-fullscreen');
            $(this).toggleClass('fa-expand fa-compress');
            $('body').toggleClass('fullscreen-widget-active')

        })
    };


    var fullscreenMode = function() {
       $('#toggle-fullscreen.expand').on('click',function(){
        $(document).toggleFullScreen()
        $('#toggle-fullscreen .fa').toggleClass('fa-expand fa-compress');  
       });
    };


}();
