@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="profile-box">
            <div class="heading">
                <h1>My Profile</h1>
            </div>
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{ url('tasks/update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}   
                <label for="name">Name:</label>
                <input type="text" value="{{ $user->name }}" name="name" required>

                <label for="email">Email:</label>
                <input type="email" value="{{ $user->email }}" name="email" required>

                <label for="contact_number">Contact Number:</label>
                <input type="tel" value="{{ $user->contact_number }}" name="contact_number" required>

                <label for="address">Address:</label>
                <input type="text" value="{{ $user->address_line_1 }}" name="address_line_1" placeholder="Address Line 1" required>
                <input type="text" value="{{ $user->address_line_2}}" name="address_line_2" placeholder="Address Line 2">
                <input type="text" value="{{ $user->pin_code }}" name="pin_code" placeholder="PIN Code" required>

                <label for="state">State:</label>
                <select class="form-control" id="type" name="state">
                    @if($user->state)
                    <option value="{{$user->state}}" selected>{{$user->state}}</option>
                    @else
                    <option value="">Select State</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Goa">Goa</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Madhyapradesh">Madhyapradesh</option>
                    <option value="Bihar">Bihar</option>
                    @endif
                </select>
                <input class="mt-2" type="submit" value="Save Profile">
            </form>
        </div> 
    </div> 
</div> 
@endsection
