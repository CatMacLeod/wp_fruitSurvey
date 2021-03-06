<?php

function get_fruit_data($prefix) {
    global $wpdb;
    $sql = 'SELECT option_id, option_name, option_value FROM wp_options WHERE option_name LIKE \''.$prefix.'%\' ORDER BY option_name';
    $submissions = $wpdb->get_results($sql);
    
    $apple = 0;
    $banana = 0;
    $orange = 0;
    
    foreach ($submissions as $option) {
        $data = json_decode($option->option_value, TRUE);
        if (is_array($data)) {
            foreach ($data as $key => $value)
            {
                if(strcmp($key, $prefix.'_fruit') != 0) { continue; }
                switch($value) {
                    case 'Apple': $apple++; break;
                    case 'Banana'    : $banana++;     break;
                    case 'Orange'  : $orange++;   break;
                    default: break;
                }
            }
        }
    }

    return 
        '[
            { name: "Apple", y: '.$apple.' },
            { name: "Banana",     y: '.$banana.'     },
            { name: "Orange",   y: '.$orange.'   }
        ]';
}



function query_results_as_table($records, $title = null) {
    if($title != null) {
        $title = '<h1>'.$title.'</h1>'.PHP_EOL;
    }
    if (!is_array($records) || empty($records)) { return false; }
    $header = table_row($records[0], 'th');
    $rows = array();
    foreach ($records as $record) {
        $rows[] = table_row($record, 'td');
    }
    echo $title.'<table>'.PHP_EOL.$header.join($rows).'</table>'.PHP_EOL.PHP_EOL;
    return true;
}

function table_row($record, $element) {
    $values = array();
    foreach ($record as $field_name => $field_value) {
        $values[] = $element == 'th' ? $field_name : $field_value;
    }
    return '<tr><'.$element.'>'.join('</'.$element.'><'.$element.'>', $values).'</'.$element.'></tr>'.PHP_EOL;
}

?>
