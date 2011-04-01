<?php
/**
 * @package Tivoka
 * @author Marcel Klehr <marcel.klehr@gmx.de>
 * @copyright (c) 2011, Marcel Klehr
 */
/*
 * Processes the response an acts as an interface for dealing with it
 *
 * @package Tivoka
 */
class Tivoka_ClientResponse
{
	const ERROR_NO_RESPONSE = 1;
	const ERROR_INVALID_JSON = 2;
	const ERROR_INVALID_RESPONSE = 3;
	const ERROR_CONNECTION_FAILED = 4;
	const ERROR_HTTP_NOT_FOUND = 5;
	/**
	 * @var mixed The received response as received from the target server
	 * @access private
	 */
	public $response;
	
	/**
	 * @var mixed The result as received from the target (NULL if an error occured)
	 */
	public $result;
	
	/**
	 * @var array The error as received from the target: $error["msg"] => the Error message, $error["code"] => the JSON-RPC error code, $error["data"] => Additional information (NULL if no error occured)
	 */
	public $error;
	
	/**
	 * @var string Contains information about an occured error while sending/processing the request (NULL if no process error occured)
	 */
	public $process_error; 
	
	/**
	 * Initializes a Tivoka_ClientResponse object
	 *
	 * @param string $response The plain JSON-RPC response as received from the target
	 * @access private
	 */
	public function __construct($response)
	{
		$this->result = NULL;
		$this->error = NULL;
		$this->process_error = NULL;
		$this->response = &$response;
	}
	
	/**
	 * Determines whether an error occured
	 *
	 * @return bool
	 */
	public function isError()
	{
		if($this->process_error != NULL || $this->error != NULL)return TRUE;
		return FALSE;
	}
}
?>