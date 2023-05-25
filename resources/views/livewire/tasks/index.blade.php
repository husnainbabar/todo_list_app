@extends('layouts.app')

@section('content')
    <div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>All Tasks</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Task Name:</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="0">Pending</option>
                                            <option value="1">Complete</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Task</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $task->id }}</td>
                                                <td>{{ $task->name }}</td>
                                                <td>
                                                    @if ($task->status == 0)
                                                        <button class="btn btn-warning">Pending</button>
                                                    @elseif ($task->status == 1)
                                                        <button class="btn btn-success">Complete</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
