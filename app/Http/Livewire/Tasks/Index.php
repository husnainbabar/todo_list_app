<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Task;

class Index extends Component
{
    use Actions;

    public $tasks;
    public function mount()
    {
        $this->tasks = Task::all();
    }
    public function render()
    {

        return view('livewire.tasks.index');
        // return view('livewire.tasks.index');
    }
}
