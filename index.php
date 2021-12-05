<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do list</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../css/core.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body class="text-center">
    <header>
        <h1>To-do app</h1>
        <h4>Organize your tasks</h4>
    </header>

    <form class="bg-light-gray border-radius-medium" id="todo-form">
        <label>Task</label>
        <input type="text" name="task" id="task" required>

        <label>Description</label>
        <textarea name="description" id="description"></textarea>

        <label>Priority</label>
        <input type="number" name="priority" id="priority" max="3" min="1" value="2">

        <label>Deadline date</label>
        <input type="date" name="date_deadline" id="date_deadline">

        <button id="set-task" class="button bg-green white">Set task</button>
    </form>

    <hr>

    <div class="mt-30">
        <button id="show-tasks" class="button bg-gold">Show tasks</button>

        <div id="tasks" class="d-none"></div>
    </div>

    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>