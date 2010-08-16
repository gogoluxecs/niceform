<?php
class niceautoload_lib_ExceptionAndErrorHandler
{
	private function __construct()
	{
		set_error_handler(array($this, 'errorHandler'));
		set_exception_handler(array($this, 'exceptionHandler'));
	}

	public function __destruct()
	{
		restore_error_handler();
		restore_exception_handler();
	}

	static public function getInstance()
	{
		$c = new niceautoload_lib_ExceptionAndErrorHandler();
		return $c;
	}

	/**
	 * Custom error handler
	 *
	 * @return Exception
	 */
	public function errorHandler($severity, $message, $filename, $lineno)
	{
		if (error_reporting() == 0)
			return;

		if (error_reporting() & $severity)
			throw new ErrorException($message, 0, $severity, $filename, $lineno);
	}

	/**
	 * Custome exception handler
	 *
	 * @return String
	 */
	public function exceptionHandler($ex)
	{
		if (php_sapi_name() == 'cli')
		{
	      echo "Error (code:".$ex->getCode().") :".$ex->getMessage()."\n at line ".$ex->getLine()." in file ".$ex->getFile()."\n";
	      echo $ex->getTraceAsString()."\n";
    	}
		else
		{
		  echo "<p style='font-family:helvetica,sans-serif'>\n";
		  echo "<b>Error :</b>".$ex->getMessage()."<br />\n";
		  echo "<b>Code :</b>".$ex->getCode()."<br />\n";
		  echo "<b>File :</b>".$ex->getFile()."<br />\n";
		  echo "<b>Line :</b>".$ex->getLine()."</p>\n";
		  echo "<div style='font-family:garamond'>".nl2br(htmlspecialchars($ex->getTraceAsString()))."</div>\n";
    	}

		exit -1;
	}
}

