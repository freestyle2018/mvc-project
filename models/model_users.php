<?php

// модель
Class Model_Users{

    protected $db;

    public function __construct() {
        $this->db = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
        if(!$this->db) {
            exit("Ошибка соединения с базой данных".mysqli_error());
        }
        if(!mysqli_select_db($this->db, DB_NAME)) {
            exit("Нет такой базы данных".mysqli_error());
        }
        mysqli_query($this->db, "SET NAMES 'UTF8'");

    }

    public function get_Users(){
        $query = "SELECT zadacha_id, zadacha_user, zadacha_email, zadacha_text FROM zadacha";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

        for($i = 0;$i < mysqli_num_rows($result); $i++) {
            $row[] = mysqli_fetch_array($result);
        }

        return $row;
    }

    public function delete_Users($id_user){
        $query = "DELETE FROM zadacha WHERE zadacha_id = ".$id_user;

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

    }

    public function add_Users($user, $email, $text){
        $query = "INSERT INTO `zadacha` (`zadacha_id`, `zadacha_user`, `zadacha_email`, `zadacha_text`) VALUES (NULL, '".$user."', '".$email."', '".$text."')";

        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit(mysqli_error($this->db));
        }
        else{
            return true;
        }

    }

}
