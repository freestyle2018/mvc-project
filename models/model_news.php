<?php

// модель
Class Model_News{

    const SHOW_BY_DEFAULT = 3;

    public static function getNewsLimit($page, $sort){
        $limit = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Model_Db::getConnection();

        if($sort == ""){
            $sql = 'SELECT * FROM zadacha ORDER BY zadacha_id DESC LIMIT :limit OFFSET :offset ';
        }
        else{
            $sql = 'SELECT * FROM zadacha ORDER BY ' . $sort . ' LIMIT :limit OFFSET :offset ';
        }

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        $news = array();
        while ($row = $result->fetch()) {
            $news[$i]['zadacha_id'] = $row['zadacha_id'];
            $news[$i]['zadacha_user'] = $row['zadacha_user'];
            $news[$i]['zadacha_email'] = $row['zadacha_email'];
            $news[$i]['zadacha_text'] = $row['zadacha_text'];
            $i++;
        }
        return $news;
    }


    public static function getCountNews()
    {
        $db = Model_Db::getConnection();
        $sql = 'SELECT count(zadacha_id) AS count FROM zadacha';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }


}