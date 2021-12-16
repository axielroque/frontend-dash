<?php
function arc_api_create_post(){
    register_rest_route( 
        "arc",
        "new-post",
        array(
            'methods' => 'POST',
            'callback' => "arc_create_post_callback"
        )
        );
}
add_action( "rest_api_init", 'arc_api_create_post' );

function arc_create_post_callback($request){

    global $current_user;
    $userId = $current_user->ID;

    $title_post = $request["titlePost"];
    $detail_post = json_decode($request["postDetail"]);
     
    $args = array(
        'post_title' => $title_post,
        'post_content' => $detail_post,        
        'post_status' => 'pending',
        'post_author' => $userId,
        'post_type' => 'post'
    );
    
    $postId  = wp_insert_post($args);

    return array("msg" => "El Post sera revisado antes de publicarce");
}