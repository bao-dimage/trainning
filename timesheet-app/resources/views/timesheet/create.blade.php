<x-app-layout>
    <div class="py-12">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
            </div>
            <div class="card-body">
                <form action="{{url('timesheet')}}" method="POST" enctype="multipart/form
                ">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Diff Work</label>
                            <input type="text" name="diff_work" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Plan Work</label>
                            <input type="text" name="plan_work" class="form-control">
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