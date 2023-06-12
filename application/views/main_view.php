

    <div class="row align-items-center my-3">
        <div class="col">
            <h1>Это главная страница</h1>
        </div>

        <div class="col-5">
            <?php
            require_once 'application/core/sql.php';
            
            

            if ($auth) {
            ?>
                <form action="application/pages/upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" value="Загрузить">
                </form>
                <!-- <a class="custom-btn btn-16" href="">Добавить картинку</a> -->
            <?php
            }
            ?>

        </div>
    </div>

    <div class="row">
        <?php
        foreach ($imgs as $img) {
            $path = $img[1];
            list($folder, $imgName) = explode("/", $path);
        ?>
            <div class="col-4 my-2 imgcont">
            <a href="index.php?url=img&imgID=<?= $img[0] ?>"><img class="imggal" src='<?= $img[1] ?>' alt="<?= $imgName ?>">
            </div>

        <?php } // /foreach
        ?>
    </div>


