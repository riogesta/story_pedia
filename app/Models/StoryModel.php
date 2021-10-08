<?php

namespace App\Models;

use CodeIgniter\Model;

class StoryModel extends Model
{
    protected $table = 'tb_story';
    protected $allowedFields = ['title','story','username'];

    public function getStory()
    {
        $query  = $this->db->query('SELECT * FROM tb_story');
        return $query;

    }

}