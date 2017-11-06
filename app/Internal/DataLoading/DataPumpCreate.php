<?php

namespace App\Internal\DataLoading;


class DataPumpCreate extends DataPumpBase
{
    public function run()
    {
        try {
            $teachers = $this->getApiTeachers();

            foreach ($teachers->getTeachers() as $index => $item) {
                $teacher = $teachers->getTeacher($index);

                try {
                    $teacherDetails = $this->getApiTeacherDetails($teacher->getId());

                    if ($teacherDetails->getActivities() !== null) {
                        dump($teacher->getId());
                    }
                } catch (\Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                }

            }
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}
