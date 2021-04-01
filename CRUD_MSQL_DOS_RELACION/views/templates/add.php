<?php
$response = Form_Controller::select("departamento", null, null);
?>
<div class="container-fluid pt-3">
    <div>
        <a class="btn btn-primary" href="index.php?action=home" role="button">HOME</a>
    </div>
    <div class="pt-3">
        <form method="post">
            <div class="mb-3">
                <input class="form-control" type="text" id="txtName" placeholder="Nombre" name="input_name">
            </div>
            <div class="mb-3">
                <select id="inputState" class="form-select" name="input_department">
                    <?php foreach ($response as $key => $value) : ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php
                Form_Controller::create();
                ?>
            </div>
        </form>
    </div>
</div>