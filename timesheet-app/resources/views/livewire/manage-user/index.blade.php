<div>
    <div id='calendar' class="container mt-3 "></div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyUser">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="destroyUser()"
                            class="btn  btn-danger close-modal">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                       
                        {{$user->manage->name??'Null'}}
                    </td>

                    <td>
                        <a href="{{url('/manage-user/detail/'.$user->id)}}" class="btn btn-info">Detail</a>
                        <a href="{{url('/manage-user/edit/'.$user->id)}}" class="btn btn-secondary">Edit</a>
                        <a wire:click="deleteUser({{$user->id}})" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" class="btn btn-danger close-modal">Delete</a>

                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    <livewireScripts>
        
        <script>
        window.addEventListener('hide-delete-modal', event => {
            $('#deleteModal').modal('hide');
        })
        </script>

    </livewireScripts>
</div>