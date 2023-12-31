@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="form-container">
            <div class="heading">
                <p>My Tasks</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                    <path d="M2.08334 13H24.5833" stroke="#65676D" stroke-width="2.25" stroke-linecap="round"/>
                    <path d="M13.3333 1.75L13.3333 24.25" stroke="#65676D" stroke-width="2.25" stroke-linecap="round"/>
                </svg>
            </div>
            <div id="task-list">
            @foreach ($task as $index => $item)
                <div class="task">
                    <h4 id="tasks-title"><span id="task-number">{{ sprintf('%02d', $index + 1) }}</span>{{ $item->taskname }}
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="37" height="36" viewBox="0 0 37 36" fill="none">
                            <circle cx="18.3333" cy="18" r="13.5" stroke="#65676D" stroke-width="2.25"/>
                            <path d="M11.5833 16.5L17.2083 22.125L25.8333 13.5" stroke="#65676D" stroke-width="2.25"/>
                        </svg>
                    </h4>
                </div>
            @endforeach
            </div>
        </div>

        <div class="create-box">
            <svg class="close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 9L9 15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 9L15 15" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div class="heading">
                <p>Edit Task</p>
            </div>
            <form action="{{ url('tasks/update-task/'.$tasks->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" id="fname" value="{{ $tasks->taskname }}" name="taskname" placeholder="Task Name..">
                <textarea id="subject" name="description" placeholder="Description" style="height:200px">{{ $tasks->description }}</textarea>
                <input type="text" id="fname" value="{{ $tasks->category }}" name="category" placeholder="Category">
                <div class="row">
                    <input type="submit" value="Edit Task">
                </div>
            </form>
        </div>
    </div>
</div> 
@endsection
