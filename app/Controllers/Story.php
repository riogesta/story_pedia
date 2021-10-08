<?php

namespace App\Controllers;

use App\Models\StoryModel;
use CodeIgniter\Controller;

class Story extends BaseController
{

    public function myStory()
    {

        // if username in cookie is not available go back to login
        if (!isset($_COOKIE['username'])) {
            return redirect()->route('signout');
        }

        $username = $_COOKIE['username'];

        $model = new StoryModel();
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
        echo view('templates/head');
        echo view('templates/navbar');
        echo view('story/write-story-view');
        echo view('templates/footer');
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
}