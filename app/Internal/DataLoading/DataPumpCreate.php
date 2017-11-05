<?php
/**
 * Created by PhpStorm.
 * User: Erik
 * Date: 4.11.2017
 * Time: 21:17
 */

namespace App\Internal\DataLoading;


class DataPumpCreate extends DataPumpBase
{
    public function run()
    {
        $teachers = $this->getApiTeachers();

        foreach ($teachers->getTeachers() as $index => $item)
        {
            $teacher = $teachers->getTeacher($index);
            $teacherDetails = $this->getApiTeacherDetails($teacher->getId());
            dump($teacherDetails);
            break;

        }
        return;
        $b = $a->getTeachers();
        dump($a->getTeacher(500));
    }
}