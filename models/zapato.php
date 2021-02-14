<?php

//IMPORTAMOS LA CONEXION
include_once('./config/Conexion.php');

//OPCIONAL YA QUE TU CONTROLLADOR TIENE A LOS DATOS
include_once('./datos/Zapatos.php');

class Zapato
{

  public $PDO;

  public function __construct()
  {
    try {  //inializamos la clase conexion
      $this->PDO = new Conexion();
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function listarZapatos()
  {
    try {
      $query = "SELECT z.id, z.foto , z.precio, z.color, e.estilo, t.talla, g.genero, z.cantidad 
                       FROM dbozapato z 
                       INNER JOIN dboestilo e on z.dboestilo_id = e.id
                       INNER JOIN dbotalla t on z.dbotalla_id = t.id
                       INNER JOIN dbogenero g ON z.dbogenero_id = g.id";
      $stm = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function listarEstilo()
  {
    try {
      $query = "SELECT * FROM dboestilo";
      $stm   = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function listarTalla()
  {
    try {
      $query = "SELECT * FROM dbotalla";
      $stm = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function listarGenero()
  {
    try {
      $query = "SELECT * FROM dbogenero";
      $stm = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function registrarZapato(ZapatoClass $data)
  {
    try {
      $query = "INSERT INTO dbozapato(foto,precio,color,cantidad,id_dboUsuarios,dboestilo_id,dbotalla_id,dbogenero_id) VALUES(?,?,?,?,?,?,?,?)";
      $stm = $this->PDO->ConectarBD()->prepare($query)->execute(
        array(
          $data->getFoto(),
          $data->getPrecio(),
          $data->getColor(),
          $data->getCantidad(),
          $data->getIdUsuario(),
          $data->getIdestilo(),
          $data->getIdtalla(),
          $data->getIdgenero()
        )
      );
      return $stm;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function updateZapato(ZapatoClass $data)
  {
    try {
      $query = "UPDATE dbozapato SET foto=? , precio=? , color=? , cantidad=? , 
                       id_dboUsuarios=? , dboestilo_id=? ,
                       dbotalla_id=? , dbogenero_id=? WHERE id=?";
      $stm = $this->PDO->ConectarBD()->prepare($query)->execute(
        array(
          $data->getFoto(),
          $data->getPrecio(),
          $data->getColor(),
          $data->getCantidad(),
          $data->getIdUsuario(),
          $data->getIdestilo(),
          $data->getIdtalla(),
          $data->getIdgenero(),
          $data->getIdzapato()
        )
      );
      return $stm;
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function editZapato(ZapatoClass $data)
  {
    try {
      $query = "SELECT * FROM dbozapato WHERE id= ?";
      $stm = $this->PDO->ConectarBD()->prepare($query);
      $stm->execute(array($data->getIdzapato()));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function deleteZapato(ZapatoClass $data)
  {
    try {
      $query = "DELETE FROM dbozapato WHERE id =?";
      $stm = $this->PDO->ConectarBD()->prepare($query)->execute(
        array($data->getIdzapato())
      );
      return $stm;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
