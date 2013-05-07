<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 06/05/13
 * Time: 19:15
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
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

	/**
	 * @var string
	 *
	 * @ORM\Column(name="facebookId", type="string", length=255, nullable=true)
	 */
	protected $facebookId;

	public function serialize()
	{
		return serialize(array($this->facebookId, parent::serialize()));
	}

	public function unserialize($data)
	{
		list($this->facebookId, $parentData) = unserialize($data);
		parent::unserialize($parentData);
	}

	/**
	 * @param string $facebookId
	 * @return void
	 */
	public function setFacebookId($facebookId)
	{
		$this->facebookId = $facebookId;
		$this->setUsername($facebookId);
		$this->salt = '';
	}

	/**
	 * @return string
	 */
	public function getFacebookId()
	{
		return $this->facebookId;
	}

	/**
	 * @param Array
	 */
	public function setFBData($fbdata)
	{
		if (isset($fbdata['id'])) {
			$this->setFacebookId($fbdata['id']);
			$this->addRole('ROLE_FACEBOOK');
		}

		if (isset($fbdata['email'])) {
			$this->setEmail($fbdata['email']);
		}
	}



}