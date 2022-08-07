<?php 

    class AdminVideosView {

        public static function print(){

            $view = '

                <h5 class="mt-4"> Videos: </h5>
            
                <div class="mt-4">

                    <div class="card mb-3"  >
                        <div class="row g-0">
                            <div class="col-md-2">
                                <img src="assets/noimage.jpg" width="100" height="100" class="img-fluid img-thumbnail border-0 rounded-start">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h6 class="card-title">Card title</h6> 
                                    <p>asdfasdfasdfasf asdfasf harum. </p>
                                </div>
                            </div>
                            <div class="col-md-1">
                                a a a
                            </div>

                        </div>
                    </div>
                
                </div>

            ';

            return $view;

        }


    }

?>