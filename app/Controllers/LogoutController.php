<?php

namespace App\Controllers;

class LogoutController extends BaseController
{
    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy all session data
        return redirect()->to('/login'); // Redirect to login page after logout
    }
}
