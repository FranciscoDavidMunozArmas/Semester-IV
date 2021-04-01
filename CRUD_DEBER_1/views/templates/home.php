<div class="container">
    <form id="form" method="post">
        <div class="form_container">
            <div>
                <input type="text" id="name" placeholder="Name" name="name">
            </div>
            <div>
                <input type="text" id="surname" placeholder="Surname" name="surname">
            </div>
            <div class="id_container">
                <input type="text" id="ID" placeholder="ID" name="user_id">
                <br>
                <label for="check_id" id="check_label"></label>
            </div>
            <div class="btn_form">
                <input type="submit" id="btn_check_id" name="create" value="Save">
                <?php
                $delete = new Form_Controller();
                $delete->create();
                ?>
            </div>
        </div>
    </form>
</div>

<?php
include './views/templates/tables.php';
?>

<!-- <script type="javascript" src="./static/js/id_checker.js"></script> -->