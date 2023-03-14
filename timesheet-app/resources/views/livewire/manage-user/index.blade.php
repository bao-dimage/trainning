<div class="ms-5 me-5 mt-5  ">
    @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif


    <table class="table table-warning table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Manager</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>


            @foreach($users as $key => $user)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form method="post" action="/manage-user/{{$user->id}}">
                        @csrf
                        @method('patch')
                        <select name="role" id="role" disabled>
                            <option {{$user->role === 1 ? "selected" : ""}} value="1">Admin</option>
                            <option {{$user->role === 2 ? "selected" : ""}} value="2">Manager</option>
                            <option {{$user->role === 0 ? "selected" : ""}} value="0">Employee</option>
                        </select>
                        
                    </form>
                </td>

                <td>
                    {{$user->manage->name}}
                </td>

                <td>
                    <a href="{{url('/manage-user/detail/'.$user->id)}}" class="btn btn-info">Detail</a>
                    <a href="{{url('/manage-user/edit/'.$user->id)}}" class="btn btn-secondary">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>

                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

</div>