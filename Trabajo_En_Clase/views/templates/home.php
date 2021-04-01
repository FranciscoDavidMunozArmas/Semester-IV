<?php
$departments = Form_Dept::select(null);
?>

<div class="container-fluid pt-3">
    <div>
        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_list"><span class="fa fa-plus"></span> ADD</a>
    </div>
    <div class="mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Departamento</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $key => $value) : ?>
                    <tr>
                        <td>
                            <h5 style="text-transform:capitalize;"><?php echo $value['NOMBRE_DEPT'] ?></h5>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id_dept" value="<?php echo $value['ID_DEPT'] ?>">
                                <div class="btn-group" role="group">
                                    <!-- <a class="btn btn-success" href="index.php?action=update&id=">Update</a> -->
                                    <a class="btn btn-warning" href="index.php?action=update&id=<?php echo $value['ID_DEPT'] ?>"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-success" href="index.php?action=add&id=<?php echo $value['ID_DEPT'] ?>"><span class="fa fa-edit"></span></a>
                                    <button type="submit" class="btn btn-danger" href=" #"><span class="fa fa-trash"></span></button>
                                    <?php
                                    Form_Dept::delete();
                                    ?>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="create_list" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body container-fluid">
                <div class="text-center">
                    <h5 id="list_title">Add</h5>
                </div>
                <div class="container">
                    <form action="" method="post">
                        <div class="mb-3">
                            <input class="form-control" type="text" id="txtName" placeholder="Nombre" name="nombre_dept">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> Create</button>
                            <?php
                            Form_Dept::create();
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>