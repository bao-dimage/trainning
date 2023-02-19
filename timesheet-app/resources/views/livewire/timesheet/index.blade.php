
<a href="/timesheet/create" class="btn btn-primary ms-5 me-5 mt-5">Create Timesheet</a>
<div class="ms-5 me-5 mt-5  ">
    @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif


    <table class="table table-warning table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Diffcult Work</th>
                <th scope="col">Planwork</th>
                <th scope="col">Created At</th>
                <!-- <th scope="col">Updated At</th> -->
                <th scope="col">Tasks</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>

            @foreach($timesheets as $timesheet)
            <tr>
                <td>{{$timesheet->title}}</td>
                <td>{{$timesheet->diff_work}}</td>
                <td>{{$timesheet->plan_work}}</td>
                <td>{{$timesheet->created_at}}</td>
                <td>
                    <a href="" class="btn btn-primary">View</a>
                </td>
                <td>
                    <a href="{{url('/timesheet/edit/'.$timesheet->timesheet_id)}}" class="btn btn-secondary">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>