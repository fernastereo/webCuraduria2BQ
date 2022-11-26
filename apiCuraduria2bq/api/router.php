<?php
$pattern = '/\/([^\/]+)\/([^\/]+)\/([^\/]+)\/([^\/]+)\/([^\/]+)\/([^\/]+)\/([^\/]+)/'; 
$matches=[];
if(preg_match($pattern, $_SERVER["REQUEST_URI"],$matches))
{
    // http://curaduria2barranquilla.com/apicuraduria2bq/api/router.php/publicacion/2bq/1/2020
    // http://localhost:8000/apicuradurias/api/router.php/publicacion/2bq/1/2020
    $_GET['resource_type']=$matches[4];    
    $_GET['resource_cur']=$matches[5];
    $_GET['resource_data1']=$matches[6];
    $_GET['resource_data2']=$matches[7];
    error_log(print_r($matches,1));
    require 'apicuraduria.php';
}elseif(preg_match('/\/([^\/]+)\/([^\/]+)\/([^\/]+)\/([^\/]+)\/([^\/]+)/',$_SERVER["REQUEST_URI"],$matches)) 
{
    //http://curaduria2barranquilla.com/apicuraduria2bq/api/router.php/publicacion/2bq
    //http://localhost:8000/apicuradurias/api/router.php/publicacion/2bq
    $_GET['resource_type']=$matches[4];    
    $_GET['resource_cur']=$matches[5];
    error_log(print_r($matches,1));
    require 'apicuraduria.php';
}else if(preg_match('/\/([^\/]+)\/?/',$_SERVER["REQUEST_URI"],$matches))
{
    $_GET['resource_type']=$matches[1];        
    error_log(print_r($matches,1));
    require 'apicuraduria.php';
}else
{
    error_log('No matches');
    http_response_code(404);
}
