<?php 

    class UsersView {

        public static function print($data){

            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);
            isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';


            $rows_pendientes = self::renderRows($data['pendientes']['data']);
            $rows_autorizados = self::renderRows($data['autorizados']['data']);
            $rows_rechazados = self::renderRows($data['rechazados']['data']);

            $view = '

                
                
                <div class="input-group mt-4 text-center">
                  
                    <button id="adduserbtn" class="btn btn-primary mr-3">
                        <i class="fa fa-plus p-1"></i>
                        Agregar Usuario
                    </button>

                    <form id="adduser" method="post" action="'.$uri.'" >
                    </form>
                    <span id="adduserinputs">
                        <input form="adduser" name="email" placeholder="email" class="border btn btn-light" type=text>
                        <input form="adduser" name="password" placeholder="password" class=" border btn btn-light" type=password>
                        <button form="adduser" name="adduser" type="submit" class="btn btn-primary" value="" title="Guardar">
                            <i class="fa fa-floppy-disk p-1"></i>
                        </button>
                    </span>
                    <span class="mr-auto" ></span>

                    <span  class="p-3 font-weight-bold ">
                        <strong>
                            Filtro:
                        </strong>
                     </span>

                    <form class="m-0 mr-3" method="post" action="'.$uri.'">
                        <input autofocus value="'.$buscar.'" id="buscar" name="buscar" width="40px" class="btn btn-light border" placeholder="Buscar" ></input>
                    </form>

                    <button id="autorizadosbtn" class="btn btn-success" title="Autorizados">
                        <i class="fa fa-check p-1"></i>
                    </button>
                    <button id="pendientesbtn" class="btn btn-warning" title="Pendientes">
                        <i class="fa fa-question p-1"></i>
                    </button>
                    <button id="bloqueadosbtn" class="btn btn-danger" title="Bloqueados">
                        <i class="fa fa-ban p-1"></i>
                    </button>
                </div>

                <div id="pendientes" class="mt-4">
                    <div class="alert alert-warning p-1 form-control-sm mb-1 pl-3">
                        <i class="fa fa-question p-1 mr-2"></i>
                        Pendientes de autorizar.
                    </div>         

                    <table class="table table-sm   table-hover ">
                    <thead class="">
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
                        <i class="fa fa-check p-1 mr-2"></i>
                        Autorizados
                    </div>
                    

                    <table class="table  table-sm   table-hover">
                        <thead class="">
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

                    
                    <div class="alert p-1 alert-danger form-control-sm mb-1 pl-3">
                        <i class="fa fa-ban p-1 mr-2"></i>
                        Bloqueados
                    </div>   

                    <table class="table   table-sm   table-hover">
                    <thead class="">
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
                    $(".hidedform").hide();
                    $("#adduserinputs").hide();

                    function edit_row(id){
                        $(".rowdata_" + id).toggle();
                        $(".rowform_" + id).toggle();
                    }

                    switch(localStorage.getItem("option")){
                        case "autorizados":
                            $("#autorizados").show();
                            $("#bloqueados").hide();
                            $("#pendientes").hide();
                            break;
                        case "bloqueados":
                            $("#autorizados").hide();
                            $("#bloqueados").show();
                            $("#pendientes").hide();
                            break;
                        case "pendientes":
                            $("#autorizados").hide();
                            $("#bloqueados").hide();
                            $("#pendientes").show();
                            break;
                        default:
                            $("#autorizados").hide();
                            $("#bloqueados").hide();
                            $("#pendientes").show();
                            break;                           
                    }

                    $("#adduserbtn").on("click", function(){
                        $("#adduserinputs").toggle();
                    });
                
                    $("#autorizadosbtn").on("click",function(){
                        localStorage.setItem("option","autorizados");
                        $("#autorizados").show();
                        $("#bloqueados").hide();
                        $("#pendientes").hide();
                    });
                
                    $("#pendientesbtn").on("click",function(){
                        localStorage.setItem("option","pendientes");
                        $("#autorizados").hide();
                        $("#bloqueados").hide();
                        $("#pendientes").show();
                    });
                
                    $("#bloqueadosbtn").on("click",function(){
                        localStorage.setItem("option","bloqueados");
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
               
                $permisosselected = '';
                $statusselected = '';

                date_create('now',timezone_open('America/Mexico_City')) >= date_create($row['vencimiento'],timezone_open('America/Mexico_City')) ? $ven = 'alert-danger text-white' : $ven = ''; 


                switch($row['permisos']){
                    case 'normal':
                        $permisosselected = '<option value="normal" selected>normal</option>
                                             <option value="admin">admin</option>';
                        break;
                    case 'admin': 
                        $permisosselected = '<option value="normal">normal</option>
                                             <option value="admin" selected>admin</option>';
                        break;
                    default:
                        $permisosselected = '<option value="normal">normal</option>
                                             <option value="admin">admin</option>';
                        break;
                }
                switch($row['status']){
                    case 'pendiente':
                        $statusselected = '<option value="pendiente" selected>pendiente</option>
                                           <option value="rechazado">rechazado</option>
                                           <option value="autorizado">autorizado</option>';
                                           break;
                    case 'rechazado':
                        $statusselected = '<option value="pendiente">pendiente</option>
                                           <option value="rechazado" selected>rechazado</option>
                                           <option value="autorizado">autorizado</option>';
                                           break;
                    case 'autorizado':
                        $statusselected = '<option value="pendiente">pendiente</option>
                                           <option value="rechazado">rechazado</option>
                                           <option value="autorizado" selected>autorizado</option>';
                                           break;
                    default:
                        $statusselected = '<option value="pendiente">pendiente</option>
                                           <option value="rechazado">rechazado</option>
                                           <option value="autorizado">autorizado</option>';
                                            break;
                }
                

                $row = '
                
                    <tr ondblclick="edit_row('.$row['id'].')" id="" class="'.'rowdata_'.$row['id'].' ">
                         
                        
                            <th>'.$row['id'].'</th>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['phone'].'</td>                                  
                            <td>'.$row['created_at'].'</td>                                  
                            <td>'.$row['permisos'].'</td>                                  
                            <td>'.$row['status'].'</td>                                  
                            <td class="'.$ven.'">'.$row['vencimiento'].'</td>                                  
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
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="text" name="name" class="form-control-sm form-control" value="'.$row['name'].'"></td>
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="email" name="email" class="form-control-sm form-control" value="'.$row['email'].'"></td>
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="text" name="phone" class="form-control-sm form-control" value="'.$row['phone'].'"></td>                                  
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="date" readonly class="form-control form-control-sm" value="'. date_format( date_create($row['created_at']) ,'Y-m-d')  .'"></td>                                  
                        
                        <td>
                            <select form="form2_'.$row['id'].'" name="permisos" class="form-control form-control-sm" value="'.$row['permisos'].'">
                                '.$permisosselected.'
                            </select>
                        </td>                                  
                        <td>
                            <select form="form2_'.$row['id'].'" name="status" class="form-control form-control-sm" value="'.$row['status'].'">
                                '.$statusselected.'
                            </select>
                        </td>                                  
                        
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="date" name="vencimiento" class="form-control-sm form-control" value="'. date_format( date_create($row['vencimiento']) ,'Y-m-d' ).'"></td>                                  
                        <td><input form="form2_'.$row['id'].'" autocomplete="off" type="password" name="password" class="form-control-sm form-control" value="'.$row['password'].'"></td>                                  
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
<script>
    
</script>