<?php

class Todo
{
    private $object_factory;

    public function __construct(ObjectFactory $object_factory)
    {
        $this->object_factory = $object_factory;
    }

    public function getTasks()
    {
        $query = "
            SELECT *
            FROM `task`
            WHERE `removed` = 0
            ORDER BY `date_deadline` DESC
        ";

        $mysql = $this->object_factory->getObject(
            'Mysql',
            HOSTNAME, USERNAME, PASSWORD, DB
        );

        return $mysql->query($query)->fetchAll();
    }

    public function saveTask(array $data)
    {
        $task = $this->object_factory->getObject('O_Task');
        $task->setData($data);
        $task->save();
    }

    public function deleteTask($task_id)
    {
        if (is_array($task_id) and key_exists('task_id', $task_id)) {

            $task_id = $task_id['task_id'];

        }

        $task = $this->object_factory->getObject('O_Task', $task_id);
        $task->set(1, 'removed');
        $task->save();
    }
}