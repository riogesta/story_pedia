<?php

namespace App\Controllers;

use App\Models\StoryModel;
use CodeIgniter\Controller;

class Story extends BaseController
{

    public function myStory()
    {

        $model = new StoryModel();
        
        // if username in cookie is not available go back to login
        if (!$this->checkUsername()) {
            return redirect()->route('signout');
        }

        $username = $_COOKIE['username'];

        $query = $model->getWhere(['username' => $username]);
        // var_dump($query->getRowArray());die();

        $data['story'] = $query->getResultArray();

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('story/list-story-view', $data);
        echo view('templates/footer');
    }

    public function newStory()
    {
        if (!$this->checkUsername()) {
            return redirect()->route('signout');
        }
        
        echo view('templates/head');
        echo view('templates/navbar');
        echo view('story/write-story-view');
        echo view('templates/footer');
    }

    public function editStory()
    {
        $model = new StoryModel();

        if (!isset($_POST['edit'])) {
            $id = $this->request->getPost('id_story');
    
            $query = $model->getWhere(['id_story' => $id]);
            $data['story'] = $query->getRowArray();
    
            echo view('templates/head');
            echo view('templates/navbar');
            echo view('story/edit-story-view', $data);
            echo view('templates/footer');

        } else {

            $id = $this->request->getPost('id');
            $title =  $this->request->getPost('title');
            $story = $this->request->getPost('editor1');
            $date = '00/00/0000';

            $model->editStory($id, $title, $story, $date);
            return redirect()->route('ceritaku');                        
            // var_dump($data);
        }
    }

    public function saveStory()
    {
        $model = new StoryModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'story' => $this->request->getPost('content'),
            'username' => $_COOKIE['username'],
        ];

        $model->insert($data);

        return redirect()->route('/');

    }

    public function readStory($id = false)
    {
        $model = new StoryModel();

        $query = $model->getWhere(['id_story' => $id]);
        
        $data['story'] = $query->getRowArray();
        
        // var_dump($data);
        echo view('templates/head');
        echo view('templates/navbar');
        echo view('story/read-view', $data);
        echo view('templates/footer');

    }

    public function checkUsername()
    {
        $model = new StoryModel();
        $user = $_COOKIE['username'];

        $query = $model->checkUsername($user);
        $username = $query->getRowArray();

        if ($username) {
            return true;
        } else {
            return false;
        }
    }
}