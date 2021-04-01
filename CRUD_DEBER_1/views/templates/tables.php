<?php
$result = Form_Controller::select(null, null);
?>

<script type="text/javascript" src="./static/js/set_info.js"></script>

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="user_table">
                <?php $counter = 0 ?>
                <?php foreach ($result as $key => $value) : ?>

                    <tr>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['surname'] ?></td>
                        <td><?php echo $value['user_id'] ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" value="<?php echo $value["id"] ?>" name="delete">
                                <button type="submit" class="btn btn-danger">DELETE</button>
                                <?php
                                $delete = new Form_Controller();
                                $delete->delete();
                                ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" onclick="set_modal(<?php echo $value['id'] ?>, '<?php echo $value['name'] ?>', '<?php echo $value['surname'] ?>', '<?php echo $value['user_id'] ?>')" data-target="#edit_modal" id="btn_edit">EDIT</button>
                            </form>
                        </td>
                    </tr>
                    <?php $counter++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modal_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">EDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" method="post">
                    <div class="form_group">
                        <div>
                            <input type="hidden" id="hidden_id" value="" name="update">
                            <input type="text" id="name_update" placeholder="Name" name="name_update">
                        </div>
                        <div>
                            <input type="text" id="surname_update" placeholder="Surname" name="surname_update">
                        </div>
                        <div class="id_container">
                            <input type="text" id="user_id_update" placeholder="ID" name="user_id_update">
                            <br>
                            <label for="check_id" id="check_label"></label>
                        </div>
                        <div class="btn_form">
                            <button type="submit" class="btn btn-success">EDIT</button>
                            <?php
                            $update = new Form_Controller();
                            $update->update();
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>