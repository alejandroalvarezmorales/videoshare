<?php 

    class AdminCursosView {

        public static function print(){

            $view = '

                <h5 class="mt-4"> Cursos </h5>
            
                <div class="mt-4">

                    <table class="table table-sm table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Creacion</th>
                            <th scope="col">Videos</th>                                                        
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>                                  
                            <th scope="col"> 
                                <button class="btn text-danger fa fa-ban p-1"></button>
                                <button class="btn text-success fa fa-check p-1"></button>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>                                 
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>                                  
                        </tr>
                    </tbody>
                    </table>
                
                </div>

            ';

            return $view;

        }


    }

?>