<?php
require_once 'Application/core/sql.php';

// echo  " <pre> ";
// print_r($queryImg);
// echo " </pre> ";
?>


<div class="container mt-3">

    <div class="row align-items-center ">
        <div class="col">
            <h1>Это страница изображения</h1>
            <p>B его чудесный автор - <?= $imgOwner ?></p>
        </div>
        <div class="col-2">
            <?php
            if ($auth && $imgOwner == $login) {
            ?>
                <form action="application/pages/delImg.php" method="post">
                    <input type="hidden" name="imgID" value="<?= $imgID ?>">
                    <input type="submit" value="Удалить изображение">
                </form>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
        </div>
        <div class="col-6 text-center">
            <img width=100% class="imgpage" src='<?= $queryImg[0][1] ?>' alt="spa0.jpg">
        </div>
        <div class="col">
        </div>
    </div>


    <div class="row  ">
        <div class="col-6 align-items-center ">

            <!-- Добавить коммент -->
            <div class="row mt-5">
                <div class="col-12">
                    <h3>Добавить комментарий</h3> <br>
                    <?php
                    if ($auth) {
                    ?>
                        <form action="application/pages/addcomment.php" method="post">
                            <input type="text" name="commText">
                            <input type="hidden" name="imgID" value="<?= $imgID ?>">
                            <input type="hidden" name="date" value="<?= date('Y-m-d H:i') ?>">
                            <input type="submit" value="Добавить">
                        </form>
                    <?php } else {
                        echo "<p> Авторизуйтесь, чтобы добавлять комментарии </p>";
                    } ?>

                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <h3 id="lastComm">Последние комментарии</h3>
                </div>
            </div>

            <?php
            if (empty($comments)) {
                echo "<p> Комментарии отсутствуют </p>";
            }

            foreach ($comments as $comment) {
            ?>
                <!-- Блок комментария -->
                <div class="comment my-4 mb-5">
                    <!-- Данные коммента -->
                    <div class="row">
                        <div class="col">
                            <p><?= $comment[0] ?></p><!-- Login -->
                        </div>
                        <div class="col">
                            <p></p>
                        </div>
                        <div class="col">
                            <p><?= $comment[1] ?></p> <!-- date -->
                        </div>
                    </div>
                    <!-- Текст коммента -->
                    <div class="row">
                        <div class="col">
                            <p><?= $comment[2] ?></p>
                        </div>
                    </div>
                    <?php
                    if ($auth && $comment[0] == $login) {
                    ?>
                        <!-- Удалить коммент -->
                        <div class="row">
                            <div class="col">

                                <form action="application/pages/delComment.php" method="post">
                                    <input type="hidden" name="commID" value="<?= $comment[3] ?>">
                                    <input type="hidden" name="imgID" value="<?= $imgID ?>">

                                    <input type="submit" value="Удалить комментарий">
                                </form>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div><!-- /comment -->

            <?php } ?>


        </div>
    </div>
</div> <!-- /Container -->