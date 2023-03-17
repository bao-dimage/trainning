<x-app-layout>
    <div class="py-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                </div>
                <div class="card-body">
                    <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form
                ">
                        @csrf
                        @method('patch')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                <!-- @error('title') <small class="text-danger">{{$message}}</small> @enderror -->
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control">
                                <!-- @error('diff_work') <small class="text-danger">{{$message}}</small> @enderror -->

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Role</label>
                                </br>
                                <select name="role" id="role">
                                    <option value="1" {{$user->role === 1 ? "selected" : ""}}  >Admin</option>
                                    <option value="2" {{$user->role === 2 ? "selected" : ""}}  >Manager</option>
                                    <option value="0" {{$user->role === 0 ? "selected" : ""}}  >Employee</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Manager</label>
                                <br />
                                <!-- <input type="text" name="manage" value="{{$user->manage->name}}"
                                    class="form-control"> -->

                                <select name="manage" id="manage_name">
                                    @foreach ($users as $user_manage)
                                        <option value="{{$user_manage->id}}">{{$user_manage->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>