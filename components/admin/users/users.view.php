<?php 

    class UsersView {

        public static function print($data){

            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);
            isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';

            

            $rows_pendientes = self::renderRows($data['pendientes']['data']);
            $rows_autorizados = self::renderRows($data['autorizados']['data']);
            $rows_rechazados = self::renderRows($data['rechazados']['data']);

            $view = '

                <div class="input-group mt-3 text-center">
                </div>
                
                <div class="input-group mt-3 text-center">
                  
                    <button class="mr-auto btn btn-primary">
                        <i class="fa fa-plus p-1"></i>
                        Agregar Usuario
                    </button>

                    <span  class="btn transparent">
                        <strong>
                            Filtro:
                        </strong>
                     </span>

                    <form class="m-0 mr-3" method="post" action="'.$uri.'">
                        <input autofocus value="'.$buscar.'" id="buscar" name="buscar" width="40px" class="btn btn-light" placeholder="Buscar" ></input>
                    </form>

                    <button id="autorizadosbtn" class="btn btn-success ">
                        <i class="fa fa-check p-1"></i>
                        Autorizados
                    </button>
                    <button id="pendientesbtn" class="btn btn-warning ">
                        <i class="fa fa-question p-1"></i>
                        Pendientes
                    </button>
                    <button id="bloqueadosbtn" class="btn btn-danger ">
                        <i class="fa fa-ban p-1"></i>
                        Bloqueados
                    </button>
                </div>

                <div id="pendientes" class="mt-4">
                    <div class="alert alert-warning p-1 form-control-sm mb-1 pl-3">
                        Pendientes de autorizar.
                    </div>         

                    <table class="table  table-bordered table-sm   table-hover ">
                    <thead class="alert-warning text-white">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Alta</th>                                                        
                            <th scope="col">Permisos</th>
                            <th scope="col">Status</th>
                            <th scope="col">Vence</th>
                            <th scope="col">Passoword</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      '.$rows_pendientes.'
                    </tbody>
                    </table>
                
                </div>

                <div id="autorizados" class="mt-4">
                                    
                    <div class="alert p-1 alert-success form-control-sm mb-1 pl-3">
                        Autorizados
                    </div>
                    

                    <table class="table  table-bordered table-sm   table-hover">
                        <thead class="alert-success text-white">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Alta</th>                                                        
                                <th scope="col">Permisos</th>
                                <th scope="col">Status</th>
                                <th scope="col">Vence</th>
                                <th scope="col">Passowrd</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            '.$rows_autorizados.'
                        </tbody>
                    </table>
                
                </div>
            
                <div id="bloqueados" class="mt-4 ">

                    
                    <div class="alert p-1 alert-danger form-control-sm mb-1 pl-3"> Bloqueados </div>   

                    <table class="table  table-bordered table-sm   table-hover">
                    <thead class="alert-danger text-white">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Alta</th>                                                        
                            <th scope="col">Permisos</th>
                            <th scope="col">Status</th>
                            <th scope="col">Vence</th>
                            <th scope="col">Passowrd</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        '.$rows_rechazados.'
                    </tbody>
                    </table>
            
                </div>

                <script>

                    function edit_row(id){
                        $(".rowdata_" + id).toggle();
                        $(".rowform_" + id).toggle();
                    }

                    $("#autorizados").hide();
                    $("#bloqueados").hide();
                    $(".hidedform").hide();
                
                    $("#autorizadosbtn").on("click",function(){
                        $("#autorizados").show();
                        $("#bloqueados").hide();
                        $("#pendientes").hide();
                    });
                
                    $("#pendientesbtn").on("click",function(){
                        $("#autorizados").hide();
                        $("#bloqueados").hide();
                        $("#pendientes").show();
                    });
                
                    $("#bloqueadosbtn").on("click",function(){
                        $("#autorizados").hide();
                        $("#bloqueados").show();
                        $("#pendientes").hide();
                    });
                
                
                </script>
            ';

            return $view;

        }

        private static function renderRows($datatable){

            $rows = '';
            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);

            foreach($datatable as $index => $row) {
               
                $row = '
                
                    <tr id="" class="'.'rowdata_'.$row['id'].'">
                         
                        
                            <th>'.$row['id'].'</th>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['phone'].'</td>                                  
                            <td>'.$row['created_at'].'</td>                                  
                            <td>'.$row['permisos'].'</td>                                  
                            <td>'.$row['status'].'</td>                                  
                            <td>'.$row['vencimiento'].'</td>                                  
                            <td>*******</td>                                  
                            <th scope="col"> 
                                <button onclick="edit_row('.$row['id'].')" value="'.$row['id'].'" name="editar" class="btn text-primary fa fa-pen p-1" title="Editar"></button>
                                <button form="form1_'.$row['id'].'" value="'.$row['id'].'" name="autorizar" class="btn text-success fa fa-check p-1" title="Autorizar"></button>
                                <button form="form1_'.$row['id'].'" value="'.$row['id'].'" name="pendiente" class="btn text-warning fa fa-question p-1" title="Dejar pendiente." ></button>
                                <button form="form1_'.$row['id'].'" value="'.$row['id'].'" name="bloquear" class="btn text-danger fa fa-ban p-1" title="Bloquear"></button>                           
                                <form id="form1_'.$row['id'].'" class="p-0 m-0" method="post" action="'.$uri.'" ></form>
                            </th>
                        
                                             
                    </tr>
                
                    <tr id="" class=" '.'rowform_'.$row['id'].' hidedform">
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="text" readonly class="form-control form-control-sm" value="'.$row['id'].'"></td>
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="text" name="name" class="form-control" value="'.$row['name'].'"></td>
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="email" name="email" class="form-control" value="'.$row['email'].'"></td>
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="text" name="phone" class="form-control" value="'.$row['phone'].'"></td>                                  
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="date" readonly class="form-control" value="'. date_format( date_create($row['created_at']) ,'Y-m-d')  .'"></td>                                  
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="text" name="permisos" class="form-control" value="'.$row['permisos'].'"></td>                                  
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="text" name="status" class="form-control" value="'.$row['status'].'"></td>                                  
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="date" name="vencimiento" class="form-control" value="'. date_format( date_create($row['vencimiento']) ,'Y-m-d' ).'"></td>                                  
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="password" name="password" class="form-control" value="'.$row['password'].'"></td>                                  
                        <th scope="col"> 
                            <button form="form2_'.$row['id'].'" value="'.$row['id'].'" name="save" class="btn text-primary fa fa-floppy-disk p-1" title="Editar"></button>
                            <button onclick="edit_row('.$row['id'].')" value="'.$row['id'].'" class="btn text-primary fa fa-xmark p-1" title="Cancel"></button>
                     
                            <form id="form2_'.$row['id'].'" class="p-0 m-0" method="post" action="'.$uri.'" ></form>
                        </th>
                    </tr>

                

                ';

                $rows .= $row;

            }



            return $rows;
        }

    }

?>
