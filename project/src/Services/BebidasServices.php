<?php

namespace App\Services;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Repositories\BebidasRepository;

include_once "src/utils/array_to_xml.php";
include_once "src/utils/xml_to_array.php";
include_once "src/utils/xml_or_json.php";
include_once "src/utils/get_content_type.php";

class BebidasServices implements ServicesInterface {

    static public function show(Request $request, Response $response, array $params) {

        $result = BebidasRepository::show($params["id"]);
        $params_type = $request->getQueryParams();
    
        $content_type = $request->getHeader("Content-Type");
        @$type = get_content_type($content_type[0], $params_type["type"]);
        $contents = xml_or_json_encode($type, $result);
    
        $response = $response->withHeader("Content-Type", $type);
        $response->getBody()->write($contents);
    
        return $response;
    }
    
    static public function list(Request $request, Response $response, array $params) {

        $result = BebidasRepository::list();
        $params_type = $request->getQueryParams();
    
        $content_type = $request->getHeader("Content-Type");
        @$type = get_content_type($content_type[0], $params_type["type"]);
        $contents = xml_or_json_encode($type, $result);
    
        $response = $response->withHeader("Content-Type", $type);
        
        $response->getBody()->write($contents);
    
        return $response;
    }
    
    static public function store(Request $request, Response $response, array $params) {

        $params_type = $request->getQueryParams();
        $content_type = $request->getHeader("Content-Type");

        $contents = $request->getBody()->getContents();

        @$type = get_content_type($content_type[0], $params_type["type"]);
        
        $array = xml_or_json_decode($type, $contents);
    
        $result = BebidasRepository::store($array);
    
        return $response;
    }
    
    static public function update(Request $request, Response $response, array $params) {

        $params_type = $request->getQueryParams();
        $content_type = $request->getHeader("Content-Type");

        $contents = $request->getBody()->getContents();

        @$type = get_content_type($content_type[0], $params_type["type"]);

        $array = xml_or_json_decode($type, $contents);
    
        $result = BebidasRepository::update($params["id"], $array);
    
        return $response;
    }
    
    static public function delete(Request $request, Response $response, array $params) {

        $result = BebidasRepository::delete($params["id"]);

        return $response;
    }
}

?>