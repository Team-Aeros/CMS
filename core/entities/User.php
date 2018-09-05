<?php
/**
 * WIP CMS
 * Open source content management system
 *
 * @version 1.0 Alpha 1
 * @author Aeros Development
 * @copyright 2018, WIP CMS
 * @link https://aeros.com/wipcms
 *
 * @license MIT
 */

use WIPCMS\core\interfaces\Storable;

/**
 * @Entity
 * @Table(name="users")
 */
class User implements Storable
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string", length=50, unique=true) */
    private $email;

    /** @Column(type="string", length=30, unique=true) */
    private $name;

    /** @Column(type="string", length=60, unique=true) */
    private $password;

    /** @Column(type="datetime") */
    private $created_at;

    /** @Column(type="datetime", nullable=true) */
    private $last_session;

    /**
     * Many Users have One Group.
     * @ManyToOne(targetEntity="Group", inversedBy="users")
     * @JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;

    /**
     * One User has Many Tokens.
     * @OneToMany(targetEntity="Token", mappedBy="user")
     */
    private $tokens;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
    }

    public function isRoot() : bool {
        return $this->group == 0;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getLastSession()
    {
        return $this->last_session;
    }

    /**
     * @param mixed $last_session
     */
    public function setLastSession($last_session)
    {
        $this->last_session = $last_session;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return mixed
     */
    public function getTokens()
    {
        return $this->tokens;
    }
}