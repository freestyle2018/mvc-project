
<?php if(isset($text)){echo $text;} ?>

<?php if($authentication === true){ ?>
    <?php foreach($Users as $row) :?>
        <div class='quick-links'>
            » <?php echo $row['zadacha_user']?> -
            <?php echo $row['zadacha_email']?> -
            <?php echo $row['zadacha_text']?>
            <?php
                if($status == "admin") {
                    echo "<a href='/user/delete/?user_id=".$row['zadacha_id']."'>Delete</a>";
                }
            ?>
        </div>
    <?php endforeach;?>
<?php } ?>

<?php
    echo "<a href='/user/add/'>Add</a>";
?>