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
}