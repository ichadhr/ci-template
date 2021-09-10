<?php
/**
 * Modules user model
 */

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
	/**
	 * Configuration
	 */
	protected \IonAuth\Config\IonAuth $configIonAuth;

	protected function initialize() : void
	{
		$this->configIonAuth = config('IonAuth');
	}
}
