<?php 

namespace App\Controller;

use App\Model\Todo;

class TodoController
{
    public function create()
    {
        $todo = new Todo;
        $todo->setDescription($_POST['description']);
        $todo->save();
        header('Location: /todos')
    }

    public function update(int $id)
    {
        $todo = $this->findTodoById($id);
        $quiz->setDescription($_POST['description']);
        $quiz->save();
        header('Location: /create');
    }

    public function delete(int $id)
    {
        $todo = $this->findTodoById($id);
        $todo->delete();
        header('Location: /todos');
    }
}