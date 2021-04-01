<?php

if (!isset($_GET['id']) || $_GET['id'] == null) {
    echo '<script type="text/javascript">
    window.location = "index.php?action=home"; </script>';
}
$options = Form_Career::select(null);
$department = Form_Dept::select($_GET['id']);
$dept_career = Form_Career_Dept::select($_GET['id']);
echo print_r($dept_career);
?>

<div class="container-fluid pt-3">
    <div>
        <a class="btn btn-primary" href="index.php?action=home" role="button">HOME</a>
    </div>
    <div class="mt-3">
        <h5>DEPARTAMENTO: <?php echo $department["NOMBRE_DEPT"] ?></h5>
    </div>
    <div class="pt-3">
        <form method="post">
            <div class="mb-3">
                <select id="" class="form-control form-select" name="id_career">
                    <?php foreach ($options as $key => $value) : ?>
                        <option value="<?php echo $value["CODIGO_CARRERA"] ?>"><?php echo $value["NOMBRE_CARRERA"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <input type="hidden" name="id_dept" value="<?php echo $department["ID_DEPT"] ?>">
                <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                <?php
                Form_Career_Dept::create();
                ?>
            </div>
        </form>
    </div>

    <div class="mt-2">
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">Carrera</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($dept_career as $key => $value) : ?>
                    <?php $career = Form_Career::select($value["CODIGO_CARRERA"]) ?>
                    <tr>
                        <td><?php echo $career["NOMBRE_CARRERA"] ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id_career" value="<?php echo $value["CODIGO_CARRERA"] ?>">
                                <input type="hidden" name="id_dept" value="<?php echo $value["ID_DEPT"] ?>">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                    <?php
                                    Form_Career_Dept::delete();
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