<?php

namespace App\CommonTables;

use Illuminate\Support\Collection;

class AssessmentLevel {

    const NAME = 'Оценка и уровень общего физического состояния (ФР+ФС+ФП) по сумме баллов в зависимости от количества выполненных тестов';

    const LEVELS = [ 'Низкий', 'Ниже среднего', 'Средний', 'Выше среднего', 'Высокий' ];

    const ASSESSMENTS_LEVELS = [
        2 => [
            1 => [ 2, 2 ],
            2 => [ 3, 4 ],
            3 => [ 5, 6 ],
            4 => [ 7, 8 ],
            5 => [ 9, 10 ],
            6 => [ 11, 12 ],
            7 => [ 13, 14 ],
            8 => [ 15, 16 ],
            9 => [ 17, 18 ],
            10 => [ 19, 20 ]
        ],
        3 => [
            1 => [ 3, 5 ],
            2 => [ 6, 8 ],
            3 => [ 9, 11 ],
            4 => [ 12, 14 ],
            5 => [ 15, 17 ],
            6 => [ 18, 20 ],
            7 => [ 21, 23 ],
            8 => [ 24, 26 ],
            9 => [ 27, 28 ],
            10 => [ 29, 30 ]
        ],
        4 => [
            1 => [ 4, 7 ],
            2 => [ 8, 11 ],
            3 => [ 12, 15 ],
            4 => [ 16, 19 ],
            5 => [ 20, 23 ],
            6 => [ 24, 27 ],
            7 => [ 28, 31 ],
            8 => [ 32, 36 ],
            9 => [ 37, 38 ],
            10 => [ 39, 40 ]
        ],
        5 => [
            1 => [ 5, 9 ],
            2 => [ 10, 14 ],
            3 => [ 15, 19 ],
            4 => [ 20, 24 ],
            5 => [ 25, 29 ],
            6 => [ 30, 34 ],
            7 => [ 35, 39 ],
            8 => [ 40, 44 ],
            9 => [ 45, 47 ],
            10 => [ 48, 50 ]
        ],
        6 => [
            1 => [ 6, 11 ],
            2 => [ 12, 17 ],
            3 => [ 18, 23 ],
            4 => [ 24, 29 ],
            5 => [ 30, 35 ],
            6 => [ 36, 41 ],
            7 => [ 42, 47 ],
            8 => [ 48, 53 ],
            9 => [ 54, 57 ],
            10 => [ 58, 60 ]
        ],
        7 => [
            1 => [ 7, 13 ],
            2 => [ 14, 20 ],
            3 => [ 21, 27 ],
            4 => [ 28, 34 ],
            5 => [ 35, 41 ],
            6 => [ 42, 48 ],
            7 => [ 49, 55 ],
            8 => [ 56, 62 ],
            9 => [ 63, 66 ],
            10 => [ 67, 70 ]
        ],
        8 => [
            1 => [ 8, 15 ],
            2 => [ 16, 23 ],
            3 => [ 24, 31 ],
            4 => [ 32, 39 ],
            5 => [ 40, 47 ],
            6 => [ 48, 55 ],
            7 => [ 56, 63 ],
            8 => [ 64, 71 ],
            9 => [ 72, 76 ],
            10 => [ 77, 80 ]
        ],
        9 => [
            1 => [ 9, 17 ],
            2 => [ 18, 26 ],
            3 => [ 27, 35 ],
            4 => [ 36, 44 ],
            5 => [ 45, 53 ],
            6 => [ 54, 62 ],
            7 => [ 63, 71 ],
            8 => [ 72, 80 ],
            9 => [ 81, 85 ],
            10 => [ 86, 90 ]
        ],
        10 => [
            1 => [ 10, 19 ],
            2 => [ 20, 29 ],
            3 => [ 30, 39 ],
            4 => [ 40, 49 ],
            5 => [ 50, 59 ],
            6 => [ 60, 69 ],
            7 => [ 70, 79 ],
            8 => [ 80, 89 ],
            9 => [ 90, 95 ],
            10 => [ 96, 100 ]
        ],
        11 => [
            1 => [ 11, 21 ],
            2 => [ 22, 32 ],
            3 => [ 33, 43 ],
            4 => [ 44, 54 ],
            5 => [ 55, 65 ],
            6 => [ 66, 74 ],
            7 => [ 75, 87 ],
            8 => [ 88, 98 ],
            9 => [ 99, 104 ],
            10 => [ 105, 110 ]
        ],
        12 => [
            1 => [ 12, 23 ],
            2 => [ 24, 35 ],
            3 => [ 36, 47 ],
            4 => [ 48, 59 ],
            5 => [ 60, 71 ],
            6 => [ 72, 83 ],
            7 => [ 84, 95 ],
            8 => [ 96, 107 ],
            9 => [ 108, 114 ],
            10 => [ 115, 120 ]
        ],
        13 => [
            1 => [ 13, 25 ],
            2 => [ 26, 38 ],
            3 => [ 39, 51 ],
            4 => [ 52, 64 ],
            5 => [ 65, 77 ],
            6 => [ 78, 90 ],
            7 => [ 91, 103 ],
            8 => [ 104, 116 ],
            9 => [ 117, 124 ],
            10 => [ 125, 130 ]
        ],
        14 => [
            1 => [ 14, 27 ],
            2 => [ 28, 41 ],
            3 => [ 42, 55 ],
            4 => [ 56, 69 ],
            5 => [ 70, 83 ],
            6 => [ 84, 97 ],
            7 => [ 98, 111 ],
            8 => [ 112, 125 ],
            9 => [ 126, 133 ],
            10 => [ 134, 140 ]
        ],
        15 => [
            1 => [ 15, 29 ],
            2 => [ 30, 34 ],
            3 => [ 35, 59 ],
            4 => [ 60, 74 ],
            5 => [ 75, 89 ],
            6 => [ 90, 104 ],
            7 => [ 105, 119 ],
            8 => [ 120, 134 ],
            9 => [ 135, 143 ],
            10 => [ 144, 150 ]
        ]
    ];

    public static function getAssessmentLevelPoint ($amount_tests = 2, $sum_scores = 0) {

        if ($amount_tests < 2) $amount_tests = 2;

        $amountTestsValues = AssessmentLevel::ASSESSMENTS_LEVELS[$amount_tests];

        $point = 0;

        $level = '';

        foreach ($amountTestsValues as $key=>$item) {

            if ( is_array($item) && $sum_scores >= $item[0] && $sum_scores <= $item[1] ) {
                $point = $key;
                $flag = true;
                break;
            }

            if ( !is_array($item) && $sum_scores == $item ) {
                $point = $key;
                $flag = true;
                break;
            }

        }

        if ($amount_tests == 3 && $sum_scores < $amountTestsValues[1][0]) $point = 1;
        if ($amount_tests == 3 && $sum_scores > $amountTestsValues[10][1]) $point = 10;

        if ( $point == 1 || $point == 2 ) $level = AssessmentLevel::LEVELS[0];
        elseif ( $point == 3 || $point == 4 ) $level = AssessmentLevel::LEVELS[1];
        elseif ( $point == 5 || $point == 6 ) $level = AssessmentLevel::LEVELS[2];
        elseif ( $point == 7 || $point == 8 ) $level = AssessmentLevel::LEVELS[3];
        elseif ( $point == 9 || $point == 10 ) $level = AssessmentLevel::LEVELS[4];

        return [ 'level' => $level, 'assessment' => $point ];

    }
}
