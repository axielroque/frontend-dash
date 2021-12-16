<?php

function arc_api_registro(){
    register_rest_route( 
        "arc",
        "registro",
        array(
            'methods' => 'POST',
            'callback' => "arc_registro_callback"
        )
        );
}

function arc_registro_callback($request){

    $is_user_exist = get_user_by( "login", $request["name"]);
    $is_email_exist = get_user_by( "email", $request["email"]);

    if($is_user_exist){
        return array("msg" => "Ese nombre de usuario ya existe");
    }elseif($is_email_exist){
        return array("msg" => "Ese email ya fue registrado");
    }
     
    $args = array(
        "user_login" => $request["name"],
        "user_pass"  => $request["password"],
        "user_email" => $request["email"],
        "role"       => "cliente"
    );
    
    $user = wp_insert_user($args);

    return array("msg" => "El usuario se registro correctamente");
}
add_action( "rest_api_init", 'arc_api_registro' );