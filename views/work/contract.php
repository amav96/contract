<?php
//  require_once '../../config/parametros.php';
// require_once '../../config/db.php';
// require_once '../../control/usuarioControllers.php';

?>

<!-- --------------------------------2------------------------------------------->
<?php require_once '../views/layout/header.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>



<?php  if($cliente->status_process === '' || $cliente->status_process === null || $cliente->status_process === 'registered' || $cliente->status_process === 'doesNotQualify'){ ?>

    <h5 class="text-center">Usuario <?=$cliente->first_name.' '.$cliente->last_name?> en proceso de alta. </h5>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

 <?php } else { ?>


    <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active'){ ?>

       <div class="container" >
       <h3 style="margin:5rem auto 1rem auto;" class="text-center">Contrato listo</h3>
           <div style="display:flex;justify-content:center;" class="boton">
          
         <button style="margin:1rem auto 1rem auto;" id="donwload" name="donwload" class="text-center btn btn-danger"> Descargar </button>
         </div>
         </div>
         
         
         <?php } ?>
         
         <div class="container" id="invoice" >

         <div class="text-center titulo-contract" >

    
      
        <h6>CONTRATO DE LOCACIÓN DE SERVICIOS DE RECOLECCION DE DECODIFICADORES Y MODEMS</h6>


            <p style="text-align: justify;"><u>Express es una empresa de Logística reconocida y con 11 años en el mercado y con clientes de primera línea .</u></p>
            <p style="text-align: justify;"> Las partes independientes , Express Metropolitana de Servicios SRL Cuit 30-70944102-3 y el Sr

            <!-- Si la solicitud ya esta firmada -->
        <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active'){ ?>
            
            <strong><?=$cliente->last_name .' '.$cliente->first_name?></strong> Cuit / Cuil <strong><?=$cliente->cuit?></strong> (en adelante el Recolector) con domicilio en <strong><?=$cliente->home_address?></strong> , convienen la locación de servicios denominada recolección de decodificadores y /o módems prestada por parte del Recolector únicamente a Express .
            Vehículo integrado al contrato marca : <strong><?=$cliente->vehicle_brand?></strong>  modelo : <strong><?=$cliente->vehicle_model?></strong> patente : <strong><?=$cliente->patent?></strong> siendo <strong><?=$cliente->signed_date?></strong>

        <?php }if($cliente->status_process === 'signcontract') {?>

        <input id="nombre" name="nombre" type="text"  value="<?=$cliente->last_name .' '.$cliente->first_name?>" readonly> Cuit / Cuil 
        <input id="cuit" name="cuit" type="text" placeholder="Ingrese Cuit/Cuil" value="<?=$cliente->cuit?>" > (en adelante el Recolector) con domicilio en 
        <input id="domicilio" name="domicilio" type="text" placeholder="Ingrese domicilio" value="<?=$cliente->home_address?>"  readonly>, convienen la locación de servicios denominada recolección de decodificadores y /o módems prestada por parte del Recolector únicamente a Express .
            Vehículo integrado al contrato marca

            <input id="marca" name="marca" type="text" placeholder="Ingrese marca" value="<?=$cliente->vehicle_brand?>" > modelo 
            <input id="modelo" name="modelo" type="text" placeholder="Ingrese modelo" value="<?=$cliente->vehicle_model?>"> patente 
            <input id="patente" name="patente" type="text" required placeholder="Ingrese patente" value="<?=$cliente->patent?>"> Siendo 
            <input id="fecha_firma" name="fecha_firma" value="<?=date('d-m-Y')?>"  type="text" readonly>
           
        </p>
        <?php } ?>
        <p style="text-align: justify;">
                <strong>-ESPECIFICACION DE SERVICIO</strong>
            </p>
            <p style="text-align: justify;">
                Dada una base de datos para la ZONA (código postal) ASIGNADA de una operadora de cable o satelital, El Recolector procede a rutear y visitar a quien se halle en el domicilio de cliente, controlando la coincidencia de n° de serie, procediendo entregar el remito con el correspondiente detalle y al retiro del mismo
            </p>
            <p style="text-align: justify;">
                <strong>-PRESTACIÓN DEL SERVICIO</strong>
            </p>
            <p style="text-align: justify;">
                -Express envía una base de datos al Recolector vía mail con los datos de la persona y el equipo a retirar. Definiendo como mail de contacto: 
                <?php if($cliente->status_process === 'signcontract'){?>
                     <input id="email" name="email" type="text" placeholder="Ingrese email" value="<?=$cliente->mail?>"  readonly> Teléfono/ Celular de contacto: 
                     <input id="telefono" name="telefono" type="text" placeholder="Ingrese telefono" value="<?=$cliente->phone_number?>" readonly>
               <?php  } if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active'){ ?>
                <strong><?=$cliente->mail?></strong> Teléfono/ Celular de contacto: <strong><?=$cliente->phone_number?></strong>

                   <?php   }?>

        </p>
            <p style="text-align: justify;">
                -Visita con los medios propios el domicilio del cliente SIN INGRESAR AL MISMO ni efectuar otra acción que la de recibir el equipo o cobro de valor alguno, comparando coincidencia de datos equipo / cliente.
            </p>
            <p style="text-align: justify;">
                -El Recolector procede a visitar al cliente, entregarle el cupón (remito) por el / los equipos.
            </p>
            <p style="text-align: justify;">
                -Semanalmente le será retirado del domicilio operativo el total recolectado y acreditado por un remito que le entregara Express.
            </p>
            <p style="text-align: justify;">
                <strong>-CONTROL DE CALIDAD</strong>
            </p>
            <p style="text-align: justify;">
                -Express auditará los retiros, El Recolector deberá al menos tomar contacto con el 10% de la base dada durante la primera semana desde recibida la base de datos por mail. Exigiéndose un 50% mensual, deberá informar las situaciones negativas.
                En caso de un nivel de retiros y entregas menor del 10% de la base a fin de cada mes. Se considera automáticamente disuelto este contrato de locación de servicios. Sin perjuicio del pago de lo ya retirado al Recolector. Y se conviene la posibilidad de Express de admitir otro Recolector en la misma zona sin aviso previo.
            </p>
            <p style="text-align: justify;margin:2rem auto;">
                <strong>-RESGUARDO DE REPRESENTACION</strong>
            </p>
            <p style="text-align: justify;">
                -El Recolector asume solo representación para Express, no para las marcas / clientes de este.
                No podrá utilizar de modo alguno las marcas, logos o propiedad intelectual de cualquier tipo de los clientes de Express por medio alguno, salvo lo específicamente autorizado por este para los fines de este contrato.

            </p>
            <p style="text-align: justify;">
                <strong>-DESPACHO DE EQUIPOS </strong>
            </p>
            <p style="text-align: justify;">
                -En el caso de AMBA (Cap. Y GBA) el Recolector puede entregar los mismo en la base de Express en San Martín o solicitar el retiro por una unidad de Express.
                Se considera como válida para los efectos del pago la fecha del remito.


            </p>
            <p style="text-align: justify;">
                <strong>-PENALIDADES </strong>
            </p>
            <p style="text-align: justify;">
                -El contratista deberá poner a disposición fehaciente e informar la disponibilidad del equipo recibido. Esta disponibilidad en ningún caso podrá superar los 30 días para AMBA y 60 días para interior del país. La penalidad por retención indebida del equipo es de 10 dólares mes.
            </p>
            <p style="text-align: justify;">
                <strong>-PAGO AL RECOLECTOR </strong>
            </p>
            <p style="text-align: justify;">
                -Por equipo retirado (no por domicilio o visita), <strong>QUINCENAL</strong> a semana vencida y conforme a detalle de remitos por semana. El Recolector deberá enviar cada lunes vía mail un detalle indicando operador, cantidad y nro. de remito.
                Facturación, <strong>QUINCENAL</strong> con envío de la misma.
            </p>

            <p style="text-align: justify;">
                El pago ÚNICAMENTE se hace por TRANSFERENCIA en cuenta bancaria de ahorro o corriente , la que el Recolector define aquí :
                </p>

            <?php if($cliente->status_process === 'signcontract'){?>

                CBU: <input type="text" id="cbu" name="cbu" value="<?=$cliente->cbu?>" placeholder="Ingresar CBU"> BANCO: <input type="text" id="banco" name="banco" value="<?=$cliente->banco?>" placeholder="Ingresar BANCO"> 
                
                <?php }?>
                 <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active'){ ?>

                    <p style="text-align: justify;">
                        CBU: <?=$cliente->cbu?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BANCO: <?=$cliente->banco?>
                      </p>
                <?php }?>

              <p style="text-align: justify;">
                <strong>Notas</strong>
              </p>
              <p style="text-align: justify;">
                - Es quipamiento muy liviano : entre 200 y 500 grs, sin riesgos químicos o mecánicos
              </p>
              <p style="text-align: justify;">
                - Los <strong>valores a pagar son por equipo</strong>, suele haber mas de un equipo por domicilio
              </p>
              <p style="text-align: justify;">
                - Existe posibilidad de contacto con el cliente , corre por total cuenta del Recolector
              </p>
              <p style="text-align: justify;">
                - No es exigible el ingreso a zonas denominadas peligrosas, el 90% de los lugares son accesibles.
              </p>
              <p style="text-align: justify;">
                - El Recolector deberá poseer acceso personal o contratado con internet, manejo de Excel.
              </p>
              <p style="text-align: justify;">
                - Si reside en AMBA ) hasta CP 1900 , recibirá planillas por duplicado impresas , si decide hacer copias es a su cargo
              </p>
            
            
            <?php if($cliente->status_process === 'signcontract'){?>

                <button id="acepto" name="acepto" class="btn btn-success"> ACEPTO </button>
                <button id="noacepto" name="noacepto" class="btn btn-danger"> NO ACEPTO </button>

                    <?php }?>

            <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active'){ ?>
                
               
                
                <img width="280" height="200" src="<?=base_url?>resources/firmas/<?=$cliente->img_signed?>" alt="">
                <p>
                <strong> <h5> Firma </h5></strong>
                <span><strong>Aclaración :</strong> <?=$cliente->first_name.' '.$cliente->last_name?> </span> <span><strong>Documento :</strong> <?=$cliente->id_number?> </span>
                </p>
                
                <?php }

                }?>
        
        
    </div>
</div>

<?php require_once '../views/layout/footer.php' ?>
<?php require_once '../views/modal/trabajo/signed_contract.php'; ?>
<script src="<?= base_url ?>assets/work/signed_contract.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


