<?php

namespace App\Security;

use App\Usuario\Domain\Usuario as AppUser;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof AppUser) {
            return;
        }

        if ($user->deshabilitado()) {
            // the message passed to this exception is meant to be displayed to the user
            throw new CustomUserMessageAccountStatusException('Tu cuenta de usuario no esta activa');
        }
    }

    public function checkPostAuth(UserInterface $user)
    {
        // No se realiza ninguna comprobación extra
    }
}