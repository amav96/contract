<?php 
if ($usuario['empresa']==='LAPOS')
                                            {
                                              echo "
                                              <div class='card bg-dark text-green text-center p-5'>
                                              <blockquote class='blockquote mb-4'>
                                                                       
                                                <p class='text-white'><strong>Cliente ".$usuario['identificacion']."".$usuario['nombre_cliente']."</strong></p>
                                                <footer class='blockquote-footer text-white'>
                                                  <small>
                                                     Buenos dias, habiendo acordado la devolución y visita para retiro del equipo ".$usuario['empresa']." Nro. Serie ".$usuario['serie'].", domicilio ".$usuario['direccion'].". Llamenos para coordinar un nuevo dia o nuevo domicilio de retiro.<!--<cite title='Source Title'>Source Title</cite>-->
                                                  </small>
                                                </footer>
                                              </blockquote>
                                            </div>
                                            <div class='card border-dark mb-3' style='max-width: 21rem;'>
  
                                               ";
                                            }