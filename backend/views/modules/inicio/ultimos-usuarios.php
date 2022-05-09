<?php

$users = ControllerUsers::showTotalUsers("date");

$client = Route::routeClient();

?>

<div class="box box-danger">

    <div class="box-header with-border">

        <h3 class="box-title">Últimos usuarios registrados</h3>

            <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>

    </div>

    <!-- /.box-header -->
    <div class="box-body no-padding">

        <ul class="users-list clearfix">

            <?php

                if(count($users) > 8){

                    $totalUsers = 8;

                }else{

                    $totalUsers = count($users);

                }

                for ($i = 0; $i < $totalUsers; $i++) {

                    if($users[$i]["photo"] != ""){

                        if($users[$i]["mode"] == "directo"){
                            substr($value["date"],0,7);

                            echo '
                                <li>
                                    <img src="'.$client.$users[$i]["photo"].'" alt="User Image" style="width:60%">
                                    <a class="users-list-name" href="">'.$users[$i]["name"].'</a>
                                    <span class="users-list-date">'.substr($users[$i]["date"],0,10).'</span>
                                </li>'; 

                        }else{

                            echo '
                                <li>
                                    <img src="'.$users[$i]["photo"].'" alt="User Image" style="width:60%">
                                    <a class="users-list-name" href="">'.$users[$i]["name"].'</a>
                                    <span class="users-list-date">'.substr($users[$i]["date"],0,10).'</span>
                                </li>'; 

                        }

                    }else{

                        echo '
                            <li>
                                <img src="views/img/users/default/anonymous.png" alt="User Image" style="width:60%">
                                <a class="users-list-name" href="">'.$users[$i]["name"].'</a>
                                <span class="users-list-date">'.substr($users[$i]["date"],0,10).'</span>
                            </li>'; 

                    }
                    
                }

                
            ?>
            
        </ul>
        <!-- /.users-list -->
    </div>
                <!-- /.box-body -->
        <div class="box-footer text-center">

            <a href="usuarios" class="uppercase">Ver todos los usuarios</a>

        </div>
    <!-- /.box-footer -->

</div>