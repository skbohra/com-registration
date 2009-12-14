<?php

defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

jimport('joomla.filesystem.path');


// Split task into command and task
$cmd = JRequest::getCmd('task', false);

if (!$cmd) {
	$view =	JRequest::getCmd('view', false);
	$layout = JRequest::getCmd('layout', "show");
	if ($view && $layout){
		$cmd = $view.'.'.$layout;
	}
}

if (strpos($cmd, '.') != false) {
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);

	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php';
	//$controllerName = "Front".$controllerName;

	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller '.$controllerName);
	}
} else {
	// Base controller, just set the task
	$controllerName = null;
	$task = $cmd;
}

// Set the name for the controller and instantiate it
$controllerClass = ucfirst($controllerName).'Controller';
if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
} else {
	JError::raiseError(500, 'Invalid Controller Class - '.$controllerClass );
}

// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();
