<?php

namespace App\Libraries;

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\Codeigniter4Adapter;

class Datatable
{
	public static function query(string $query) : object
	{
		$dt = new Datatables(new Codeigniter4Adapter());
		return $dt->query($query);
	}
}
