<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function GetParentFolder( $folderPath )
{
	$sPattern = "-[/\\\\][^/\\\\]+[/\\\\]?$-" ;
	return preg_replace( $sPattern, '', $folderPath ) ;
}

function CreateServerFolder( $folderPath, $lastFolder = null )
{
	global $Config ;
	$sParent = GetParentFolder( $folderPath ) ;

	// Ensure the folder path has no double-slashes, or mkdir may fail on certain platforms
	while ( strpos($folderPath, '//') !== false )
	{
		$folderPath = str_replace( '//', '/', $folderPath ) ;
	}

	// Check if the parent exists, or create it.
	if ( !empty($sParent) && !file_exists( $sParent ) )
	{
		//prevents agains infinite loop when we can't create root folder
		if ( !is_null( $lastFolder ) && $lastFolder === $sParent) {
			return "Can't create $folderPath directory" ;
		}

		$sErrorMsg = CreateServerFolder( $sParent, $folderPath ) ;
		if ( $sErrorMsg != '' )
			return $sErrorMsg ;
	}

	if ( !file_exists( $folderPath ) )
	{
		// Turn off all error reporting.
		error_reporting( 0 ) ;

		$php_errormsg = '' ;
		// Enable error tracking to catch the error.
		ini_set( 'track_errors', '1' ) ;

		
			$oldumask = umask(0) ;
			mkdir( $folderPath) ;
			umask( $oldumask ) ;
	
		$sErrorMsg = $php_errormsg ;

		// Restore the configurations.
		ini_restore( 'track_errors' ) ;
		ini_restore( 'error_reporting' ) ;

		return $sErrorMsg ;
	}
	else
		return '' ;
}
?>