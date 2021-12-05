<?php

require_once('../config.php');
require_once('../../../init.php');

$request = new Request();

$action = $request->getGet('action');

if (empty($action)) die('no action');

$allowed_actions = [
    'showTasks',
    'saveTask',
    'deleteTask',
];

if (!in_array($action, $allowed_actions)) die('not allowed');

$request = new Request();

$data = $request->getPost();

$todo = new Todo(new ObjectFactory());

function showTasks($todo)
{
    $data = $todo->getTasks();

    $list = new ListTemplate('records', $data);

    return $list->getHtml();
}

if ($action == 'showTasks') {
    echo showTasks($todo);
    return;
}

echo call_user_func_array([$todo, $action], [$data]);
