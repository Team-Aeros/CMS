<?php

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string", length=50, unique=true, nullable=false) */
    private $email;

    /** @Column(type="string", length=30, unique=true, nullable=false) */
    private $name;

    /** @Column(type="string", length=60, unique=true, nullable=false) */
    private $password;

    /** @Column(type="datetime") */
    private $created_at;

    /** @Column(type="datetime" nullable="true") */
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
}