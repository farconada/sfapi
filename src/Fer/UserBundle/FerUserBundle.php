<?php

namespace Fer\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FerUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
