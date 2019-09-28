<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hashing {
	public function hash_string($string)
	{
		$options = [
			'cost' => 9,
		];
		$hashed_string = password_hash($string, PASSWORD_BCRYPT, $options);
		return $hashed_string;
	}
	public function hash_verify($plain_text, $hashed_string)
	{
		$unhashed_string = password_verify($plain_text, $hashed_string);
		return $unhashed_string;
	}
}