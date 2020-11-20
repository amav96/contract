<?php
//  require_once '../../config/parametros.php';
// require_once '../../config/db.php';
// require_once '../../control/usuarioControllers.php';

?>

<!-- --------------------------------2------------------------------------------->
<?php require_once '../views/layout/header.php' ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script> 



<?php  if($cliente->status_process === '' || $cliente->status_process === null || $cliente->status_process === 'registered' || $cliente->status_process === 'doesNotQualify' || $cliente->status_process === 'down' ){ 
    
    
    ?>

    
    <h5 class="text-center">Usuario <?=$cliente->first_name.' '.$cliente->last_name?> En procesamiento de solicitud. </h5>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

 <?php } else { ?>


    <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>

       <div class="container" >
       <h3 style="margin:5rem auto 1rem auto;" class="text-center">Contrato listo</h3>
           <div style="display:flex;justify-content:center;" class="boton">
          
         <button style="margin:1rem auto 1rem auto;" id="donwload" name="donwload" class="text-center btn btn-danger"> Descargar </button>
         </div>
         </div>
         
         
         <?php } ?>
         
         <div class="container" id="invoice" >

         <div class="text-center titulo-contract" >
         
         
         <!-- //TEMPLATE PARA RECOLECTOR-------- -->


         
         <?php if($cliente->type_request === 'recolector' || $cliente->type_request === 'empleado'  || $cliente->type_request === 'empleado-completado'){ ?>


        
            <h6>CONTRATO DE LOCACIÓN DE SERVICIOS DE RECOLECCION DE DECODIFICADORES Y MODEMS</h6>


                <p style="text-align: justify;"><u>Express es una empresa de Logística reconocida y con 11 años en el mercado y con clientes de primera línea .</u></p>
                <p style="text-align: justify;"> Las partes independientes , Express Metropolitana de Servicios SRL Cuit 30-70944102-3 y el Sr

                <!-- Si la solicitud ya esta firmada -->
            <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>
                
                <strong><?=$cliente->last_name .' '.$cliente->first_name?></strong> Cuit / Cuil <strong><?=$cliente->cuit?></strong> (en adelante el Recolector) con domicilio en <strong><?=$cliente->home_address?></strong> , convienen la locación de servicios denominada recolección de decodificadores y /o módems prestada por parte del Recolector únicamente a Express .
                Vehículo integrado al contrato marca : <strong><?=$cliente->vehicle_brand?></strong>  modelo : <strong><?=$cliente->vehicle_model?></strong> patente : <strong><?=$cliente->patent?></strong> siendo <strong><?=$cliente->signed_date?></strong>

            <?php }if($cliente->status_process === 'signcontract') {?>

            <input id="nombre" name="nombre" type="text"  value="<?=$cliente->last_name .' '.$cliente->first_name?>" readonly> Cuit / Cuil 
            <input id="cuit" name="cuit" type="text" placeholder="Ingrese Cuit/Cuil" value="<?=$cliente->cuit?>" > (en adelante el Recolector) con domicilio en 
            <input id="domicilio" name="domicilio" type="text" placeholder="Ingrese domicilio" value="<?=$cliente->home_address?>"  readonly>, convienen la locación de servicios denominada recolección de decodificadores y /o módems prestada por parte del Recolector únicamente a Express .
                Vehículo integrado al contrato marca

                <input  class="marca" id="marca" name="marca" type="text" placeholder="Ingrese marca" value="<?=$cliente->vehicle_brand?>" > modelo 
                <input class="modelo" id="modelo" name="modelo" type="text" placeholder="Ingrese modelo" value="<?=$cliente->vehicle_model?>"> patente 
                <input class="patente" id="patente" name="patente" type="text" required placeholder="Ingrese patente" value="<?=$cliente->patent?>"> Siendo 
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
                    <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show' ){ ?>

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


              <?php } ?>


              <!-- FIN TEMPLATE RECOLECTORES -->

              
              <!-- TEMPLATE CALL CENTER ------->


              <?php if($cliente->type_request === 'call'){ ?>

                <h6>CONTRATO DE LOCACIÓN DE SERVICIOS DE RECOLECCION DE DECODIFICADORES Y MODEMS</h6>


            <p style="text-align: justify;"><u>Express es una empresa de Logística reconocida y con 11 años en el mercado y con clientes de primera línea .</u></p> 
            <br>
            <p style="text-align: justify;"> Las partes independientes , Express Metropolitana de Servicios SRL Cuit 30-70944102-3 y el Sr

            <!-- Si la solicitud ya esta firmada -->
        <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>
            
            <strong><?=$cliente->last_name .' '.$cliente->first_name?></strong> Cuit / Cuil <strong><?=$cliente->cuit?></strong> (en adelante el Recolector) con domicilio en <strong><?=$cliente->home_address?></strong> , convienen la locación de servicios denominada recolección de decodificadores y /o módems prestada por parte del Recolector únicamente a Express . Siendo <strong><?=$cliente->signed_date?></strong>

        <?php }if($cliente->status_process === 'signcontract') {?>

        <input id="nombre" name="nombre" type="text"  value="<?=$cliente->last_name .' '.$cliente->first_name?>" readonly> Cuit / Cuil 
        <input id="cuit" name="cuit" type="text" placeholder="Ingrese Cuit/Cuil" value="<?=$cliente->cuit?>" > (en adelante el Recolector) con domicilio en 
        <input id="domicilio" name="domicilio" type="text" placeholder="Ingrese domicilio" value="<?=$cliente->home_address?>"  readonly>, convienen la locación de servicios denominada recolección de decodificadores y /o módems prestada por parte del Recolector únicamente a Express .
        
        </p>
        <?php } ?>
        <p style="text-align: justify;">
                <strong>-ESPECIFICACION DE SERVICIO</strong>
            </p>
            <p style="text-align: justify;">
            Dada una base de datos para la ZONA (código postal) ASIGNADA de una operadora de cable o satelital, El
            Operador procede a llamar para combinar pactados con día y hora, controlando la coincidencia de Nombre del
            titular, dirección, localidad, código postal, dirección de mails, teléfono de contacto.
            </p>
            <p style="text-align: justify;">
                <strong>-PRESTACIÓN DEL SERVICIO</strong>
            </p>
            <p style="text-align: justify;">
                -Express envía una base de datos al Operador de call vía mail con los datos de la persona y el equipo a retirar. Definiendo como mail de contacto: 
                <?php if($cliente->status_process === 'signcontract'){?>
                     <input id="email" name="email" type="text" placeholder="Ingrese email" value="<?=$cliente->mail?>"  readonly> Teléfono/ Celular de contacto: 
                     <input id="telefono" name="telefono" type="text" placeholder="Ingrese telefono" value="<?=$cliente->phone_number?>" readonly>
               <?php  } if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>
                <strong><?=$cliente->mail?></strong> Teléfono/ Celular de contacto: <strong><?=$cliente->phone_number?></strong>

                   <?php   }?>

        </p>
          
            <p style="text-align: justify;">
                <strong>-PAGO AL RECOLECTOR </strong>
            </p>
            <p style="text-align: justify;">
                
            Facturación <strong>QUINCENAL</strong> Considerada del 1 al 15 y 16 al 30
            </p>

            <p style="text-align: justify;">
                
            <strong>Las bases enviadas para realización de call center por terceros,
            mantendrán las siguientes tarifas. Además, tendrán modificadores
            de Calidad que ajustar como bono mensual liquidado sobre el total
            generado por cada operador:</strong> 
            </p>
            <p style="text-align: justify;">
                
            <strong>Precio por pactado informado</strong>   
            <br>
            <strong>Llamados bases residenciales .............. $27 cada pactado.</strong>   
            </p>

            <p style="text-align: justify;">
                El pago <strong>ÚNICAMENTE</strong>  se hace por <strong>TRANSFERENCIA</strong>  en cuenta bancaria de ahorro o corriente , la que el Recolector define aquí :
                </p>

            <?php if($cliente->status_process === 'signcontract'){?>

                CBU: <input type="text" id="cbu" name="cbu" value="<?=$cliente->cbu?>" placeholder="Ingresar CBU"> BANCO: <input type="text" id="banco" name="banco" value="<?=$cliente->banco?>" placeholder="Ingresar BANCO"> 
                
                <?php }?>
                 <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>

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

              <?php  }?>


              <!-- FIN DE TEMPLATE PARA CALL CENTER -->


              <!-- TEMPLATE PARA COMERCIOS -->


              <?php if($cliente->type_request === 'comercio'){ ?>



                <h6>CONTRATO DE LOCACIÓN DE SERVICIOS DE RECOLECCION DE DECODIFICADORES Y MODEMS</h6>


        <p style="text-align: center;"><u>COMERCIOS - CONTRATO DE LOCACIÓN DE SERVICIOS DE RECEPCIÓN DE DECODIFICADORES Y MODEMS CO 06-2017 B.</u></p>

        <p style="text-align: justify;">
        Express es una empresa de Logística reconocida con  12 años en el mercado y con clientes de primera línea .
        <br>
        El Comercio que declara ser una entidad independiente y con atención franca al publico en los siguientes días
        y horarios y días :

        <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>

       <strong> <?= $cliente->customer_service_hours?></strong>

            </p>
        <?php }?>
        <?php if($cliente->status_process === 'signcontract'){ ?>

            <input type="text" name="horarios" id="horarios" placeholder="Horarios/Dias Atención" value="<?=$cliente->customer_service_hours?>">

            </p>
         <?php }?>
 
               <!--  -->


         <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>
            <p style="text-align: justify;">
            Las partes independientes, Express Metropolitana de Servicios SRL CUIT 30-70944102-3, representada en
                este acto por Julio E. Mesa, en su carácter de Apoderado,  y <strong><?=$cliente->name_ecommerce?></strong> CUIT / CUIL  <strong><?=$cliente->cuit?></strong> representada en este acto por <strong><?=$cliente->last_name.' '.$cliente->first_name?></strong>   en su caracter de <strong>Dueño</strong> (en adelante EL COMERCIO) con domicilio comercial en <strong><?=$cliente->home_address?></strong>. Conviene la locación de servicios denominada recepción de decodificadores y /o modems prestada por parte de EL COMERCIO únicamente a Express. Siendo <strong><?=$cliente->signed_date?></strong>.
              </p>
              
            <?php }?>
            <?php if($cliente->status_process === 'signcontract'){ ?>

                Las partes independientes, Express Metropolitana de Servicios SRL CUIT 30-70944102-3, representada en
                este acto por Julio E. Mesa, en su carácter de Apoderado,  y 
                <input id="nombre_comercio" name="nombre_comercio" type="text" placeholder="nombre del comercio" value="<?=$cliente->name_ecommerce?>" > 
                CUIT/CUIL 
                <input id="cuit" name="cuit" type="text" placeholder="Ingrese su CUIT/CUIL" value="<?=$cliente->cuit?>"  > representada en este acto por <strong><?=$cliente->last_name.' '.$cliente->first_name?></strong> en su caracter de <strong>Dueño</strong> (en adelante EL COMERCIO) con domicilio comercial en 
                 <input id="domicilio" name="domicilio" type="text" placeholder="Ingrese domicilio" value="<?=$cliente->home_address?>"  readonly>.
                  Conviene la locación de servicios denominada recepción de decodificadores y /o modems prestada por parte de EL COMERCIO únicamente a Express. Siendo
                   <input id="fecha_firma" name="fecha_firma" value="<?=date('d-m-Y')?>"  type="text" readonly>.
                
            <?php }?>

            <p style="text-align: justify;">
            <strong>ESPECIFICACION DE SERVICIO ENTRE PARTES</strong>  

            </p>
            <p style="text-align: justify;">
            EL COMERCIO procederá  como agente  de Express  y en su horario comercial declarado a “recibir y controlar visualmente”  decodificadores , módems y eventuales accesorios  , verificando su existencia en una base de datos provista por Express :  la coincidencia de n° de serie y modelo  , procediendo  entregar la copia 1 del  remito con el correspondiente detalle  y a la recepción  del mismo  y disponiendo la copia 2 pegado en el equipo recibido .Se presume un remito por cliente.  

            </p>
            <p style="text-align: justify;">
            En algunos clientes el Comercio recibirá material o souvenir que a modo de premio entregara a los abonados que se presenten DE FORMA GRATUITA .
            Procediendo a la guarda de los equipos recibido en la caja recolectora (master box de aprox.45x40x37 cm) resguarda en lugar seguro, con tapa) la que será semanalmente entregada y retirada por las unidades de Express, con entrega de remito a EL COMERCIO  único documento valido de facturación de base de facturación a Express .
            </p>

            <p style="text-align: justify;">
            En algunos clientes el Comercio recibirá material o souvenir que a modo de premio entregara a los abonados que se presenten DE FORMA GRATUITA .
            Procediendo a la guarda de los equipos recibido en la caja recolectora (master box de aprox.45x40x37 cm) resguarda en lugar seguro, con tapa) la que será semanalmente entregada y retirada por las unidades de Express, con entrega de remito a EL COMERCIO  único documento valido de facturación de base de facturación a Express .
            </p>

            <p style="text-align: justify;">

            - EL COMERCIO   se compromete a su responsabilidad de cuidado y guarda, de colocar de forma externa y a la vista del público un CARTEL provisto por Express   para una mejor ubicación del servicio. Así como no modificar la estructura original, ni a cederlo o venderlo a 3ros.
            Asimismo Express se compromete proveer al Comercio de cajas contenedoras para la guarda y entrega / despacho  de los equipos  . Así como los productos de promoción / souvenirs sin cargo .
            </p>

            <p style="text-align: justify;">

            CONTROL DE CALIDAD RECEPCIÓN (Y EVENTUAL RETIRO)
            </p>
            <p style="text-align: justify;">
            <ul style="text-align: left;">
                <li>
                Express auditara la recepción adecuada a los clientes, así como las condiciones de almacenaje y confección de remitos.
                </li>
                <li>
                EL COMERCIO    deberá informar MESUALMENTE un resumen vía mail las situaciones negativas (eventual indicación de clientes que informen perdida, robo o extravío del equipo).
                </li>
            </ul>
        
            </p>

            <p style="text-align: justify;">

            Aspectos Legales específicos 
            <br>
            Se considera como valida para los efectos del pago la fecha del remito.
                </p>
                
                <p style="text-align: justify;">

                El Comercio no podrá retener, alterar o dañar equipos de forma total o parcial bajo consideración de daño postal y sus consideraciones de Ley Postal Nº 20216. La entrega   a Express es inmediata, estipulándose como tal el próximo circuito de recolección acordado
                </p>
                <p style="text-align: justify;">
                <strong>RESERVA DE INFORMACIÓN</strong> 
                </p>
                <p style="text-align: justify;">
                EL COMERCIO se compromete bajo juramento de confidencialidad a utilizar la información brindada en bases de datos entregadas por cualquier medio de comunicación para el uso UNICO DE LOS FINES DE ESTE CONTRATO, y a su no difusión a 3ros. Bajo conocimiento de las Leyes de HABEAS DATA Nº-25316 y de SECRETO POSTAL Nº 20216 Art 6º.
                </p>
                <p style="text-align: justify;">
                <strong>RESGUARDO DE REPRESENTACION</strong> 
                </p>
                <p style="text-align: justify;">
                El Comercio asume solo representación para Express , no para las marcas / clientes de este .
                No podrá  utilizar de modo alguno las marcas ,logos  o propiedad intelectual de cualquier tipo  de los clientes de Express  por medio alguno, salvo lo  específicamente autorizado por Express para los fines de este contrato 
                </p>

                <p style="text-align: justify;">
                <strong>PAGO A EL COMERCIO</strong> 
                </p>
                <p style="text-align: justify;">
                Se abonará un valor / tarifa por decodificador / MODEM retirado por la unid de Express, EL PAGO se establece semanalmente a semana vencida y conforme a detalle de remitos por semana. EL COMERCIO deberá enviar cada lunes vía mail un detalle indicando operador, cantidad y número de remito.
                </p>

                <p style="text-align: justify;">
                    El pago <strong> ÚNICAMENTE</strong> se hace por <strong>TRANSFERENCIA</strong> en cuenta bancaria de ahorro o corriente , la que el COMERCIO define aquí :
                    </p>

                <?php if($cliente->status_process === 'signcontract'){?>

                    CBU: <input type="text" id="cbu" name="cbu" value="<?=$cliente->cbu?>" placeholder="Ingresar CBU"> BANCO: <input type="text" id="banco" name="banco" value="<?=$cliente->banco?>" placeholder="Ingresar BANCO"> 
                    
                    <?php }?>
                    <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>

                        <p style="text-align: justify;">
                            CBU: <?=$cliente->cbu?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BANCO: <?=$cliente->banco?>
                        </p>
                    <?php }?>

                    <p style="text-align: justify;">
                    El Comercio deberá emitir una factura RESUMEN mensual sea A o C. Mas allá de los pagos semanales que se presumen a cuenta
                    </p>

                    <p style="text-align: left;">
                    Notas :
                    <ul style="text-align: left;">
                        <li>Es equipamiento muy liviano: entre 200 y 500 grs, sin riesgos químicos o mecánicos</li>
                        <li>
                        los valores por pagar son por equipo, suele haber más de un equipo por cliente.
                        </li>
                        <li>
                        Existe posibilidad de contacto con el cliente, corre por total cuenta del Recolector  previa acuerdo general con Express
                        </li>
                        <li>
                        Los precios por equipo entregado efectivamente a Express son  en pesos y conforme a tarifarlo enviado vía mail , actualizándose a discreción de la empresa y sobre la base de sus respectivos remitos 
 
                        </li>
                    </ul>
                </p>
                   

                    <p style="text-align: justify;">
                    <strong>CONFIIDENCIALIDAD Y EFECTOS POSTALES </strong>
                    <br>
                    Se considera el presente contrato enmarcado dentro los general  la Ley Postal 20216 , en particular su Art.6 . El  Decreto 1187/93 .  Art.153 al 157 , 194 , 197,254,255 y 288 del Codigo Penal . No pudiendo ninguna de las partes ceder y obligaciones emanadas de tales leyes o decretos 
                    El Comercio no podrá divulgar , trasmitir o copiar la  información recibida , con carácter confidencial y UNICAMENTE para los fines del servicio de agencia .
                    <br>
                    Es potestad de Express definir los plazos de uso de la información , absteniéndose el Comercio continuar con el uso de la misma aun para recepción una vez cancelada la misma de forma total o parcial .
                    Por las características postales de este servicio los equipos no podrán retenidos bajo ninguna razón , debiendo disponerse a Express de forma diligente conforme a los medios de entrega arriba expuestos .
                    </p>

                    <p style="text-align: justify;">
                   <strong> RESCISIÓN DEL CONTRATO</strong>
                    <br>
                    Las partes acuerdan la rescisión unilateral del contrato con una antelación no menor de 30 días de manera de ordenar las comunicaciones y la inercia de entrega en su local.
                    La  rescision del contrato no exime de la devolución de los equipos en guarda , ni la condicion de confidencialidad.
                    </p>

                    <p style="text-align: justify;">
                    
                    <strong>JURISDICCIÓN</strong>  Para la interpretación y cumplimiento del presente contrato, las partes se someten a la jurisdicción de las leyes y tribunales de la Capital Federal , renunciando desde ahora a cualquier otro fuero que pudiera corresponderles por razón de sus domicilios presentes o futuros o por cualquier otra causa, señalando esde este momento como sus domicilios legales
                    </p>







              <?php } ?>


              <!-- FIN DE TEMPLATE PARA COMERCIOS -->



            
            <?php if($cliente->status_process === 'signcontract'){?>

                <button id="acepto" name="acepto" class="btn btn-success"> ACEPTO </button>
                <button id="noacepto" name="noacepto" class="btn btn-danger"> NO ACEPTO </button>

                    <?php }?>

            <?php if($cliente->status_process === 'signedcontract' || $cliente->status_process === 'active' || $cliente->status_process === 'show'){ ?>
                
               
                
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


