<?php 

    class AdminView {

        public static function print($data){

            $active = array(
                'usuarios' => '',
                'videos' => ''
              ); 
              
              if(isset($_GET['o'])){
                switch($_GET['o']){
                  case 'usuarios':
                  case 'videos':
                    $active[$_GET['o']]='active';
                    break;
                  default:
                    $active['usuarios'] = 'active';
                    break;
                }
              } else {
                $active['usuarios'] = 'active';
            }

            $view = '
                <div class="">
                    <ul class="nav nav-tabs ">
                        <li class="nav-item">
                            <a class="nav-link '.$active['usuarios'].'" href="?p=admin&o=usuarios">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link '.$active['videos'].'" href="?p=admin&o=videos">Videos</a>
                        </li>
                    </ul>
                
                </div>
            
            ';

            return $view;

        }

    }


?>
