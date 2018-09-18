<?php
// Our custom post type to manage "Films"
function create_posttype() {
 
    register_post_type( 'films',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Films' ),
                'singular_name' => __( 'Film' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'films'),
            'supports' => array( 'title','thumbnail','editor' )
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

// Add taxonimies to films
function films_taxonomy() {
    
    // Genre taxonomy
    register_taxonomy(  
        'films_genre',  //The name of the taxonomy. 
        'films',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Genre',  //Display name
            'query_var' => true,
        )  
    );

    // Country taxonomy
    register_taxonomy(  
        'films_country',  //The name of the taxonomy. 
        'films',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Country',  //Display name
            'query_var' => true,
        )  
    ); 

    // Year taxonomy
    register_taxonomy(  
        'films_year',  //The name of the taxonomy. 
        'films',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Year',  //Display name
            'query_var' => true,
        )  
    );

    // Actors taxonomy
    register_taxonomy(  
        'films_actors',  //The name of the taxonomy. 
        'films',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Actors',  //Display name
            'query_var' => true,
        )  
    ); 
}  
add_action( 'init', 'films_taxonomy');



// Add Shortcode for display last 5 Films

function footag_func( $atts ) {
    $args = array(
      'numberposts' => 5,
      'post_type' => 'films'
    );
     
    $latest_posts = get_posts( $args );
    $return = "";
    if(@$latest_posts){ // Check if any films
        $return .= "<ul>";
            foreach ($latest_posts as $postvalue) {
                
                $return .= "<li><a href='".get_permalink($postvalue->ID)."'>".$postvalue->post_title."</a></li>";
            }
        $return .= "<ul>";

    }else{ // if no films
        $return = "No films yet";
    }
    //echo "<pre>";
    //print_r($latest_posts);
    return $return;
}
add_shortcode( 'films', 'footag_func' );




function get_movies_archive_template( $archive_template ) {
     global $post;
     if ( is_post_type_archive ( 'films' ) ) {
        $archive_template = dirname( __FILE__ ) . '/archive-films.php';
     }
     return $archive_template;
}
add_filter( 'archive_template', 'get_movies_archive_template' ) ;


?>