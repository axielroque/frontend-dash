<?php
function arc_api_login(){
    register_rest_route( 
        "arc",
        "login",
        array(
            'methods' => 'POST',
            'callback' => "arc_login_callback"
        )
        );
}

add_action( "rest_api_init", 'arc_api_login' );

function arc_login_callback($request){
    $cred = array(
        "user_login" => $request["email"],
        "user_password" => $request["password"],
        "remember"   => true
    );
    
    $user = wp_signon($cred);
    if ( is_wp_error($user) ) {
        return $user->get_error_message();
    }
    else {
        return $user;
    }
    
    
}