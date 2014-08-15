<?php 
namespace lib;

use \Exception as Exception;
/**
* 
*/
class NotFoundException extends Exception
{
	
	function __construct()
	{
		parent::__construct('Page not found exception');
	}
}

 ?>