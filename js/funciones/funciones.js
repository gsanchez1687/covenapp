$(document).ready(function(){
    $('#datosClientes').hide();  
    $("#CrearCliente").hide();
    $(".ventaSesion").hide();
    $("#operadorDonante").hide();
    $("#formulario-recuperar").hide();

});

function refrescar() {

    location.reload();
}

function refrescarEstado() {

    $(".editable-submit").delay(1000).queue(function (n) {
        location.reload();
    });
}

function refrescarFecha() {

    $(".editable-submit").delay(3000).queue(function (n) {
        location.reload();
    });
}



function GuardarCliente(){
    
     Clientes_nombre = $('#Clientes_nombre').val();
     Clientes_segundo_nombre = $('#Clientes_segundo_nombre').val();
     Clientes_apellido = $('#Clientes_apellido').val();
     Clientes_segundo_apellido = $('#Clientes_segundo_apellido').val();
     Clientes_fecha_expedicion = $('#Clientes_fecha_expedicion').val();
     Clientes_fijo = $('#Clientes_fijo').val();
     Clientes_movil = $('#Clientes_movil').val();
     Clientes_direccion = $('#Clientes_direccion').val();
     Clientes_email = $('#Clientes_email').val();
     Clientes_ciudad_id = $('#Clientes_ciudad_id').val();
     Clientes_fecha_nacimiento = $('#Clientes_fecha_nacimiento').val();
     Clientes_tipo_documento = $('#Clientes_tipo_documento').val();
     Clientes_numero_identidad = $('#Clientes_numero_identidad').val();
    
         
     $.ajax({
       dataType:"html",
       url:"../ventas/createcliente",
       data:{'Clientes_nombre':Clientes_nombre,'Clientes_segundo_nombre':Clientes_segundo_nombre,'Clientes_apellido':Clientes_apellido,'Clientes_segundo_apellido':Clientes_segundo_apellido,'Clientes_fecha_expedicion':Clientes_fecha_expedicion,'Clientes_fijo':Clientes_fijo,'Clientes_movil':Clientes_movil,'Clientes_direccion':Clientes_direccion,'Clientes_email':Clientes_email,'Clientes_ciudad_id':Clientes_ciudad_id,'Clientes_fecha_nacimiento':Clientes_fecha_nacimiento,'Clientes_tipo_documento':Clientes_tipo_documento,'Clientes_numero_identidad':Clientes_numero_identidad},
       type: "POST",
       
        beforeSend: function () {
            $("#preloaderGuardarCliente").html("<i class='fa fa-circle-o-notch fa-spin fa-2x fa-fw'></i>");
        },
        
        complete: function () {
            $("#preloaderGuardarCliente").html("");
        },
        
        success: function (data) {
              var respuesta = eval('(' + data + ')');  
              if(respuesta.ok == true){          
                  $('#MensajeCliente').html('<i class="fa fa-check"></i> Se ha agregado el cliente con exito, puede continuar con el formulario de ventas');
                  $("#CrearCliente").hide();
                  buscarCliente();
              }else{
                  $('#MensajeCliente').html('<i class="fa fa-user-check"></i> Aun no se ha registrado el cliente. Valide bien los campos');
              }
                   
        }   
    });
    
}
 
 function agregarEquipo_tempVentasCorporativa(){
     
    var tipo_alta =  $('input[name="VentasMoviles[tipo_alta]"]:checked').val();
    var origen_equipo =  $('input[name="VentasMoviles[origen_equipo]"]:checked').val();
    var operador_donante =  $('#VentasMoviles_operador_donante').val();    
    var equipo =  $('#VentasMoviles_equipo').val();
    var emei =  $('#VentasMoviles_Imei').val();
    var numero_asignado =  $('#VentasMoviles_numero_asignado').val();
    var iccid =  $('#VentasMoviles_iccId').val();   
    var plan_id = $('#Ventas_plan_id').val(); 
 
    
    $.ajax({
       dataType:"html",
       url:"../ventas/tempVentasMoviles",
       data:{'tipo_alta':tipo_alta,'origen_equipo':origen_equipo,'operador_donante':operador_donante,'equipo':equipo,'emei':emei,'numero_asignado':numero_asignado,'iccid':iccid,'plan_id':plan_id},
       type: "POST",
       
        beforeSend: function () {
            $("#preloaderAgregarVentas").html("<i class='fa fa-circle-o-notch fa-spin fa-2x fa-fw'></i>");
        },
        
        complete: function () {
            $("#preloaderAgregarVentas").html("");
        },
        
        success: function (data) {
              var respuesta = eval('(' + data + ')');  
              $('#renderPartialTempVentas').load('http://localhost/ventasconexcel/ventas/tempVentasMoviles/admin');         
        }   
    });
     
 }


function buscarCliente() {   
  
    var cliente_id = $('#Ventas_cliente_id').val();   
   
   
    $.ajax({
        dataType: "html",
        url: "../ventas/Buscarcliente",
        data: {'cliente_id': cliente_id},
        type: "POST",

        beforeSend: function () {
            $("#buscarCliente").html("<i class='fa fa-circle-o-notch fa-spin fa-2x fa-fw'></i>");
        },

        complete: function () {
            $("#buscarCliente").html("");
        },

        success: function (data) {
          
            html = '';
            $('#VerCliente').append('');
            var respuesta = eval('(' + data + ')');        
         
            if (respuesta.ok == true){                      
                $("#CrearCliente").hide(300);
                $('#datosClientes').show(300);
                $('#mensajeCliente_false').hide(300);
                $('#mensajeCliente_true').show(300);
                $('#mensajeCliente_true').append('<div class="alert alert-success" role="alert"><i class="fa fa-thumbs-up"></i> El cliente se ha encontrado, puede continuar con el ingreso de la venta</div>');
                $('#datosClientes').show();
                $('#nombre').html(respuesta.nombre);
                $('#apellido').html(respuesta.apellido);
                $('#numero_identidad').html(respuesta.numero_identidad);
                $('#movil').html(respuesta.movil);
              
                html = '<a target="_blank" class="btn btn-info btn-square" href="http://localhost/ventasconexcel/clientes/clientes/view/id/'+respuesta.numero_identidad+' "><i class="fa fa-eye" aria-hidden="true"></i></a>';
                $('#VerCliente').append(html);
                
            } 
            else if(respuesta.ok == false) {
               
                  $('#Clientes_numero_identidad').val(cliente_id);
                  $("#CrearCliente").show(300);              
                  $('#datosClientes').hide(300);
                  $('#mensajeCliente_true').hide(300);
                  $('#mensajeCliente_false').show(300);
                  $('#mensajeCliente_false').append('<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> El cliente aún no existe, primero debe de registrarlo para continuar.</div>');

            }
            
        }
    });

}
function limpiarobservacionvendedor() {

    $('.observacion_vendedor').click(function () {
        $('input[type="text"]').val('');
    });
}


function recuperar() {

          $( "#formulario-recuperar" ).toggle(300);
}