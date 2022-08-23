<?php

    class NavbarView {

      public static function print(){

        $active = array(
          'inicio' => '',
          'admin' => '',
          'videos' => ''
        ); 
        
        if(isset($_GET['p'])){
          switch($_GET['p']){
            case 'inicio':
            case 'videos':
            case 'admin':
              $active[$_GET['p']]='active';
              break;
            default:
              $active['inicio'] = 'active';
              break;
          }
        } else {
          $active['inicio'] = 'active';
        }

        $view = '
        
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">VideoShare</a>
            <div class=" navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto mb-2 mb-sm-0">
                <li class="nav-item">
                  <a class="nav-link '.$active['inicio'].'" aria-current="page" href="?p=inicio">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link '.$active['videos'].' " href="?p=videos">Videos</a>
                </li>
                <li class="nav-item mr-auto">
                  <a class="nav-link '.$active['admin'].'" href="?p=admin">Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?p=salir">Salir</a>
                </li>
              </ul>
              </div>
          </div>
        </nav>
        
        
        ';

        return $view;

      }

    }




?>