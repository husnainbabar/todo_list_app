<div>
    @include('livewire.taskmodal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Task Application

                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#TaskModal">
                                Add New Task
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->description }}</td>


                                        <td>
                                            @if ($task->status == 0)
                                                <button type="button"
                                                    wire:click="changeStatusToCompleted({{ $task->id }})"
                                                    wire:mouseover="showTooltip" wire:mouseout="hideTooltip"
                                                    class="btn btn-warning"
                                                    title="Change status to Completed">Pending</button>
                                            @elseif ($task->status == 1)
                                                <button type="button"
                                                    wire:click="changeStatusToPending({{ $task->id }})"
                                                    wire:mouseover="showTooltip" wire:mouseout="hideTooltip"
                                                    class="btn btn-success"
                                                    title="Change status to Pending">Complete</button>
                                            @endif

                                            @if ($showTooltip)
                                                <div class="tooltip">Change status</div>
                                            @endif
                                        </td>

                                        <td>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateTaskModal"
                                                wire:click="editTask({{ $task->id }})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteTaskModal"
                                                wire:click="deleteTask({{ $task->id }})"
                                                class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
