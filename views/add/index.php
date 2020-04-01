Add<br/>

<?php foreach($Zadachi as $row) :?>
    <div class='quick-links'>
        » <a href='?option=category&id_cat=<?php echo $row['zadacha_id']?>'><?php echo $row['zadacha_text']?></a>
    </div>
<?php endforeach;?>

