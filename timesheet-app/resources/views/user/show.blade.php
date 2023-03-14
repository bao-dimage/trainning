<x-app-layout>
    <div class="py-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                </div>
                <div class="card-body">

                    @csrf
                    <div class="row">

                        <fieldset disabled>
                            <div class="col-md-12 mb-3">
                                <label for="">Name</label>
                                <input type="text" id="disabledTextInput" name="title" class="col-md-12 form-control"
                                    placeholder="" value="{{$user->name}}">


                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="diff_work" value="{{$user->email}}" class="form-control">

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Role</label>
                                <!-- <input type="text" name="plan_work" value="{{$user->manage->name}}" class="form-control"> -->
                                </br>
                                <select name="role" id="role" disabled>
                                    <option {{$user->role === 1 ? "selected" : ""}} value="1">Admin</option>
                                    <option {{$user->role === 2 ? "selected" : ""}} value="2">Manager</option>
                                    <option {{$user->role === 0 ? "selected" : ""}} value="0">Employee</option>
                                </select>


                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Manager</label>
                                <input type="text" name="plan_work" value="{{$user->manage->name}}"
                                    class="form-control">


                            </div>
                        </fieldset>


                        <div class="col-md-12 mb-3">
                            <a href="{{url('/manage-user')}}" class="btn btn-info">Back</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>