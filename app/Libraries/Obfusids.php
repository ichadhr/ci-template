<?php

namespace App\Libraries;

use Jenssegers\Optimus\Optimus;

class Obfusids
{
	protected object $optimus;

	public function __construct()
	{
		// generate using 'php vendor/bin/optimus spark'
		$this->optimus = new Optimus(1374272279, 1308175527, 1951845239, 21);
	}

	/**
	 * encode ids
	 *
	 * @param integer $ids
	 * @return integer
	 */
	public function encode(int $ids) : int
	{
		return $this->optimus->encode($ids);
	}

	/**
	 * decode ids
	 *
	 * @param integer $prime
	 * @return integer
	 */
	public function decode(int $prime) : int
	{
		return $this->optimus->decode($prime);
	}
}
