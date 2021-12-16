<?php
function arc_script_login(){
    wp_register_script( "arc-login", plugins_url( "assets/js/login.js",dirname(__FILE__)));
    wp_localize_script( "arc-login", "arc", array(
        "rest_url" => rest_url("arc"),
        "home_url" => home_url()
    ) );
}

add_action( "wp_enqueue_scripts", "arc_script_login" );

function arc_add_login_from(){
    wp_enqueue_script("arc-login");
    
    $response = '
    <form class"signin_form form" id="signin">
        <p>
            <label for="email">User</label> <br>
            <input name="email" type="text" id="email" >
        </p>
        <br>
        <p>
            <label for="password">Password</label> <br>
            <input name="password" type="password" id="password" >
        </p>
        <br>
        <input type="submit" class="btn btn_submit" value="Submit">
        <div class="msg"></div>
    </form> ';
    
    return $response;
}

add_shortcode( "arc_login", "arc_add_login_from" );