<?php 

    class SidebarView {

        public static function print($data){

            Logger::consolelog($data);

            $view = '
            
            
                <div class="container-fluid">
                    
                    <div class="h4 mb-3">
                       Videos:
                    </div>

                    <table class=" table-bordered">
                        '.self::getItemList().'
                    </table>


                                   
                </div>
            
            
            ';

            return $view;

        }

        public static function getItemList(){

            $uri = '?p=videos';

            $item = '';

            foreach($_SESSION['videosavailable']['data'] as $key => $value){
                $item .= '<tr class="">
                            <td>
                                <form method="post" action="'.$uri.'" class="p-0 m-1 ml-5 mr-5">
                                    <button id="'.$value['video_id'].'" name="id" value="'.$value['video_id'].'" class="optionvideo btn btn-lg">
                                        '.$value['video_name'].'                                    
                                    </button> 
                                </form> 
                             </td>   
                          </tr>
                         ';
            }

            return $item;
        }

    }

?>

