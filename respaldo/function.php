<?php

function restore($server, $username, $password, $dbname, $location){
    $conn = new mysqli($server, $username, $password, $dbname); 
    $sql = '';
    $output = array('error'=>false);
    
    $lines = file($location);
    
    // Flag para indicar si estamos dentro de una definición de disparador
    $inside_trigger = false;
    $trigger_sql = '';

    foreach ($lines as $line){
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }

        if (!$inside_trigger && strpos($line, 'CREATE TRIGGER') !== false) {
            $inside_trigger = true;
        }

        if ($inside_trigger) {
            $trigger_sql .= $line;

            if (strpos($line, ';') !== false) {
                $inside_trigger = false;
                $query = $conn->query($trigger_sql);

                if (!$query) {
                    $output['error'] = true;
                    $output['message'] = $conn->error;
                    break;
                } else {
                    $output['message'] = 'Base de datos restaurada con éxito';
                }

                $trigger_sql = '';
            }
        } else {
            $sql .= $line;
            if (substr(trim($line), -1, 1) == ';'){
                $query = $conn->multi_query($sql);
                if(!$query){
                    $output['error'] = true;
                    $output['message'] = $conn->error;
                    break;
                }
                else{
                    $output['message'] = 'Base de datos restaurada con éxito';
                }
                $sql = '';
            }
        }
    }

    return $output;
}

?>
