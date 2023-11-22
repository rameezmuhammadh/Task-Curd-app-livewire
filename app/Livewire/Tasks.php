<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{
    public $title,$description;
    public $tasks;
    public $edit_mode = false;
    public $task_id;
    public function store()  {
        $validated_data = $this->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        
        Task::create($validated_data);
        session()->flash('message','Task created successfully');
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->title = '';
        $this->description = '';
        
    }

    public function edit($id){
        $this->edit_mode = true;
        $task= Task::find($id);
        $this->title = $task->title;
        $this->description = $task->description;
        $this->task_id = $id;
    }
    public function update(){
        $validated_data = $this->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

       $task = Task::find($this->task_id);
        $task->update($validated_data);

        session()->flash('message','Task updated successfully');
        $this->resetInputFields();
        $this->edit_mode=false;
    }
    public function cancelUpdate(){
        $this->edit_mode =false;
        $this->resetInputFields();
    }
    public function delete($id){
        $task= Task::find($id);
        $task->delete();
    }

    public function render()
    {
        $this->tasks= Task::all();
        return view('livewire.tasks');
    }
}
