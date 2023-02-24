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
                            <div class="col-md-12 mb-3">
                                <label for="">Task</label>
                                <div id="tasks" class="">
                                    <input type="text" name="tasks[]" class="tasks col-md-12" placeholder="">
                                </div>
                                <div class="controls">
                                    <a href="#" id="add_more_tasks"><i class="btn btn-primary mt-1">Add Task</i></a>
                                    <a href="#" id="remove_tasks"><i class="btn btn-danger mt-1">Remove Task</i></a>
                                </div>

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

    <script>
        var tasks = document.getElementById('tasks');
        var add_more_tasks = document.getElementById('add_more_tasks');
        var remove_tasks = document.getElementById('remove_tasks');

        add_more_tasks.onclick = function() {
            var newtask = document.createElement('input');
            newtask.setAttribute('type', 'text');
            newtask.setAttribute('name', 'tasks[]');
            newtask.setAttribute('class', 'col-md-12');
            tasks.appendChild(newtask);
        }

        remove_tasks.onclick = function() {
            var input_tags = tasks.getElementsByTagName('input');
            if (input_tags.length >= 2) {
                tasks.removeChild(input_tags[(input_tags.length) - 1]);
            }
        }
    </script>

</x-app-layout>