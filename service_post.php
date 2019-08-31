<?php

spl_autoload_register(function($class){
    require "{$class}.php";
});

//FROM AXIOS POST
$_POST = json_decode(file_get_contents("php://input"),true);

// function service_render(ServiceInt $service){
//             $service->set_account_number($_POST['account_number']);
//             $service->compute();
//     return  $service->render();
// }


if($_POST['selected_service'] == 'R'){

    $regular = new Regular;
    $regular->set_minutes($_POST['service']['regular_minute']);

    // echo  service_render($regular);
  

}else{

    $premium = new Premium;
    $premium->dayTime()->set_minutes($_POST['service']['day_minute']);
    $premium->nightTime()->set_minutes($_POST['service']['night_minute']);

    //echo service_render($premium);



}