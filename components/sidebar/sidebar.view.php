<?php 

    class SidebarView {

        public static function print(){
            $view = '
            
            
                <div class="container-fluid">
                    
                    <div class="h4 mb-3">
                       Ir a Cursos:
                    </div>

                    <ul class="list-group form-control-sm">
                    <li class="list-group-item active" aria-disabled="true">A disabled item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                    </ul>
                
                </div>
            
            
            ';

            return $view;

        }

    }

?>

