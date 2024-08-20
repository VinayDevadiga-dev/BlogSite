<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BlogModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\BlogLikesModel;
class BlogController extends Controller
{
    public function create()
    {
        return view('create_blog');
    }

    public function save_blog()
    {
        helper(['form']);
    
        try {
            $rules = [
                'name' => 'required',
                'bio' => 'required|max_length[300]',
                'about' => 'required|max_length[400]',
                'photo' => 'uploaded[photo]|max_size[photo,5120]|is_image[photo]'
            ];
    
            if ($this->validate($rules)) {
                $session = session();
                $userId = $session->get('user_id');
    
                $name = $this->request->getPost('name');
                $bio = $this->request->getPost('bio');
                $about = $this->request->getPost('about');
                $photo = $this->request->getFile('photo');
    
                if ($photo->isValid() && !$photo->hasMoved()) {
                    $photoContent = file_get_contents($photo->getTempName());
                    $photoMimeType = $photo->getMimeType();
    
                    $data = [
                        'name' => $name,
                        'bio' => $bio,
                        'about' => $about,
                        'photo_path' => $photoContent,
                        'photo_mime_type' => $photoMimeType,
                        'uploaded_by' => $userId,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
    
                    $model = new BlogModel();
                    if ($model->insert($data)) {
                        // Store the success message in the session
                        $session->setFlashdata('success', 'Blog saved successfully.');
                    } else {
                        throw new \Exception('Failed to save blog.');
                    }
                } else {
                    throw new \Exception('Error uploading photo.');
                }
            } else {
                throw new \Exception($this->validator->listErrors()); 
            }
        } catch (\Exception $e) {
            // Store the error message in the session
            session()->setFlashdata('error', $e->getMessage());
        }
    
        // Redirect back to the create blog page
        return redirect()->to('/create_blog');
    }
    

    public function update_blog_form()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new BlogModel();
        $data['blogs'] = $model->where('uploaded_by', $userId)->findAll();

        return view('update_blog', $data);
    }

    public function update_blog($id)
{
    helper(['form']);

    try {
        $rules = [
            'name' => 'required',
            'bio' => 'required|max_length[300]',
            'about' => 'required|max_length[400]',
            'photo' => 'uploaded[photo]|max_size[photo,5120]|is_image[photo]'
        ];

        if ($this->validate($rules)) {
            $model = new BlogModel();
            $blog = $model->find($id);

            if ($blog && $blog['uploaded_by'] == session()->get('user_id')) {
                $name = $this->request->getPost('name');
                $bio = $this->request->getPost('bio');
                $about = $this->request->getPost('about');
                $photo = $this->request->getFile('photo');

                $data = [
                    'name' => $name,
                    'bio' => $bio,
                    'about' => $about
                ];

                if ($photo->isValid() && !$photo->hasMoved()) {
                    $photoContent = file_get_contents($photo->getTempName());
                    $photoMimeType = $photo->getMimeType();
                    $data['photo_path'] = $photoContent;
                    $data['photo_mime_type'] = $photoMimeType;
                }

                $model->update($id, $data);
                session()->setFlashdata('success', 'Blog updated successfully.');
                return redirect()->to('/update_blog'); // Adjust the redirect URL as needed
            } else {
                throw PageNotFoundException::forPageNotFound();
            }
        } else {
            throw new \Exception($this->validator->listErrors());
        }
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', $e->getMessage());
    }
}


    public function viewAll()
    {
        $model = new BlogModel();
        $data['blogs'] = $model->findAll();

        return view('view_blogs', $data);
    }

    public function updateBlog($id)
    {
        $model = new BlogModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'bio' => $this->request->getPost('bio'),
            'about' => $this->request->getPost('about'),
        ];

        if ($file = $this->request->getFile('photo')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $fileContent = file_get_contents($file->getTempName());
                $data['photo_path'] = $fileContent;
                $data['photo_mime_type'] = $file->getMimeType();
            }
        } 

        $model->update($id, $data);

        return redirect()->to('/update_blog_form');
    }

    public function deleteBlog($id)
    {
        $model = new BlogModel();
        $model->delete($id);

        return redirect()->to('/update_blog_form');
    }
 // app/Controllers/AdminController.php




    
}
