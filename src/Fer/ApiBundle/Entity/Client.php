<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 06/05/13
 * Time: 19:08
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Entity;


use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}