<?php

    class NavbarView {

      public static function print(){

        $view = '
        
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">VideoShare</a>
            <div class=" navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto mb-2 mb-sm-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="?p=inicio">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?p=cursos">Cursos</a>
                </li>
                <li class="nav-item mr-auto">
                  <a class="nav-link" href="?p=admin">Admin</a>
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