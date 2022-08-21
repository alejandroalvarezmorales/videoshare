<?php 

    class AdminVideosView {

        public static function print($data){
            
            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);

            $view = '<div class="mt-4 row pl-4 pr-4">

                            <form id="search" action="'.$uri.'" class="p-0 m-0" method="post" >
                                <span class="p-3 font-weight-bold ">Filtro:</span>
                                <input name="filtro" class="btn btn-light border"></input>     
                            </form>
                            
                            <span class="mr-auto"> </span>
                            <form id="addfile" action="'.$uri.'" class="p-0 m-0" method="post" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col">
                                        <input name="file" type="file" class="" required>                                
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="add" class="btn btn-primary" type="button">
                                            <i class="fa fa-plus mr-2"></i>
                                            Subir
                                        </button>
                                    </div>
                                </div>
                        
                            </form>
                     </div>
                   ';
            
            foreach ($data['lista']['data'] as $key => $value) {
                $view .= self::renderItem($value);
            }

            $view .= self::getScript();
            return $view;

        }

        private static function renderItem($data){
            
            

            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);            

            $view = '

            
                    <div class="m-1 mt-3 p-0 border videoitem shadow-sm">
                        <div class=" pl-4 p-2 row">
                            <div class="col-2 pt-2 pl-3 pr-3">
                                <img src="assets/play.png" width="80" height="80" class=" border-0 rounded rounded-circle">
                            </div>
                            <div class=" col-7 mt-3 ">
                                <div class="h6">
                                    <strong>
                                        '.$data['name'].'
                                    </strong>
                                </div>
                                <div class="datavideo mt-2">'.$data['description'].'</div>
                            </div>
                            <div class=" col-3 mt-3">                        
                                <div class="datavideo mt-2" >Id: '.$data['id'].'</div>
                                <div class="datavideo mt-2" >Filename: '.$data['filename'].'</div>
                                <div class="datavideo mt-2" >Size: '. ceil(  $data['size_mbytes'] * 100 ) /100 .'MB </div>
                                <div class="datavideo mt-3" >
                                    <form action="'.$uri.'" method="post" class="m-0 p-0">
                                        <button id="editar_'.$data['id'].'" class="btn btn-primary">
                                            <i class="fa fa-floppy-disk"></i>
                                            Editar
                                        </button>
                                        <button id="eliminar_'.$data['id'].'" name="eliminar" value="1" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="video_users_'.$data['id'].'" class=" border-top">
                            <div class="m-2 p-2">
                                <form class="m-2 p-2 row" method="post" action="'.$uri.'">
                                    <div class="col-2">
                                        <input list="users" class="btn btn-light border" placeholder="Agregar usuario"></input>   
                                        <datalist id="users">
                                            <option value="Edge">
                                            <option value="Firefox">
                                            <option value="Chrome">
                                            <option value="Opera">
                                            <option value="Safari">
                                        </datalist>
                                    </div>
                                </form>
                            
                            </div>

                            <div  class="m-2 p-2 row">                            
                                <div class=" col userlist">
                                    <span class="btn btn-primary m-1">
                                        canoref@gmail.com   
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                    <span class="btn btn-primary m-1">
                                        anoref@gmail.com   
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                    <span class="btn btn-primary m-1">
                                        canoref@gmail
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                    <span class="btn btn-primary m-1">
                                        canasdoref@gmail.com   
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                    <span class="btn btn-primary m-1">
                                        canoref@gmail.com   
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                    <span class="btn btn-primary m-1">
                                        canoref@gail.com   
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                    <span class="btn btn-primary m-1">
                                        canoref@gmail.com   
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                    <span class="btn btn-primary m-1">
                                        <span class="mr-1">
                                            canoref@l.com                                     
                                        </span>    
                                        <span class="mr-1">
                                            Alejandro Alvarez
                                        </span>
                                        <i class="fa fa-xmark"></i>
                                    </span>
                                
                                </div>

                            </div>

                        </div>

                        

                    </div>
                ';


            return $view;


        }


        private static function getScript(){
            $script = '<script>
                           
                        
                       </script>';

            return $script;
        }

    }

?>