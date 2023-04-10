<?php
// function defination to convert array to xml
function array_to_xml($data, &$xml_data) {

    foreach($data as $key => $value) {

        if(is_array($value) ) {

            if(is_numeric($key) ){
                $key = 'item-'.$key;
            }

            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {

            $xml_data->addChild("$key", htmlspecialchars("$value"));
        }
     }
}