<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BlogModel;
use App\Models\UserModel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function viewBlogs()
    {
        $blogModel = new BlogModel();
        $data['blogs'] = $blogModel->findAll();

        return view('view_blogs_admin', $data);
    }

    public function viewUsers()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('view_users', $data);
    }

    public function deleteUser()
    {
        $userModel = new UserModel();
        $userId = $this->request->getPost('user_id');

        // Delete the user from the database
        $userModel->delete($userId);

        // Redirect back to the view users page
        return redirect()->to('/view_users')->with('success', 'User deleted successfully');
    }
    public function deleteBlog($id)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);

        if ($blog) {
            $blogModel->delete($id);
            return redirect()->to('/view_blogs_admin')->with('success', 'Blog deleted successfully');
        } else {
            return redirect()->to('/view_blogs_admin')->with('error', 'Blog not found');
        }
    }
    public function delete_multiple_blogs()
{
    $blog_ids = $this->request->getPost('blog_ids');
    if (!empty($blog_ids)) {
        // Load your Blog model
        $blogModel = new \App\Models\BlogModel();
        
        // Loop through the selected blog IDs and delete them
        foreach ($blog_ids as $id) {
            $blogModel->delete($id);
        }
        
        // Set a success message
        return redirect()->to('/admin')->with('message', 'Selected blogs have been deleted.');
    } else {
        // Set an error message if no blogs were selected
        return redirect()->to('/admin')->with('error', 'No blogs selected for deletion.');
    }
}
}
