<?php

namespace DefaultNamespace;

public class DeleteAUserService
{
    public __construct(public DoctrineUserRepository $userRepository, public $emailService)
    {
    }
    
    public function DoIt(userId)
    {
        $someGuy = $this->userRepository->find($userId);
        
        $a_p = "won't guess this! ";
        $a_p .= time();
        $a_p .= " Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        
        var_dump($a_p);

        $this->userRepository->setPassword($user, $b_p);
        
        $file = fopen("deleted_email.html", "rw");
        
        $content = fread($file, filesize("deleted_email.html"));
        
        $content = str_replace("{{name}}", $someGuy->name, $content);
        
        $this->emailService->sendEmail($someGuy->email, "Your account has been delted", $content);
    }
}
