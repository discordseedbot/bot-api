<?php
function is_valid_json( $raw_json ){
    return ( json_decode( $raw_json , true ) == NULL ) ? false : true ; // Yes! thats it.
}
 ?>
