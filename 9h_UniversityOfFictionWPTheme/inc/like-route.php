<?php

add_action( 'rest_api_init', 'universityLikeRoutes' );


function universityLikeRoutes() {

    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'POST',
        'callback' => 'createLike'
    ));

    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike'
    ));
}

function createLike($data) {
    if(is_user_logged_in()) {
        $professorID =   sanitize_text_field( $data['professor_id']);
        $existQuery = new WP_Query( array(
            'author' => get_current_user_id(),
            'post_type' => 'like',
            'meta_query' => array(
               array (
                 'key' => 'liked_professor_id' ,
                 'compare' => '=',
                 'value' => $professorID
               )
            )
          ) ); 

        if($existQuery->found_posts() == 0 AND get_post_type( $professorID ) == 'professor') {
            return wp_insert_post(array(
                'post_type' => 'like',
                'post_status'=> 'publish',
                'post_title' => 'Create post test',
                'meta_input' => array(
                    'liked_professor_id' => $professorID
                )));
    
        } else {
            die('You have already liked this professor');
        }

    } else {
        die("Only logged in users can like content");
    }


   
}

function deleteLike($data) {
    $likeId = sanitize_text_field( $data['like'] );
    
    if (get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like'){
        wp_delete_post($likeId,true);
        return "Like deleted";
    } else {
        die("You do not have permission to delete like");
    }
}