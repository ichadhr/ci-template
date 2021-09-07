<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class SiteConfig extends BaseConfig
{
	public string $appName    = 'Template';
	public string $appVersion = '0.0.1';
	public string $startDev   = '2021';

	public string $generalBtnColor  = 'bg-primary-400';
	public string $generalIconColor = 'text-indigo-400';
	public string $borderTopLogin   = 'border-top-lg border-top-primary-800';

	// icon sidebar
	public string $iconDashboard = 'icon-home4';
	public string $iconUser      = 'icon-users2';

	public string $successStartDelimiter  = '<div class="alert alert-success no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>';  // Message start delimiter
	public string $infoStartDelimiter     = '<div class="alert alert-info no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>';
	public string $errorStartDelimiter    = '<div class="alert alert-danger no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>'; // Error message start
	public string $endDelimiter           = '</div>';  // Message end delimiter
}
