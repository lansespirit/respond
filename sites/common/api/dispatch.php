<?php 

	include '../../../app.php';

	require_once '../../../api/lib/Tonic/Autoloader.php';
	require_once 'site.php';
	require_once 'page.php';
	require_once 'user.php';
	require_once 'form.php';
        
    // set REQUEST_URI as the default $uri
    $uri = $_SERVER['REQUEST_URI'];
    
    // grab everything after API (should fix subdirectory issue)
    $parts = explode('/api', $uri);
	$uri = $parts[1];
    
	// handle request
	$app = new Tonic\Application();
	$request = new Tonic\Request(
			array(
				'uri' => $uri
			));

	$resource = $app->getResource($request);
	$response = $resource->exec();
	
	$response->output();

?>