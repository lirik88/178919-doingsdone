<?php

require_once('functions.php');

// массив проектов
$projects_array = ['Все', 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];


//ассоциативный массив с задачами
$tasks_array = [['task-item' => 'Собеседование в IT компании',     'task-date' => '01.06.2018', 'category' => 'Работа',        'complete' => 'no'],
                ['task-item' => 'Выполнить тестовое задание',      'task-date' => '25.05.2018', 'category' => 'Работа',        'complete' => 'no'],
                ['task-item' => 'Сделать задание первого раздела', 'task-date' => '21.04.2018', 'category' => 'Учеба',         'complete' => 'yes'],
                ['task-item' => 'Встреча с другом',                'task-date' => '22.04.2018', 'category' => 'Входящие',      'complete' => 'no'],
                ['task-item' => 'Купить корм для кота',            'task-date' => 'Нет',        'category' => 'Домашние дела', 'complete' => 'no'],
                ['task-item' => 'Заказать пиццу',                  'task-date' => 'Нет',        'category' => 'Домашние дела', 'complete' => 'no']];

// функция для подсчета количества задач в проекте
function countOfTasks(array $tasks_list, string $name_project)
{
    $result = 0;
    if ($name_project == 'Все') {
        $result = count($tasks_list);
    } else {
        foreach ($tasks_list as $key => $value) {
            if ($value['category'] == $name_project) {
                $result++;
            }
        }
    }
    return $result;
}



 function getTasks(string $cat, array $projects_array)
{
    if (isset($_GET['project'])) {
        $name_cat = $projects_array[$_GET['project']];
        if ($name_cat === $cat) {
            return true;
        } 
    }
    else if (!isset($_GET['project'])) {
        return true;
    }
    return false;
}


$main_content = renderTemplate('templates/index.php', ['projects_array' => $projects_array, 
                                                       'tasks_array' => $tasks_array]);

$page = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке!',
                                                'projects_array' => $projects_array, 
                                                'tasks_array' => $tasks_array, 
                                                'main_content' => $main_content]);

print($page);

?>