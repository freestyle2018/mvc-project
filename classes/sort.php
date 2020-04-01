<?php

// класс для сортировки списка
Class Sort
{

    function get($value) {
        $sort = $value;

        $sort_value = "";
        $sort_top = "";
        $sortirovka = "";

        if($sort != ""){
            if(preg_match('/-/', $sort)){
                $sort_value = substr($sort, 1);
                $sort_top = substr($sort, 0, 1);
            }
            else {
                $sort_value = substr($sort, 0);
                $sort_top = "";
            }

            switch ($sort_value) {
                case "id":
                    $sortirovka = "zadacha_id";
                    break;
                case "user":
                    $sortirovka = "zadacha_user";
                    break;
                case "email":
                    $sortirovka = "zadacha_email";
                    break;
                case "text":
                    $sortirovka = "zadacha_text";
                    break;
            }

            switch ($sort_top) {
                case "-":
                    $sortirovka .= " DESC";
                    break;
                case "":
                    $sortirovka .= " ASC";
                    break;
            }
        }

        $sort_array = array($sort_value, $sort_top, $sortirovka);

        return $sort_array;

    }


}

