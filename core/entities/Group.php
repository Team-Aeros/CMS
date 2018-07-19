<?php

/**
 * @Entity
 * @Table(name="groups")
 */
class Group
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string", length=30, nullable=false) */
    private $name;

    /**
     * One Group has Many Users.
     * @OneToMany(targetEntity="User", mappedBy="group")
     */
    private $users;

    /**
     * Many Groups have One PermissionProfile.
     * @ManyToOne(targetEntity="PermissionProfile", inversedBy="groups")
     * @JoinColumn(name="permission_profile_id", referencedColumnName="id")
     */
    private $permissionProfiles;

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
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return mixed
     */
    public function getPermissionProfiles()
    {
        return $this->permissionProfiles;
    }
}