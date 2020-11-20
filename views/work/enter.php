<?php require_once '../views/layout/header.php' ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script> -->
<style>
    .form-enter {
        display: flex;
        justify-content: center;
        align-content: center;

    }
</style>



<div class="form-enter">
    

  
        <form action="<?=base_url?>control/usuarioControllers.php?usuario&accion=showContract" method="POST">


       
        <div class="form-group">

        <?php if(isset($_SESSION["error_usuario_contract"])  && $_SESSION["error_usuario_contract"] === 'noExisteUsuario'){ ?>
   
   
   <h5 style="color:red;box-shadow:0 10px 30px rgba(0,0,0,0.2);padding:5px;text-align:center;border-radius:10px;">No existe el úsuario ingresado</h5>
  
       
   <?php } ?>
        
            
        </div>

        <div class="form-group">
            <h5>Ingresa tu número de documento</h5>
        </div>

        <div class="form-group">
            <input type="text" name="numerodoc" class="form-control">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-info" >Enviar</button>
        </div>
        </form>
    
</div>

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
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php Utils::deleteSession('error_usuario_contract'); ?>
<?php require_once '../views/layout/footer.php' ?>
<?php require_once '../views/modal/trabajo/signed_contract.php'; ?>
<script src="<?= base_url ?>assets/work/signed_contract.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->