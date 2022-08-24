<?php 

    class AdminVideosView {

        public static function print($data){
            
            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);

            $view = '<div class="mt-4 row pl-4 pr-4">

                            <form id="search" action="'.$uri.'" class="p-0 m-0" method="post" >
                                <span class="p-3 font-weight-bold ">Filtro:</span>
                                <input name="filtro" class="btn btn-light border" placeholder="Texto a filtrar"></input>     
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
            $view .= self::getDatalist();
            return $view;

        }

        private static function renderItem($data){
            
            

            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);            

            $view = '

            
                    <div class="m-1 mt-3 p-2 border videoitem shadow-sm">
                        <div class="mb-2 pl-4 p-2 row">
                            <div class="col-2 pt-2 pl-3 pr-3">
                                <img src="assets/play.png" width="80" height="80" class=" border-0 rounded rounded-circle">
                            </div>

                            <div id="name_data_'.$data['id'].'" class="col-6 mt-3 ">
                                <div class="h4">
                                    <strong>
                                        '.$data['name'].'
                                    </strong>
                                </div>
                                <div class="datavideo mt-2">'.$data['description'].'</div>
                            </div>

                            <!-- coment -->
                            <div id="name_form_'.$data['id'].'" class="nameform col-6 mt-3 ">
                                <form action="'.$uri.'" method="post" class="p-0 m-0">
                                    <div class="">
                                        <input name="name" class="btn btn-light border text-left"  value="'.$data['name'].'">
                                    </div>
                                    <div class="mt-2">
                                        <input type="text" size="65" class="btn btn-light border text-left" name="description" value="'.$data['description'].'" ></input>
                                        <input type="hidden" name="id" value="'.$data['id'].'"></input>
                                        <input type="hidden" value="hidden" name="hidden" class="">
                                        <input type="submit"  class="d-none">
                                    </div>                                
                                </form>
                            </div>

                            <div class=" col-4 mt-3">                        
                                <div class="datavideo mt-2" >Id: '.$data['id'].'</div>
                                <div class="datavideo mt-2" >Filename: '.$data['filename'].'</div>
                                <div class="datavideo mt-2" >Size: '. ceil(  $data['size_mbytes'] * 100 ) /100 .'MB </div>
                                <div class="datavideo mt-3" >
                                    <form action="'.$uri.'" method="post" class="m-0 p-0">
                                        <button form="noform" onclick="showEditName('.$data['id'].')" id="editar_'.$data['id'].'" class="btn btn-primary">
                                            <i class="fa fa-pencil"></i>
                                            Editar
                                        </button>
                                        <button id="eliminar_'.$data['id'].'" name="eliminar" value="'.$data['id'].'" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </button>
                                        <button form="noform" onclick="showUsers('.$data['id'].')" id="addusers_'.$data['id'].'" value="1" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                            Users
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="video_users_'.$data['id'].'" class="usersadded border-top">
                            <div class="m-2 p-2">
                                <form class="m-2 p-2 row" method="post" action="'.$uri.'">
                                    <div class="col-4">
                                        <input list="users" autocomplete="off" name="email" class="btn btn-light border" placeholder="Agregar usuario"></input>
                                        <input type="hidden" name="id_video" value="'.$data['id'].'">
                                        <button type="submit" name="adduservideo" class="btn btn-primary ">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </form>
                            
                            </div>

                            <div  class="m-2 p-2 row">                            
                                <div class=" col userlist">
                                    '.self::getUsersVideo($data['id']).'
                                </div>

                            </div>

                        </div>

                        

                    </div>
                ';


            return $view;


        }

        private static function getScript(){
            $script = '<script>
                            $(".usersadded").hide();
                            $(".nameform").hide();
                            showUsers(localStorage.getItem("showVideoIn"));


                            function showEditName(id){
                                $("#name_data_"+id).toggle();
                                $("#name_form_"+id).toggle();
                            }

                            function showUsers(id){
                                $("#video_users_"+id).toggle();
                                localStorage.setItem("showVideoIn",id);                                
                            }


                       </script>';

            return $script;
        }

        private static function getDatalist(){

            $sql = "SELECT email FROM usuarios ORDER BY email";
            $result = DBAccessModel::find($sql,array());
            
            $list = '<datalist id="users">';
            foreach ( $result['data'] as $key => $value) {
                $list .='<option value="'. $value['email'] .'">';
            }
            $list .= '</datalist>';

            return $list;
        }

        private static function getUsersVideo($id_video){
            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);
            $sql = "SELECT vu.id, u.email from videos_usuarios vu LEFT JOIN usuarios u on vu.id_usuario = u.id WHERE vu.id_video = :id_video";
            $result = DBAccessModel::find($sql,array('id_video' => $id_video));

            $users = '';
            foreach ($result['data'] as $key => $value) {
                $users .= '

                    <form action="'.$uri.'" method="post" class="m-0 p-0 d-inline">
                        <button value="'.$value['id'].'" name="delUserVideo" class="btn btn-primary m-1">
                            '.$value['email'].'
                            <i class="fa fa-xmark"></i>
                        </button>
                    </form>
                
                ';
            }

            return $users;

        }

    }

?>
<script>

</script>