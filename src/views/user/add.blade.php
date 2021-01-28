@include('user::layout/header')

    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('user') }}">Users</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('user') }}">View All users</a></li>
            </ul>
        </nav>

        <h1>Create User</h1>
        <form action="{{ (isset($data) && $data->id) ? route('user.update', $data->id) : route('user.store') }}" method="POST" enctype="multipart/form-data">
            @if((isset($data) && $data->id))
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $data->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="fullname">Name:</label>
                <input type="text" name="name" class="form-control" id="fullname" placeholder="{{ __('Enter Name') }}" value="{{ isset($data)  ? $data->name : old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="{{ __('Enter Email') }}" value="{{ isset($data)  ? $data->email : old('email') }}">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd" placeholder="{{ (isset($data) && $data->id) ? '*********' : __('Enter Password') }}">
            </div>
            <div class="form-group">
                <label for="cnfpwd">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" id="cnfpwd" placeholder="{{ (isset($data) && $data->id) ? '*********' : __('Enter Confirm Password') }}">
            </div>            
            <button type="submit" class="btn btn-primary">{{ (isset($data) && $data->id) ? 'UPDATE' : 'SAVE' }}</button>
            <button type="button" class="btn btn-danger" onclick="location.href='{{ URL::to('user') }}'">CANCEL</button>
        </form>
    </div>
        
@include('user::layout/footer')
