<?php


function arc_script_posts(){
    wp_register_script( "arc-posts-tinyme", plugins_url( "assets/js/tinymce.min.js",dirname(__FILE__)));
    wp_register_script( "arc-posts", plugins_url( "assets/js/public-post.js",dirname(__FILE__)));
    wp_localize_script( "arc-posts", "arc", array(
        "rest_url" => rest_url("arc"),
        "home_url" => home_url()
    ) );
}

add_action( "wp_enqueue_scripts", "arc_script_posts" );

function arc_add_posts_from(){
    wp_enqueue_script(array("arc-posts-tinyme", "arc-posts"));

    

    $response = '
    <form class"post_form form" id="createPost">
        
        <h1 class="h2 mb-4">Submit a Post</h1>
        <p>
            <label for="titlePost">Title Post</label> <br>
            <input name="titlePost" type="text" id="titlePost" required>    
        </p>
        <br>
        <label>Describe the detail of post</label>
        <div class="form-group">
            <textarea name="postDetail" id="editorPost" required></textarea>
        </div>
        <br>
        <input type="submit" class="btn btn_submit" value="Submit">
        <div class="msg"></div>
    </form>';


    if ( is_user_logged_in() ) {
        return $response;
    } else {
        echo "<p>Debe loguearce para crear un post</p>";
    }
}

add_shortcode( "arc_posts", "arc_add_posts_from" );