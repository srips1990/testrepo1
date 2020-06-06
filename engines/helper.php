<?php

	class Helper
	{

		/**
		 * Generate a random string of specified length and keyspace
		 * 
		 * @param  integer $length
		 * @param  integer $keyspace
		 * @return string  
		 */
		function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
		{
		    $str = '';
		    $max = mb_strlen($keyspace, '8bit') - 1;
		    for ($i = 0; $i < $length; ++$i) 
		    {
		        $str .= $keyspace[random_int(0, $max)];
		    }
		    return $str;
		}

	}

?>