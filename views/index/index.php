


<table>
    <tr>
        <?php

            if($page != ""){
                $page_str = "&page=".$page;
            }

            $razdelu = array(
                'id'    => 'ID',
                'user'  => 'Автор',
                'email' => 'E-mail',
                'text'  => 'Заголовок',
            );

            foreach ($razdelu as $key => $value):
                echo "<td>";
                echo $value."<br>\r\n";
                if($key == $sortirovka[0] && $sortirovka[1] == ""){
                    echo "<b><a href='?sort=".$key."$page_str'>(по возраст.)</a></b><br><a href='?sort=-".$key."$page_str'>(по убыв.)</a>";
                }
                elseif($key == $sortirovka[0] && $sortirovka[1] == "-"){
                    echo "<a href='?sort=".$key."$page_str'>(по возраст.)</a><br><b><a href='?sort=-".$key."$page_str'>(по убыв.)</a></b>";
                }
                else{
                    echo "<a href='?sort=".$key."$page_str'>(по возраст.)</a><br><a href='?sort=-".$key."$page_str'>(по убыв.)</a>";
                }
                echo "</td>";
            endforeach;

        ?>


    </tr>
    <?php foreach ($NewsList as $news): ?>
        <tr>
            <td><?php echo $news['zadacha_id']; ?></td>
            <td><?php echo $news['zadacha_user'];?></td>
            <td><?php echo $news['zadacha_email'];?></td>
            <td><?php echo $news['zadacha_text'];?></td>
        </tr>
    <?php endforeach; ?>



</table>

<style>
    .pagination li {
        list-style-type: none;
        float: left;
        margin-right: 3px;
    }
</style>
<div class="pagination" style="margin-left:20%;"><?php echo $pagination; ?></div>