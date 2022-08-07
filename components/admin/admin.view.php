<?php 

    class AdminView {

        public static function print($data){

            $view = '
                <div class="">
                    <ul class="nav nav-tabs ">
                        <li class="nav-item">
                            <a class="nav-link active" href="?p=admin&o=usuarios">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?p=admin&o=cursos">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?p=admin&o=videos">Videos</a>
                        </li>
                    </ul>
                
                </div>
            
            ';

            return $view;

        }

    }


?>
