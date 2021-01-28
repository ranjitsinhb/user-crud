
    @include('user::layout/header')

    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('user') }}">Users</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('user/create') }}">Create a user</a>
            </ul>
        </nav>
        <h1>All the users</h1>
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- show the user (uses the show method found at GET /users/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $user->id) }}">Show</a>
                        <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $user->id . '/edit') }}">Edit</a>
                        <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                        <a class="btn btn-small btn-danger delete_user" id="{{$user->id}}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"> There is no record available. </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <script>    
        $(document).ready(function () {
            $('.delete_user').click(function (e) {
                if (confirm('Are you sure?')) {
                    var delId = $(this).attr('id');
                    var delurl = "/user/"+delId;
                    $.ajax({
                        url: delurl,
                        type: 'DELETE',
                        data: {
                            id: delId,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (res) {
                            if(res && res.success) {
                                location.href = 'user';
                            } else {
                                return false;
                            }
                            // dataTable.ajax.reload();                      
                        },  
                        error: function(xhr) {
                            // notification('error', res.message);
                        }
                    });
                }

                return false;
            });
        });
    </script>

    @include('user::layout/footer')
