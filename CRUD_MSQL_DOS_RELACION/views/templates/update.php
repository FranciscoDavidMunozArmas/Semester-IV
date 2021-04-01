<?php
$response = Form_Controller::select("departamento", null, null);
if (isset($_GET["id"])) {
    $item = "id";
    $value = $_GET["id"];
    $info = Form_Controller::select("empleado", $item, $value);
}
?>
<div class="container-fluid pt-3">
    <div>
        <a class="btn btn-primary" href="index.php?action=home" role="button">HOME</a>
    </div>
    <div class="pt-3">
        <form method="post">
            <div class="mb-3">
                <input type="hidden" name="id_employee" value="<?php echo $info["id"] ?>">
                <input class="form-control" type="text" id="txtName" placeholder="Nombre" name="update_name" value="<?php echo $info["nombre"] ?>">
            </div>
            <div class="mb-3">
                <select id="inputState" class="form-select" name="update_department">
                    <?php foreach ($response as $key => $value) : ?>
                        <?php if ($value["id"] == $info["departamento"]) : ?>
                            <option value="<?php echo $value['id'] ?>" selected><?php echo $value['nombre'] ?></option>
                        <?php else : ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php
                Form_Controller::update();
                ?>
            </div>
        </form>
    </div>
</div>