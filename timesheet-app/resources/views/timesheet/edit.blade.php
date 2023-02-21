<x-app-layout>
    <div class="py-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
            </div>
            <div class="card-body">
                <form action="{{ route('timesheet.update',$timesheet->timesheet_id) }}" method="POST" enctype="multipart/form
                ">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$timesheet->title}}" class="form-control">
                            @error('title') <small class="text-danger">{{$message}}</small> @enderror
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