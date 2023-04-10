<?php

function xml_to_array($xmlstring) {

    $xml = simplexml_load_string($xmlstring, null, LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json, TRUE);

    return $array;
}

?>