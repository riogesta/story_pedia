<?php

namespace App\Models;

use CodeIgniter\Model;

class StoryModel extends Model
{
    protected $table = 'tb_story';
    protected $allowedFields = ['title','story','date','username'];

    public function getStory()
    {
        $query  = $this->db->query('SELECT * FROM tb_story');
        return $query;

    }

    public function editStory($id, $title, $story, $date)
    {
        $sql = "UPDATE tb_story SET title = ? , story = ? , date = ? WHERE id_story = ?";
        $this->db->query($sql, [$title, $story, $date, $id]);
    }

}