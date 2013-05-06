<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 06/05/13
 * Time: 19:09
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Entity;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class RefreshToken extends BaseRefreshToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Fer\UserBundle\Entity\User")
     */
    protected $user;
}