<?php

    class InicioView {

        public static function print($context){
                
            $uri = htmlspecialchars($_SERVER['REQUEST_URI']);

            $data = $context['userdata'][0];
            $result = $context['result'];

            if (isset($_POST['guardar'])){
                if ( isset($result['ok']) && $result['ok'] == false){
                    $message = '
                       <div class="row p-1 h6 alert alert-danger ">
                           <div class="col-10">
                            Error en la actualizacion, verifique sus datos.
                           </div>
                       </div>
                   ';
                 } else {
                    $message = '
                       <div class="row p-1 h6 alert alert-success ">
                           <div class="col-10">
                             Datos Actualizados!
                           </div>                        
                       </div>
                   ';
                    $_SESSION['userdata'][0] = array_merge($_SESSION['userdata'][0],$result['data']);
                    $data = $_SESSION['userdata'][0];
                 }

            } else $message = '';


            $view = '

                    <h4 class=" border-secondary border-1 pb-2 " >Bienvenido, </h4>
                
                    <div class="card">
                        <div class="card-header alert-primary text-white">
                            <strong>
                                Datos de Contacto
                            </strong>
                        </div>
                        <div id="contactdata" class="card-body">
                            
                            '.$message.'       
                        
                            <table width="100%">
                                <tbody class="">
                                    <tr>
                                        <th class="text-right p-1">
                                            Nombre: 
                                        </th>                                        
                                        <td>
                                            '. $data["name"] .'
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right p-1">
                                           Correo electronico:  
                                        </th>                                        
                                        <td>
                                            '. $data["email"] .'
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right p-1">
                                            Telefono:  
                                        </th>                                        
                                        <td>
                                            '. $data["phone"] .'
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right p-1">
                                            Password:  
                                        </th>                                        
                                        <td>
                                            **********
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            
                            <div class="border-bottom border-1 mt-3"></div>
                            <div class="input-group" >
                                <button id="contactdatabtn" class="btn btn-primary mt-3">
                                    <i class="fa fa-pen p-1"></i>
                                    Actualizar
                                </button>
                            </div>
                        </div>

                        <div id="contactdataform" class="card-body">
                                    
                                <form class="m-0" method="post" action="'.$uri.'">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <th class="text-right p-1">
                                                    Nombre: 
                                                </th>                                        
                                                <td>
                                                    <input name="__id" type="hidden" value="id" required></input>
                                                    <input name="id" type="hidden" value="'.$data["id"].'" required></input>
                                                    <input class="" name="name" type="text" value="'. $data["name"] .'" required></input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-right p-1">
                                                Correo electronico:  
                                                </th>                                        
                                                <td>
                                                    <input  name="email" type="email" value="'. $data["email"] .'"required></input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-right p-1">
                                                    Telefono:  
                                                </th>                                        
                                                <td>
                                                    <input  name="phone" type="text" value="'. $data["phone"] .'" required></input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-right p-1">
                                                    Password:  
                                                </th>                                        
                                                <td>
                                                    <input id="password" name="password" type="password" value="'. $data["password"] .'" required></input>
                                                    <i id="eye" class="btn p-0 text-primary fa fa-eye"></i>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="border-bottom border-1 mt-3"></div>
                                    
                                    
                                    <button  id="contactdataformbtn" name="guardar" type="submit" class="btn btn-success mt-3">
                                        <i class="fa fa-floppy-disk p-1"></i>    
                                        Guardar
                                    </button>
                                    
                                    </form>   
                        </div>



                    </div>



                    <div class="card mt-3">
                        <div class="card-header alert-primary text-white">
                            <strong>
                                Cuenta
                            </strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="'.$uri.'" >
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <th class="text-right p-1">
                                                Id: 
                                            </th>                                        
                                            <td>
                                                2
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right p-1">
                                            cuenta de usuario:  
                                            </th>                                        
                                            <td>
                                                '. $data["email"] .'
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right p-1">
                                            Fecha de registro:
                                            </th>                                        
                                            <td>
                                                '. $data["created_at"] .'
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right p-1">
                                            Nivel de permisos:
                                            </th>                                        
                                            <td>
                                                '. $data["permisos"] .'
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right p-1">
                                            Total de cursos.
                                            </th>                                        
                                            <td>
                                               3
                                            </td>
                                        </tr>
                                
                                    </tbody>
                                </table>

                            </form>

                            
                            
                        </div>
                    </div>
                    
                    
                    <script>
                            $().ready(function(){
                                $("#contactdataform").hide();
                            });
        
                                                       
                                                          
                            function reset(swi){
                                if(swi == 1) {
                                    $("#eye").on("click",function(){
                                        $("#password").attr("type","password");
                                        reset(0);
                                    });
                                } else {
                                    $("#eye").on("click",function(){
                                        $("#password").attr("type","text");
                                        reset(1);
                                    });
                                }
                            }

                            reset(0);

                            $("#contactdatabtn").click(function(){
                                $("#contactdata").toggle();
                                $("#contactdataform").toggle();
                            });
                            


                    </script>
                    
                    ';
                    
                    return $view;                    
                }   
            }
?>

<script>
                            
           

</script>