<?php
namespace App\Model\Table;

use \App\Controller\Database\DatabaseController;

class Table
{
    protected $db;
    protected $table;

    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
        if(is_null($this->table))
        {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }
    public function count()
    {
        return $this->query("SELECT COUNT(id) as nbrow FROM {$this->table}", null, true, null);
    }

    public function find($id)
    {
        dd("SELECT * FROM {$this->table} WHERE id=?");
        return $this->query("SELECT * FROM {$this->table} WHERE id=?", [$id], true);
    }
    public function query(string $statement, ?array $attributes = null, bool $one = false, ?string $class_name = null)
    {
        
        if(is_null($class_name))
        {
            $class_name = str_replace('Table', 'Entity', get_class($this));
        }
        if($attributes)
        {
            return $this->db->prepare(
                    $statement,
                    $attributes,
                    $class_name,
                    $one
            );
        }
        else
        {
            return $this->db->query(
                    $statement,
                    $class_name,
                    $one
            );
        }
    }
}