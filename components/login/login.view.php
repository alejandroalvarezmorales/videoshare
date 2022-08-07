<?php

  class LoginView {

    public static function print($data){

      $uri = htmlspecialchars($_SERVER['REQUEST_URI']);
      
      if ( sizeof($data['data']) == 0 && sizeof($_POST) > 0){
         $failauth = '
            <div class="row  h6 alert alert-danger ">
                <div class="col-10">
                  Usuario o contraseña incorrectos.
                </div>
                <i class="p-2 col-2 fa fa-circle-xmark" ></i>
            </div>
        ';
      } else $failauth = '';


      $view = '
      
        <div class="form-login-base d-flex justify-content-center" >
            <form class="form-login align-self-center p-4 shadow-lg border-top border-primary" action="'.$uri.'"  method="post">
              '.$failauth.'
              <h4 class="mb-3">login</h4>
              <hr>
              <div class="mb-2">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa fa-user"></i></div>
                  <input autofocus name="email" id="email" type="text" placeholder="Usuario o correo electronico" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="mb-4">
                <div class="input-group">
                  <div class="input-group-text"> <i class="fa fa-key"></i></div>
                  <input name="password" id="password" type="password" placeholder="Password" class="form-control form-control-sm" id="exampleInputPassword1" required>
                </div>
              </div>
          
              <button type="ingresar" class="btn btn-primary ">
                <i class="fa fa-right-to-bracket p-1"></i>
                Ingresar
              </button>
              <div class="mt-2">
    
                <a class="link-reg" href="./?p=register">Registrarme...</a>
              </div>
              
              
            </form>
          </div>
      ';



      return $view;

    }


  }



?>