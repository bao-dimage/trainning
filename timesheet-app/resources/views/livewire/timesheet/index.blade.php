<a href="/timesheet/create" class="btn btn-primary ms-5 me-5 mt-5">Create Timesheet</a>
<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Timesheet Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyTimesheet">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
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
                    <th scope="col">Title</th>
                    <th scope="col">Diffcult Work</th>
                    <th scope="col">Planwork</th>
                    <th scope="col">Created At</th>
                    <!-- <th scope="col">Updated At</th> -->
                    <!-- <th scope="col">Tasks</th> -->
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>


                @foreach($timesheets as $key => $timesheet)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{$timesheet->title}}</td>
                    <td>{{$timesheet->diff_work}}</td>
                    <td>{{$timesheet->plan_work}}</td>
                    <td>{{$timesheet->created_at}}</td>
                    
                    <td>
                        <a href="{{url('/timesheet/detail/'.$timesheet->timesheet_id)}}" class="btn btn-info">Detail</a>

                        <a href="{{url('/timesheet/edit/'.$timesheet->timesheet_id)}}" class="btn btn-secondary">Edit</a>
                        <a wire:click="deleteTimesheet({{$timesheet->timesheet_id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>





</div>