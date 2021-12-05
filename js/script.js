window.onload = () => {

    initSubmitForm();

    initShowTasks();

};

function initSubmitForm() {

    document.getElementById('set-task').addEventListener('click', (e) => {

        e.preventDefault();

        if (document.getElementById('task').value == '') return;

        submitForm();

    });

}

function submitForm() {

    let form = document.getElementById('todo-form');
    let formData = new URLSearchParams(new FormData(form)).toString();

    postAjax(
        'ajax/controller.php?action=saveTask',

        formData,

        (reply) => {

            console.log(reply);

            alert('Thanks. Data has been sent.');

        },

        (error) => {

            console.log(error);

            alert('Oh oh, there is some problem. Try again later.');

        },

        false
    );

}

function initShowTasks() {

    document.getElementById('show-tasks').addEventListener('click', (e) => {

        e.preventDefault();

        showTasks();

    });

}

function showTasks() {

    document.getElementById('tasks').classList.remove('d-none');

    document.getElementById('tasks').classList.add('d-block');

    postAjax(
        'ajax/controller.php?action=showTasks',

        '',

        (reply) => {

            document.getElementById('tasks').innerHTML = reply;

            initDeleteTask();

        },

        (error) => {

            console.log(error);

            alert('Oh oh, there is some problem. Try again later.');

        },

        false
    );

}

function initDeleteTask() {

    let buttons = document.getElementsByClassName('delete-task');
    if (buttons.length == 0) return;

    for (let button of buttons) {

        button.addEventListener('click', (e) => {

            e.preventDefault();

            deleteTask(e.target);

        });

    }

}

function deleteTask(element) {

    postAjax(
        'ajax/controller.php?action=deleteTask',

        `task_id=${element.value}`,

        (reply) => {

            console.log(reply);

            alert('Thanks. Data has been sent.');

            location.reload();

        },

        (error) => {

            console.log(error);

            alert('Oh oh, there is some problem. Try again later.');

        },

        false
    );

}

function postAjax(url, data = '', success = null, fail = null, async = true) {

    let params = typeof data == 'string' ? data : Object.keys(data).map(

		function (k) {

            return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])

        }

    ).join('&');

    let xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

    xhr.open('POST', url, async);
    xhr.onreadystatechange = function () {

        if (this.status == 200) {
            if (typeof success !== 'function') return;
            success(xhr.responseText);
        }
        else {
            if (typeof fail !== 'function') return;
            fail();
        }

    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);

    return xhr;

}