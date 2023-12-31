@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="form-container">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="heading">
                <p>My Tasks</p>
                <a href="{{url('tasks/create-task')}}">
                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <path d="M2.08334 13H24.5833" stroke="#65676D" stroke-width="2.25" stroke-linecap="round"/>
                        <path d="M13.3333 1.75L13.3333 24.25" stroke="#65676D" stroke-width="2.25" stroke-linecap="round"/>
                    </svg>
                </a>
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
    </div>
    
@endsection
