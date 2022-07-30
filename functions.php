<?php



//Themes file functions.php (database Name: contacts_validation)

add_filter( 'wpcf7_validate_text*', 'custom_email_confirmation_validation_filter', 20, 2 );

function custom_email_confirmation_validation_filter( $result, $tag ) {

    global $wpdb;
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contacts_validation", OBJECT);

    $counter = $wpdb->query("SELECT * FROM {$wpdb->prefix}contacts_validation", OBJECT);

    if ( 'your-name' == $tag->name ) {


        $bool_value = 0;

        for ($i = 0; $i<=$counter; $i++){

            if ($results[$i]->validation_value == $_POST['your-name']){
                $bool_value = 1;
                break;
            }
        }


        if($bool_value == 0){

            $result->invalidate($tag, 'Your Code Is Not Matching');

        }




    }

    return $result;

}