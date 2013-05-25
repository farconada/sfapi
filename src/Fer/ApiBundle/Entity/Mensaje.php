<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 19/05/13
 * Time: 20:52
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Entity;


use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Fer\ApiBundle\Entity\MensajeRepository")
 */
class Mensaje {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     * @Assert\NotBlank
     */
    private $texto;

    /**
     * @ORM\Column(nullable=true)
     * @var \Fer\UserBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="\Fer\UserBundle\Entity\User")
     * @Serializer\Exclude
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }



}