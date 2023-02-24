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