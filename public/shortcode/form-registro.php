<?php
function arc_script_registro(){
    wp_register_script( "arc-registro", plugins_url( "assets/js/registro.js",dirname(__FILE__)));
    wp_localize_script( "arc-registro", "arc", array(
        "rest_url" => rest_url("arc"),
        "home_url" => home_url()
    ) );
}

add_action( "wp_enqueue_scripts", "arc_script_registro" );

function arc_add_registro_from(){
    wp_enqueue_script("arc-registro");

    $response = '
    <form class"signin_form form" id="signup">
        <p>
            <label for="Name">Name</label> <br>
            <input name="name" type="text" id="Name" >    
        </p>
        <br>
        <p>
            <label for="email">Email</label> <br>
            <input name="email" type="email" id="email" >
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

add_shortcode( "arc_registro", "arc_add_registro_from" );