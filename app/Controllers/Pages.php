<?php

namespace App\Controllers;

use App\Models\StoryModel;
use CodeIgniter\Controller;

class Pages extends BaseController
{       
    public function index()
    {
        $session = session('status');
        if (!isset($session)) {
            return redirect()->route('signin');
        }
        $model = new StoryModel();
        
        $row = $model->getStory()->getResultArray();
        
        $data['story'] = $row;

        echo view('templates/head');
        echo view('templates/navbar');
        echo view('index', $data);
        echo view('templates/footer');
    }
}