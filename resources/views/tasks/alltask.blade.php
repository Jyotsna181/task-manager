@extends('layouts.master')
@section('content')
<div class="container-fluid px-4">

        <table id="mydataTable" class="table center table-borderd">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($task as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->taskname }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category }}</td>
                        <td>
                            <a href="{{ url('tasks/edit-task/'.$item->id) }}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('tasks/delete-task/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        </div>
    </div>
</div>
@endsection