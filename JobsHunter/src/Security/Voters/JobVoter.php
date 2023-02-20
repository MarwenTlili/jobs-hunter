<?php

namespace App\Security\Voters;

use App\Entity\Job;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class JobVoter extends Voter {
    // these strings are just invented: you can use anything
    const VIEW = 'view';
    const EDIT = 'edit';

    protected function supports($attribute, $subject): bool{
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::VIEW, self::EDIT])) {
            return false;
        }

        // only vote on `Job` objects
        if (!$subject instanceof Job) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool{
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        // you know $subject is a Job object, thanks to `supports()`
        /** @var Job $job */
        $job = $subject;
        
        switch ($attribute) {
            case self::VIEW:
                return $this->canView($job, $user);
            case self::EDIT:
                return $this->canEdit($job, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Job $job, User $user): bool{
        // if they can edit, they can view
        if ($this->canEdit($job, $user)) {
            return true;
        }

        // other use case:
        // the Job object could have, for example, a method `isPrivate()`
        // return !$job->isPrivate();
    }

    private function canEdit(Job $job, User $user): bool{
        // this assumes that the Job object has a `getOwner()` method
        return $user === $job->getCompany()->getUser();
    }
}
