<?php

add_action('rest_api_init' , 'universityRegisterSearch');


function universityRegisterSearch() {
    register_rest_route('university/v1', 'search' , array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'universitySearchResults',
    ) );
}

function universitySearchResults($data) {
    $mainQuery = new WP_Query(array(
        'post_type'=>array('post', 'page','professor', ' campus' , 'event' , 'program'),
        's' => sanitize_text_field($data['term']) 
    ));
    
    $results = array(
        'generalInfo' => array(),
        'professors' => array(),
        'programs' => array() ,
        'events' => array(),
        'campuses'=> array()
    );
    
    while($mainQuery->have_posts()) {
        $mainQuery->the_post();

       if(get_post_type() == 'post' OR get_post_type() == 'page') {
        array_push($results['generalInfo'] ,array(
         'title' => get_the_title(),
         'permalink' => get_the_permalink(),
         'post_type' => get_post_type(),
         'authorName'=>get_author_name()
        ));
    };

        if(get_post_type() == 'program') {
            $relatedCampuses = get_field('related_campus');

            if($relatedCampuses) {
                foreach($relatedCampuses as $campus) {
                    array_push($results['campuses'], array(
                        'title' => get_the_title($campus),
                        'permalink' => get_the_permalink($campus), 

                    ));
                };
            }

            array_push($results['programs'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'authorName'=>get_author_name(),
            'id'=>get_the_ID()
            ));
        };

        if(get_post_type() == 'professor') {
            array_push($results['professors'] ,array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'authorName'=>get_author_name(),
            'image'=>get_the_post_thumbnail_url(0,'professorLandscape')
            ));
     };



        if(get_post_type() == 'event') {
            $eventDate= new DateTime(get_field('event_date'));
            $description = null;
            if (has_excerpt()) {
                $description =  get_the_excerpt();
              } else {
                $description =  wp_trim_words(get_the_content(), 18);
                }

            array_push($results['events'] ,array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'authorName'=>get_author_name(),
            'month' =>  $eventDate->format('M'),
            'day' => $eventDate->format('d'),
            'description' => $description
            ));
 };

    if(get_post_type() == 'campus') {
        array_push($results['campuses'] ,array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'post_type' => get_post_type(),
        'authorName'=>get_author_name()
        ));
    };

    };

    if($results['programs']) {
        $programsMetaQuery = array(
            'relation' => 'OR'
        );
    
        foreach($results['program'] as $result) {
            array_push($programsMetaQuery , array(
                'key' =>'related_program',
                'compare'=>'LIKE',
                'value'=>$result['id']
            ));
    
        }
    
        $programRelationshipQuery = new WP_Query(array(
            'post_type' => array('professor,event'),
            'meta_query' => $programsMetaQuery
            
                ));
    
        while($programRelationshipQuery->have_posts()) {
            $programRelationshipQuery->the_post();
            if(get_post_type() == 'professor') {
                array_push($results['professors'] ,array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'post_type' => get_post_type(),
                'authorName'=>get_author_name(),
                'image'=>get_the_post_thumbnail_url(0,'professorLandscape')
                ));
            };

            
            if(get_post_type() == 'event') {
            $eventDate= new DateTime(get_field('event_date'));
            $description = null;
            if (has_excerpt()) {
                $description =  get_the_excerpt();
              } else {
                $description =  wp_trim_words(get_the_content(), 18);
                }
                
            array_push($results['events'] ,array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'authorName'=>get_author_name(),
            'month' =>  $eventDate->format('M'),
            'day' => $eventDate->format('d'),
            'description' => $description
            ));
 };

            if(get_post_type() == 'professor') {
                array_push($results['professors'] ,array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'post_type' => get_post_type(),
                'authorName'=>get_author_name(),
                'image'=>get_the_post_thumbnail_url(0,'professorLandscape')
                ));
            };


        }
    
        $results['professor'] = array_values(array_unique($results['professor'], SORT_REGULAR));

        $results['event'] = array_values(array_unique($results['event'], SORT_REGULAR));
    }
    
    return $results;
}

?>