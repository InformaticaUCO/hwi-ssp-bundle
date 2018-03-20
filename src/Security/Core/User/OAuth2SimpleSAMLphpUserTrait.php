<?php

/*
 * This file is part of the 'hwi-ssp-bundle' project.
 *
 * (c) Servicio de Informática de la Universidad de Córdoba
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace InformaticaUco\Bundle\HwiSspBundle\Security\Core\User;

trait OAuth2SimpleSAMLphpUserTrait
{
    /**
     * @var string
     * @ORM\Column(name="ssp_id", type="string", length=50, unique=true, nullable=true)
     */
    protected $ssp_id;

    /**
     * @var string
     */
    protected $sspAccessToken;

    /**
     * @return string
     */
    public function getSspId()
    {
        return $this->ssp_id;
    }

    /**
     * @param string $ssp_id
     *
     * @return OAuth2SimpleSAMLphpUserTrait
     */
    public function setSspId($ssp_id)
    {
        $this->ssp_id = $ssp_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getSspAccessToken()
    {
        return $this->sspAccessToken;
    }

    /**
     * @param string $sspAccessToken
     *
     * @return OAuth2SimpleSAMLphpUserTrait
     */
    public function setSspAccessToken($sspAccessToken)
    {
        $this->sspAccessToken = $sspAccessToken;

        return $this;
    }
}
