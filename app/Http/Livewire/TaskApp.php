<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Task;
use Livewire\Component;

class TaskApp extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $status, $description, $task_id;
    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'description' => ['required', 'string'],
            //'status' => 'required|int',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveTask()
    {
        $validatedData = $this->validate();
        //  dd($validatedData);
        Task::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'] ?? 0,


        ]);

        session()->flash('message', 'Task Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function changeStatusToCompleted(int $task_id)
    {

        Task::where('id', $task_id)->update([

            'status' => 1,

        ]);
        session()->flash('message', 'Status changed to completed');
    }
    public function changeStatusToPending(int $task_id)
    {
        Task::where('id', $task_id)->update([

            'status' => 0,

        ]);
        session()->flash('message', 'Status changed to pending');
    }

    public function editTask(int $task_id)
    {
        $task = Task::find($task_id);
        if ($task) {

            $this->task_id = $task->id;
            $this->name = $task->name;
            $this->description = $task->description;
            $this->status = $task->status;
        } else {
            return redirect()->to('/tasksapp');
        }
    }

    public function updateTask()
    {
        $validatedData = $this->validate();

        Task::where('id', $this->task_id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,

        ]);
        session()->flash('message', 'Task Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteTask(int $task_id)
    {
        $this->task_id = $task_id;
    }

    public function destroyTask()
    {
        Task::find($this->task_id)->delete();
        session()->flash('message', 'Task Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->description = '';
        $this->status = '';
    }

    public function render()
    {
        $tasks = Task::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.task-app', ['tasks' => $tasks]);
    }
}
