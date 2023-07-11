<?php

namespace App\Http\Livewire;

use Livewire\Component;
// import Model
use App\Models\TodoItem;

class TodoList extends Component
{
    public $todos;
    public string $todoText='';

    public function mount()
    {
        // call method
        $this->selectTodos();
    }
    public function render()
    {
        return view('livewire.todo-list');
    }
    public function selectTodos()
    {
        // query DB  *created_at*  past time
        $this->todos= TodoItem::orderBy('created_at','DESC')->get();
    }

    public function addTodo()
    {
        $todo = new TodoItem();
        $todo->todo = $this->todoText;
        $todo->completed = false;
        // save to DB
        $todo->save();

        // reset todoText
        $this->todoText = '';
        // update page
        $this->selectTodos();
    }

    public function toggleTodo($id)
    {
        // query DB
        $todo= TodoItem::where('id', $id)->first();
       if(!$todo){
        // if not exist
        return ;
       }
        $todo->completed = !$todo->completed;
        // save to DB
        $todo->save();

        // update page
        $this->selectTodos();
    }

    public function deleteTodo($id)
    {
        // query DB
        $todo= TodoItem::where('id', $id)->first();
       if(!$todo){
        // if not exist
        return ;
       }
        $todo->delete();
    
        // update page
        $this->selectTodos();
    }
}
