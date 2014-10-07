<?php

namespace Applicant\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicantUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
