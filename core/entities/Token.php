<?php

/**
 * @Entity
 * @Table(name="tokens")
 */
class Token
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string", length=60, nullable=false) */
    private $value;

    /** @Column(type="integer", nullable=true, options={"unsigned":true}) */
    private $lifetime;

    /** @Column(type="datetime") */
    private $created_at;

    /**
     * Many Tokens have One User.
     * @ManyToOne(targetEntity="User", inversedBy="tokens")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
    }
}