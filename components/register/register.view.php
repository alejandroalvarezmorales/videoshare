<?php

    class RegisterView {

      public static function print($data){

        $uri = htmlspecialchars($_SERVER['REQUEST_URI']);

        if(isset($data['ok']) && $data['ok'] == true ){
          $regok = '
            <div class="row  h6 alert alert-success ">
                <div class="col-10">
                  Registro completo, espera la autorización.
                </div>
                <i class=" col-1 fa fa-check" ></i>
            </div>
          ';
        } elseif ( $_SERVER['REQUEST_METHOD'] == 'POST') {
          $regok = '
            <div class="row h6 alert alert-danger ">
                <div class="col-10">
                  Error valida tus datos.
                </div>
                <i class=" col-1 fa fa-circle-xmark" ></i>
            </div>
          ';

        } else {
          $regok = '';
        }
        
      


        $view = '
              
        <div class="form-login-base d-flex justify-content-center">
            <form class="form-register align-self-center p-4 shadow border-top border-primary border-6" '.$uri.' method="post" >
              '. $regok .'
            
              <h4 class="mb-0">Formulario de Registro</h4>
              <hr>
              <div class="mb-2">
                <div class="input-group">
                  <div class="input-group-text"> <i class="fa fa-user"></i> </div>
                  <input id="name" name="name" type="text" placeholder="Ingresa tu nombre completo" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="mb-2">
                <div class="input-group">
                  <div class="input-group-text"> <i class="fa fa-phone"></i> </div>
                  <input id="phone" name="phone" type="text" placeholder="Telefono de contacto" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="mb-2">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                  <input id="email" name="email"  type="email" placeholder="Ingresa tu correo electronico." class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="mb-4">
                <div class="input-group">
                  <div class="input-group-text"> <i class="fa fa-key"></i></div>
                  <input name="password" type="password" placeholder="Define un password" class="form-control form-control-sm" id="password" required>
                </div>
              </div>
          
              <button type="registro" class="btn btn-primary ">
                <i class="fa fa-pen p-1"></i>
                Registrarme
              </button>
              <div class="mt-2">
                  <a class="link-reg" href="?p=login">
                    Ir al login.
                  </a>
              </div>

            </form>
          
          </div>
        ';


        return $view;
      }

    }



      
?>