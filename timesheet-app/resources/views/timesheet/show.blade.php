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
                                <label for="">Title</label>
                                <input type="text" id="disabledTextInput" name="title" class="tasks col-md-12 form-control" placeholder="" value="{{$timesheet->title}}">


                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Task</label>

                                @foreach ($tasks as $task)
                                <div id="tasks" class="">
                                    <input type="text" name="tasks[]" class="tasks col-md-12" placeholder="" value="{{$task->content}}">


                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Diff Work</label>
                                <input type="text" name="diff_work" value="{{$timesheet->diff_work}}" class="form-control">
                                @error('diff_work') <small class="text-danger">{{$message}}</small> @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Plan Work</label>
                                <input type="text" name="plan_work" value="{{$timesheet->plan_work}}" class="form-control">
                                @error('plan_work') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                        </fieldset>


                        <div class="col-md-12 mb-3">
                            <a href="{{url('/timesheet')}}" class="btn btn-info">Back</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>