<?php  
// Define an array of allowed files - VERY IMPORTANT!  
//$allowed = array ( '');  

// If it's an allowed file, display it.  
if ( isset ( $_GET['view'] )) {  
    highlight_file ( $_GET['view'] );  
} else {  
    // Specify current directory  
    $location = './';  

    // Open current directory  
    $dir = dir($location);  

    // Loop through the directory  
    while ( $entry = $dir->read() ) {  
        if (is_dir ($entry)) continue;   
        // Show allowed files only  
        //if ( in_array ( $entry, $allowed ) )  
            echo ( "<a href=\"".$_SERVER['PHP_SELF'].  
                   "?view=".$entry."\">".$entry."</a><br />\n" );  
    }  

    // Close it again!  
    $dir->close();  
}  
?>  
    