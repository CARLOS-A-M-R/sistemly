<?php 

class ControladorFormularios
{
     /*===========================================================* 
     Mostrar contenido de la tabla sistemly
     =============================================================*/
     static public function ctrMostrarSistemly()
     {
     	$tabla = "tbl_sistemly";

     	$respuesta = ModeloFormularios::mdlMostrarSistemly($tabla);

     	return $respuesta;
     }

     static public function ctrRegistro()
     {
          if(isset($_POST["registroNombre"]))
          {
               $tabla = "tbl_cuentas_usuarios";

               $datos = array("tcu_nombre_cuenta" => $_POST["registroNombre"],
                              "tcu_clave_cuenta" => $_POST["registroClave"]);

               $respuesta = ModeloFormularios::mdlRegistro($tabla,$datos);
               
               return $respuesta;
          }
     }

     static public function ctrRegistroPersonal()
     {
          if(isset($_POST["nombreRegistro"]))
          {
               $tabla = "tbl_personal";

               $datos = array(
                                   "tp_nombre" => $_POST["nombreRegistro"],
                                   "tp_apellidos" => $_POST["apellidoRegistro"],
                                   "tp_domicilio" => $_POST["domicilioRegistro"],
                                   "tp_ocupacion" => $_POST["ocupacionRegistro"],
                                   "tp_telefono" => $_POST["telefonoRegistro"],
                                   "tp_email" => $_POST["emailRegistro"],
                                   "tp_edad" => $_POST["edadRegistro"],
                                   "tp_cod_personal" => $_POST["idpersonal"]
                              );

               $respuesta = ModeloFormularios::mdlRegistroPersonal($tabla,$datos);
               
               return $respuesta;
          }
     }

     static public function ctrMostrarUsuarios()
     {
          $tabla = "tbl_cuentas_usuarios";

          

          $respuesta = ModeloFormularios::mdlMostrarUsuarios($tabla,null,null);

          return $respuesta;
     }

     public function ctrIngreso()
     {

          if(isset($_POST["ingresoNombre"]))
          {
               $tabla = "tbl_cuentas_usuarios";
               $item = "tcu_nombre_cuenta";
               $valor = $_POST["ingresoNombre"];
               

               $respuesta = ModeloFormularios::mdlMostrarUsuarios($tabla,$item,$valor);

               if($respuesta["tcu_nombre_cuenta"] == $_POST["ingresoNombre"] && $respuesta["tcu_clave_cuenta"] == $_POST["ingresoClave"])
               {

                    $_SESSION["validarIngreso"] = $respuesta["tcu_nombre_cuenta"];
                   
                    echo '<script>
                    
                    if(window.history.replaceState)
                    {
                         window.history.replaceState(null,null,window.location.href);
                    }
                    window.location = "sistemly.php?pagina=inicio";

                    
                    
                    </script>';

               }else{

                    echo '<script>
                              if(window.history.replaceState)
                              {
                                   window.history.replaceState(null,null,window.location.href);
                              }
                              </script>';    
                    echo '<div class="alert alert-danger">
                              Error al ingresar al sistema, el nombre o la contraseña no coinciden
                         </div>';          
               }

              // echo '<prev>'; print_r($respuesta); echo '</prev>';

          }
     }

     public function ctrMostrarPersonal()
     {
          
          $tabla = "tbl_personal";

 
          $respuesta = ModeloFormularios::mdlMostrarPersonal($tabla);

          return $respuesta;
     }

     public function ctrMostrarPermisos()
     {
          
          $tabla = "tbl_permisos_sistemly";

 
          $respuesta = ModeloFormularios::mdlMostrarPermisos($tabla);

          return $respuesta;
     }

     public function ctrMostrarPermisos_id($variable)
     {
          
          $tabla = "tbl_usuario_permiso";

          $codigo = $variable;
 
          $respuesta = ModeloFormularios::mdlMostrarPermisos_id($tabla,$codigo);

          return $respuesta;
     }


     public function ctrMostrarPersonaldos($variable)
     {
          
          $tabla = "tbl_personal";

          $codigo = $variable;     
          
          $respuesta = ModeloFormularios::mdlMostrarPersonaldos($tabla,$codigo);

          return $respuesta;
     }


     public function ctrDesactivarPersonal($variable)
     {
          
               $tabla = "tbl_personal";
               $codigo = $variable;

               $respuesta = ModeloFormularios::mdlDesactivarPersonal($tabla,$codigo);
               
               return $respuesta;   
     }

     public function ctrDesactivarCuenta($variable)
     {
          
               $tabla = "tbl_cuentas_usuarios";
               $codigo = $variable;

               $respuesta = ModeloFormularios::mdlDesactivarCuenta($tabla,$codigo);
               
               return $respuesta;   
     }

