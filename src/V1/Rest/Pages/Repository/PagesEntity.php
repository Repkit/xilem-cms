<?php

declare(strict_types=1);

namespace MicroIceCms\V1\Rest\Pages\Repository;

use  RpkUtils\Oop\Abstracts\Entity;

class PagesEntity extends Entity
{
    protected $_data = [
    	'Id'					=> null,
		'Name'					=> null,
		'Template'				=> null,
		'DataUrl'				=> null,
        'Status'                => null,
        'PreScript'             => null,
        'PostScript'            => null,
        'Params'                => null,
        'Details'               => null,
        'Category'              => null,
		'Static'				=> null,
    ];
}