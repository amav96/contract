<?php
    $ru2='../';
    $db='database';
    $ta1='recolectores';

    if (isset($_POST['ingresarClient'])) {
        session_start();
        require($ru2.'const.php');
        require($ru2.DIRMOR.$db.'.php');
        $_db = new $db();

        $id_recolector=$_POST['id_recolector'];

        $sql="SELECT id_recolector, nombre_recolector FROM ".$ta1." WHERE id_recolector='".$id_recolector."' ;";
        $res=mysqli_query($_db->conect03(), $sql);
        if ($res) {
            if ($res->num_rows > 0) {
                while ($row = mysqli_fetch_array($res)) {
                    $_SESSION["id_recolector"] = $row['id_recolector'];
                    $_SESSION['nombre_recolector'] = $row['nombre_recolector'];
                    $_SESSION['logged_user'] = true;
                }
                mysqli_close($_db->conect03());
                header('Location: ../vistas/datoscliente.php');
                exit();
            }else{
                $_SESSION['Msg_error'] = 'El id ingresado no se encuentra.';
                
                mysqli_close($_db->conect03());
                header('Location: ./loginrecolector.php');
                exit();
            }
        }else{
            $_SESSION['Msg_error'] = 'No se ejecutó la Consulta.';
            mysqli_close($_db->conect03());
                
            header('Location: ./loginrecolector.php');
            exit();
        }
    }
?>
  