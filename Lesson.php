<?php

require_once __DIR__."/vendor/autoload.php";

use MongoDB\Client;

class Lesson
{
    private \MongoDB\Collection $db;

    public function __construct()
    {
        $db = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->db = $db->lessons->lesson;
    }

    public function groups(): void
    {
        $statement = $this->db->distinct("group");
        foreach ($statement as $data) {
            echo "<option value='$data'>$data</option>";
        }
    }

    public function teachers(): void
    {
        $statement = $this->db->distinct("teacher");
        foreach ($statement as $data) {
            echo "<option value='$data'>$data</option>";
        }
    }

    public function disciple(): void
    {
        $statement = $this->db->distinct("disciple");
        foreach ($statement as $data) {
            echo "<option value='$data'>$data</option>";
        }
    }

    public function auditoriums(): void
    {
        $statement = $this->db->distinct("auditorium");
        echo "<div id='save'>Аудитории: ";
        foreach ($statement as $data) {
            echo "$data; ";
        }
        echo "</div>";
    }

    public function labs($group): void
    {
        $statement = $this->db->find(['$and' => [['group'=>$group], ['type'=>'Laboratory']]]);
        echo "<div id='save'>Лабораторные:<br>";
        foreach ($statement as $data) {
            echo "День Недели - {$data['week_day']} *=* Пара - {$data['lesson_number']} *=* Аудитория - {$data['auditorium']} *=* Дисциплина - {$data['disciple']} *=* Группа - {$data['group']}<br>";
        }
        echo "</div>";
    }

    public function lectures($teacher, $disciple): void
    {
        $statement = $this->db->find(['$and' => [['teacher'=>$teacher],['disciple'=>$disciple], ['type'=>'Lecture']]]);
        echo "<div id='save'>Лекции:<br>";
        foreach ($statement as $data) {
            echo "День Недели - {$data['week_day']} *=* Пара - {$data['lesson_number']} *=* Аудитория - {$data['auditorium']} *=* Дисциплина - {$data['disciple']} *=* Группа - {$data['group']}<br>";
        }
        echo "</div>";
    }
}