          public function ctrActivarPersonal($variable)
     {
          
               $tabla = "tbl_personal";
               $codigo = $variable;

               $respuesta = ModeloFormularios::mdlActivarPersonal($tabla,$codigo);
               
               return $respuesta;    
     }

          public function ctrActivarCuenta($variable)
     {
          
               $tabla = "tbl_cuentas_usuarios";
               $codigo = $variable;

               $respuesta = ModeloFormularios::mdlActivarCuenta($tabla,$codigo);
               
               return $respuesta;    
     }

     
     public function ctrActualizarPersonal()
     {
          if(isset($_POST["nombreRegistro"]))
          {
               $tabla = "tbl_personal";

               $datos = array(
                                   "tp_nombre" => $_POST["nombreRegistro"],
                                   "tp_apellidos" => $_POST["apellidoRegistro"],
                                   "tp_domicilio" => $_POST["domicilioRegistro"],
                                   "tp_ocupacion" => $_POST["ocupacionRegistro"],
                                   "tp_telefono" => $_POST["telefonoRegistro"],
                                   "tp_email" => $_POST["emailRegistro"],
                                   "tp_edad" => $_POST["edadRegistro"],
                                   "tp_cod_personal" => $_POST["idpersonal"]
                              );
               $codigo = $_POST["idpersonal"];

               $respuesta = ModeloFormularios::mdlActualizarPersonal($tabla,$datos,$codigo);

               
               return $respuesta;
          }
     }

      public function ctrActualizarCuentas($variable)
     {
          if(isset($_POST["nombreCuenta"]))
          {
               $tabla = "tbl_cuentas_usuarios";

               $datos = array(
                                    "tcu_cod_personal" => $_POST["usuarioCuenta"],
                                   "tcu_nombre_cuenta" => $_POST["nombreCuenta"],
                                   "tcu_clave_cuenta" => $_POST["claveCuenta"],
                                   "tcu_nivel_usuario" => $_POST["nivelCuenta"],
                                   "tcu_cod_cuenta" => $_POST["idusuario"]
                             
                              );

               $codigo = $_POST["idusuario"];

               $tabla2 = "tbl_usuario_permiso";

               $permisos = $variable;

               $respuesta = ModeloFormularios::mdlActualizarCuentas($tabla,$datos,$tabla2,$codigo,$permisos);
               
               return $respuesta;
          }
     }

       public function pendiente($variable) 
     {
          if(isset($_POST["nombreCuenta"]))
          {
               $tabla = "tbl_cuentas_usuarios";

               $datos = array(
                                   "tcu_cod_personal" => $_POST["usuarioCuenta"],
                                   "tcu_nombre_cuenta" => $_POST["nombreCuenta"],
                                   "tcu_clave_cuenta" => $_POST["claveCuenta"],
                                   "tcu_nivel_usuario" => $_POST["nivelCuenta"],
                                   "tcu_cod_cuenta" => $_POST["idusuario"]
                              );

               $tabla2 = "tbl_usuario_permiso";

               $codigo = $_POST["idusuario"];

               $permisos = $variable;

               $respuesta = ModeloFormularios::mdlActualizarCuentas($tabla,$codigo,$datos,$tabla2,$permisos);
               
               return $respuesta;
          }
     }


     static public function ctrRegistroCuentas($variable)
     {
          if(isset($_POST["usuarioCuenta"]))
          {
               $tabla = "tbl_cuentas_usuarios";

               $datos = array(
                                   "tcu_cod_personal" => $_POST["usuarioCuenta"],
                                   "tcu_nombre_cuenta" => $_POST["nombreCuenta"],
                                   "tcu_clave_cuenta" => $_POST["claveCuenta"],
                                   "tcu_nivel_usuario" => $_POST["nivelCuenta"],
                                   "tcu_cod_cuenta" => $_POST["idusuario"]

                                   
                              );

               $tabla2 = "tbl_usuario_permiso";

               $codigo = $variable;

               $respuesta = ModeloFormularios::mdlRegistroCuentas($tabla,$datos,$tabla2,$codigo);
               
               return $respuesta;
          }
     }

      public function ctrMostrarCuentas()
     {
          
          $tabla = "tbl_cuentas_usuarios";

          $tablados = "tbl_personal";
          
          $respuesta = ModeloFormularios::mdlMostrarCuentas($tabla,$tablados);

          return $respuesta;
     }

       public function ctrMostrarCuentas_id($variable)
     {
          
          $tabla = "tbl_cuentas_usuarios";

          $codigo = $variable;     
          
          $respuesta = ModeloFormularios::mdlMostrarCuentas_id($tabla,$codigo);

          return $respuesta;
     }




}






?>        