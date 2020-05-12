<?php

namespace App\Models;

use App\Core\Model;

class Turno extends Model
{
    protected $table = 'turno';

    public function get()
    {
        return $this->db->selectAll($this->table);
    }

    public function insert(array $turno)
    {
        $this->db->insert($this->table, $turno);
    }
}
