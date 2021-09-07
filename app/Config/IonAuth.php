<?php

namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{
	// set your specific config
	// public $siteTitle                = 'Example.com';       // Site Title, example.com
	// public $adminEmail               = 'admin@example.com'; // Admin Email, admin@example.com
	// public $emailTemplates           = 'App\\Views\\auth\\email\\';
	// ...

	public $identity = 'username'; // Use any unique column in your table as identity column.
}
