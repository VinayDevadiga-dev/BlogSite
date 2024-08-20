<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AdminModel;


class AuthController extends Controller {
    // Method to display the admin login form
    public function showLoginForm() {
        return view('login');
    }

    // Method to handle admin login
    public function login() {
        $session = session();
        $db = \Config\Database::connect();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Query the database for the admin user
        $query = $db->table('admin')->getWhere(['username' => $username]);

        // Check if admin user exists
        if ($query->getNumRows() == 1) {
            $user = $query->getRow();

            // Verify password (assuming passwords are stored as plain text)
            // In a real-world application, passwords should be hashed
            if ($user->password === $password) {
                // If valid, set session variable and redirect to a protected page
                $session->set('user', $username);
                return redirect()->to('/admin'); // Redirect to admin page
            }
        }

        // If invalid, redirect back to login page with an error message
        return redirect()->to('/login')->with('error', 'Invalid credentials');
    }

    // Method to display the user login form
    public function showUserLoginForm() {
        return view('userlogin');
    }

    // Method to handle user login
    public function userLogin() {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        

        // Query the database for the user
        $user = $model->where('username', $username)->first();

        // Check if user exists and password is correct
        if ($user && $user['password'] === $password) {
            // If valid, set session variable and redirect to welcome page
            $session->set('user', $username);
            $session->set('user_id', $user['id']);
            return redirect()->to('/welcome');
        }

        // If invalid, redirect back to login page with an error message
        return redirect()->to('/userlogin')->with('error', 'Invalid credentials');
    }

    // Method to show the welcome page for users
   // Method to show the user dashboard
   public function showWelcome() {
    // Prevent back button after login
    $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    $this->response->setHeader('Cache-Control', 'post-check=0, pre-check=0', false);
    $this->response->setHeader('Pragma', 'no-cache');

    // Check if user is authenticated
    if (!session()->get('user')) {
        return redirect()->to('/userlogin')->with('error', 'Please log in first.');
    }

    return view('user_dashboard');
}


    // Method to display the user registration form
    public function showRegisterForm() {
        return view('register');
    }

    // Method to handle user registration
    public function register() {
        $model = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
        $model->insert($data);
        return redirect()->to('/register')->with('success', 'User registered successfully');
    }
    // In AuthController.php

public function logout()
{
    session()->destroy(); // Destroy the session
    return redirect()->to('/userlogin'); // Redirect to the user login page
}

public function adminLogout()
{
    session()->destroy(); // Destroy the session
    return redirect()->to('/login'); // Redirect to the admin login page
}

}
?>
