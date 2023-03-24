<x-app-layout>
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

                <!-- {{dd($timesheets)}} -->
                @foreach($timesheets as $key => $timesheet)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{$timesheet->title}}</td>
                    <td>{{$timesheet->diff_work}}</td>
                    <td>{{$timesheet->plan_work}}</td>
                    <td>{{$timesheet->created_at}}</td>

                    <td>
                        <a href="{{url('/timesheet/detail/'.$timesheet->timesheet_id)}}" class="btn btn-info">Detail</a>

                        <a href="{{url('/timesheet/edit/'.$timesheet->timesheet_id)}}"
                            class="btn btn-secondary">Edit</a>
                        <a wire:click="deleteTimesheet({{$timesheet->timesheet_id}})" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" class="btn btn-danger close-modal">Delete</a>
                    </td>
                </tr>
                @endforeach

                <!-- {{$timesheets[0]->title}} -->
            </tbody>
        </table>

    </div>
</x-app-layout>