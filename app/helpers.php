<?php

if (!function_exists('getDateCustom')) {
    function getDateCustom($date){
        $month = array(
            '01' => 'Янв',
            '02' => 'Февр',
            '03' => 'Март',
            '04' => 'Фпр',
            '05' => 'Май',
            '06' => 'Июнь',
            '07' => 'Июль',
            '08' => 'Авг',
            '09' => 'Сент',
            '10' => 'Окт',
            '11' => 'Нояб',
            '12' => 'Дек',
        );
        return date("d", strtotime($date)) . ' ' . $month[(date("m", strtotime($date)))];
    }
}
