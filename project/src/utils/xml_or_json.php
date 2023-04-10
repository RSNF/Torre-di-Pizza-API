<?php

function xml_or_json_decode(string $content_type, string $contents) {

    $array = array();

    if ($content_type === "application/xml" OR $content_type === "xml") {

        $array = xml_to_array($contents);

    } else if ($content_type === "application/json" OR $content_type === "json") {

        $array = json_decode($contents, true);
    } else {

        $array = json_decode($contents, true);
    };

    return $array;
}

function xml_or_json_encode(string $content_type, array $data) {

    $contents = "";

    if ($content_type === "application/xml" OR $content_type === "xml") {

        $xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='yes'?><root/>");
        $array = array_to_xml($data, $xml);
        $contents = $xml->asXML();

    } else if ($content_type === "application/json" OR $content_type === "json") {

        $contents = json_encode($data, true);
    };

    return $contents;
}

?>