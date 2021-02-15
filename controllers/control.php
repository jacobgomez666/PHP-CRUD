<?php

//IMPORTANDO MODELOS
include_once('./models/zapato.php');

//IMPORTANDO DATOS
include_once('./datos/Zapatos.php');


class Control
{

  public $MODEL;

  public function __construct()
  {
    $this->MODEL = new Zapato(); //INSTANCIA DE MI CLASE Zapato Model
  }

  //VISTA POR DEFECTO
  public function index()
  {
    include_once('views/home.php');
  }

  public function lista()
  {
    include_once('views/zapato/lista.php');
  }


  //FORMULARIO ZAPATO
  public function nuevo()
  {
    include_once('views/zapato/save.php');
  }


  //GUARDAR ZAPATO
  public function guardar()
  {
    try {
      $directorio = "uploads/";
      $archivo = $directorio . basename($_FILES['file']['name']);
      $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

      //validando que es imagen true || o false
      $isImagen = getimagesize($_FILES["file"]["tmp_name"]);

      if ($isImagen) {
        $size = $_FILES["file"]["size"];
        if ($size > 3000000) {
          $msg = "la imagen debe ser menor a 3 megabytes";
          echo $this->MODEL->error($msg);
        } else {
          if ($tipoArchivo == 'jpg' || $tipoArchivo == 'jpeg' || $tipoArchivo == 'png') {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
              try {
                $alm = new ZapatoClass(); //INSTANCIA DE MI CLASE Zapato Class
                $alm->setFoto($archivo);
                $alm->setPrecio($_POST['txtprecio']);
                $alm->setColor($_POST['txtcolor']);
                $alm->setCantidad($_POST['txtcantidad']);
                $alm->setIdUsuario(1);
                $alm->setIdestilo($_POST['cboEstilo']);
                $alm->setIdtalla($_POST['cbotalla']);
                $alm->setIdgenero($_POST['cbogenero']);
                $resultado = $this->MODEL->registrarZapato($alm);
                if ($resultado) {
                  $msg = "Correctamente";
                  echo $this->MODEL->success($msg);
                  include_once('views/zapato/lista.php');
                }
              } catch (\Throwable $th) {
                throw $th;
              }
            } else {
              $msg = "No se guardo el archivo";
              echo $this->MODEL->error($msg);
              include_once('views/zapato/lista.php');
            }
          } else {
            $msg = "la imagen debe extencion Jpeg o jpg";
            echo $this->MODEL->error($msg);
            include_once('views/zapato/lista.php');
          }
        }
      } else {
        $msg = "el documento no es una imagen";
        echo $this->MODEL->error($msg);
        include_once('views/zapato/lista.php');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function editar()
  {
    try {
      $alm = new ZapatoClass();
      $alm->setIdzapato($_REQUEST['id']);
      $dataZapato = $this->MODEL->editZapato($alm);
      include_once('views/zapato/update.php');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function updateZapato()
  {
    try {
      $archivo     =  basename($_FILES['file']['name']);
      $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

      if ($archivo == '') {
        echo "Sin Archivo";
        $alm = new ZapatoClass();
        $alm->setIdzapato($_POST['txtidZapato']);
        $dataZapato = $this->MODEL->editZapato($alm);
        $alm->setFoto($dataZapato->foto);
        $alm->setPrecio($_POST['txtprecio']);
        $alm->setColor($_POST['txtcolor']);
        $alm->setCantidad($_POST['txtcantidad']);
        $alm->setIdUsuario(1);
        $alm->setIdestilo($_POST['cboEstilo']);
        $alm->setIdtalla($_POST['cbotalla']);
        $alm->setIdgenero($_POST['cbogenero']);
        if ($this->MODEL->updateZapato($alm)) {
          $msg = "Se actualizo Correctamente";
          echo $this->MODEL->success($msg);
          include_once('views/zapato/lista.php');
        }
        header("Location: ?c=lista");
      } else {
        if ($tipoArchivo == 'jpg' || $tipoArchivo == 'jpeg' || $tipoArchivo == 'png') {
          $directorio = "uploads/";
          $archivo = $directorio . basename($_FILES['file']['name']);
          if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
            try {
              $alm = new ZapatoClass(); //INSTANCIA DE MI CLASE Zapato Class
              $alm->setIdzapato($_POST['txtidZapato']);
              $dataZapato = $this->MODEL->editZapato($alm);
              $alm->setFoto($archivo);
              $alm->setPrecio($_POST['txtprecio']);
              $alm->setColor($_POST['txtcolor']);
              $alm->setCantidad($_POST['txtcantidad']);
              $alm->setIdUsuario(1);
              $alm->setIdestilo($_POST['cboEstilo']);
              $alm->setIdtalla($_POST['cbotalla']);
              $alm->setIdgenero($_POST['cbogenero']);
              $resultado = $this->MODEL->updateZapato($alm);
              if ($resultado) {
                unlink($dataZapato->foto);
                $msg = "Se actualizo Correctamente";
                echo $this->MODEL->success($msg);
                include_once('views/zapato/lista.php');
              } else {
                $msg = "InCorrectamente";
                echo $this->MODEL->error($msg);
                include_once('views/zapato/lista.php');
              }
            } catch (\Throwable $th) {
              throw $th;
            }
          } else {
            $msg = "No se guardo el archivo";
            echo $this->MODEL->error($msg);
            include_once('views/zapato/lista.php');
          }
        } else {
          $msg = "la imagen debe extencion Jpeg o jpg";
          echo $this->MODEL->error($msg);
          include_once('views/zapato/lista.php');
        }
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function eliminar()
  {
    try {
      $alm = new ZapatoClass();
      $alm->setIdzapato($_REQUEST['id']);
      $dataZapato = $this->MODEL->editZapato($alm);
      if (unlink($dataZapato->foto)) {
        $resultado = $this->MODEL->deleteZapato($alm);
        if ($resultado) {
          $msg = "Eliminado Correctamente";
          echo $this->MODEL->success($msg);
          include_once('views/zapato/lista.php');
        }
      } else {
        $msg = "Archivo No Eliminado.....";
        echo $this->MODEL->error($msg);
        include_once('views/zapato/lista.php');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
