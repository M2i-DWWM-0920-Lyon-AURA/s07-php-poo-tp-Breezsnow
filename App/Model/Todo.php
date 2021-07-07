<?php
 
namespace App\Model;

class Todo
{
    protected $id;
    protected $description;
    protected $done;

    public function __construct
    (
        int $id = null,
        string $description = '',
        int $done = null
    )
    {
        $this->id = $id;
        $this->description = $description;
        $this->done = $done;
    }

    public function create($id, $description, $done)
    {
        return new Todo($id, $description, $done);
    }

    public function fetchAll()
    {
        global $dbh;
        $stmt = $dbh->query('SELECT * FROM `todos`');
        return $stmt->fetchAll(PDO::FETCH_FUNC,'Todo::create');
    }

    public function findTodoById($id)
    {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM `todos` WHERE `id` = :id');
        $stmt = execute ([':id'=> $id]);
        $result = $stmt->fetchAll(PDO::FETCH_FUNC, 'Todo:create');

        if (empty($result)) {
            return null;
        }

        return $result[0];
    }

    protected function new()
    {
        global $dbh;
        
        $stmt = $dbh->prepare('INSERT INTO `todos` (`description`,`done`) VALUES (:description,:done)');
        $stmt->execute([':description' => $this->description,':done' => $this->done],);

        $this->id = $dbh->lastInsertId();
    }

    protected function update()
    {
        global $dbh;

        $stmt = $dbh->prepare('UPDATE `todos` SET `description` = :description, `done = :done` WHERE `id` = :id');
        $stmt->execute([':id' => $this->id,':description' => $this->description,':done' => $this->done],);
    }

    protected function delete()
    {
        global $dbh;

        $stmt = $dbh->prepare('DELETE FROM `todos` WHERE `id` = :id');
        $stmt->execute([ ':id' => $this->id ]);

    }

    public function save() 
    {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of done
     */ 
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set the value of done
     *
     * @return  self
     */ 
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }
}