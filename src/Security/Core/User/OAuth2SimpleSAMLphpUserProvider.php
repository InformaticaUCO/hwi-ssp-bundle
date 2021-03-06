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

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\Exception\AccountNotLinkedException;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider;

class OAuth2SimpleSAMLphpUserProvider extends FOSUBUserProvider
{
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $username = $response->getUsername();
        if (null === $username) {
            throw new AccountNotLinkedException(sprintf('Username is empty.'));
        }

        $user = $this->userManager->findUserBy([$this->getProperty($response) => $username]);
        if ($user) {
            return $user;
        }

        $user = $this->userManager->createUser();
        $user
            ->setUsername($username)
            ->setSspId($username)
            ->setSspAccessToken($response->getAccessToken())
            ->setEmail($response->getEmail())
            ->setPassword('!')
            ->setEnabled(true);

        $this->userManager->updateUser($user);

        return $user;
    }
}
