<?php

/**
 * @Entity
 * @Table(name="permission_profiles")
 */
class PermissionProfile
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string", length=30, nullable=false) */
    private $title;

    /** @Column(type="string", length=1, options={"fixed" = true}) */
    private $manage_site;

    /** @Column(type="string", length=1, options={"fixed" = true}) */
    private $manage_plugins;

    /**
     * One PermissionProfile has Many Groups.
     * @OneToMany(targetEntity="Group", mappedBy="permission_profile")
     */
    private $groups;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getManageSite()
    {
        return $this->manage_site;
    }

    /**
     * @param mixed $manage_site
     */
    public function setManageSite($manage_site)
    {
        $this->manage_site = $manage_site;
    }

    /**
     * @return mixed
     */
    public function getManagePlugins()
    {
        return $this->manage_plugins;
    }

    /**
     * @param mixed $manage_plugins
     */
    public function setManagePlugins($manage_plugins)
    {
        $this->manage_plugins = $manage_plugins;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }
}