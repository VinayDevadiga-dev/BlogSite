<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register()
    {
        helper(['form']);

        // Validate input
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'username' => 'required|min_length[3]|max_length[255]|is_unique[users.username]',
            'password' => 'required|min_length[6]|max_length[255]',
            'avatar' => [
                'uploaded[avatar]',
                'mime_in[avatar,image/jpg,image/jpeg,image/png]',
            ],
        ];

        if ($this->validate($rules)) {
            $avatar = $this->request->getFile('avatar');

            // Check if file is uploaded successfully
            if ($avatar->isValid() && !$avatar->hasMoved()) {
                $avatarName = $avatar->getRandomName();

                // Move uploaded file to a writable directory (public/uploads)
                $avatar->move(ROOTPATH . 'public/uploads', $avatarName);

                // Check if file is moved correctly
                if ($avatar->getError() == UPLOAD_ERR_OK) {
                    $model = new UserModel();

                    $data = [
                        'name' => $this->request->getPost('name'),
                        'username' => $this->request->getPost('username'),
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                        'avatar' => $avatarName, // Save file name to database
                    ];

                    // Save data to database
                    $model->save($data);

                    // Redirect with success message
                    return redirect()->to('/register')->with('success', 'User registered successfully');
                } else {
                    // Handle upload errors
                    return redirect()->back()->with('error', $avatar->getErrorString());
                }
            } else {
                // Handle validation errors or file not uploaded
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
        } else {
            // Handle validation errors
            return view('register', [
                'validation' => $this->validator,
            ]);
        }
    }
}
