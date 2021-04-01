<?php
$response = Form_Controller::select_both("empleado", "departamento");
?>

<div class="container-fluid pt-3">
    <div>
        <a class="btn btn-primary" href="index.php?action=add" role="button">ADD</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Departamento</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($response as $key => $value) : ?>
                <tr>
                    <td><?php echo $value['empleado'] ?></td>
                    <td><?php echo $value['departamento'] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id_employee" value="<?php echo $value['id'] ?>">
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" href="index.php?action=update&id=<?php echo $value['id'] ?>">Update</a>
                                <button type="submit" class="btn btn-danger" href=" #">Delete</button>
                                <?php
                                Form_Controller::delete();
                                ?>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>