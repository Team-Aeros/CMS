<?php

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string", nullable=true) */
    private $username;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    public function getUsername() : ?string
    {
        return $this->username;
    }
}