@extends('layouts.app')

@section('content')
    <div>
        <livewire:task-app>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#TaskModal').modal('hide');
            $('#updateTaskModal').modal('hide');
            $('#deleteTaskModal').modal('hide');
        })
    </script>
@endsection
