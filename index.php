<?php

require_once('functions.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

$days = rand(-3, 3);
$task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
$current_ts = strtotime('now midnight'); // текущая метка времени

// запишите сюда дату выполнения задачи в формате дд.мм.гггг
$date_deadline = date("d.m.Y", $task_deadline_ts);

// в эту переменную запишите кол-во дней до даты задачи
$days_until_deadline = floor(($task_deadline_ts - $current_ts ) / 86400);

// переменная содержащая класс, помечающий просроченное задание
$task_important_class = ($days_until_deadline <= 0 ? ' task--important' : '');

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

$main_content = renderTemplate('templates/index.php', ['tasks_array' => $tasks_array]);

$page = renderTemplate('templates/layout.php', ['title' => 'Дела в порядке!', 
                                                'projects_array' => $projects_array, 
                                                'tasks_array' => $tasks_array, 
                                                'main_content' => $main_content]);

print($page);

?>