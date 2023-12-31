<!-- Регистрация  -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 border-bottom text-center">
            Регистрация
        </h3>
        <div class="col">
            <form class="row g-3 needs-validation" validate method="post" action="?url=regProcess">

                <div class="col-md-6">
                    <label for="username" class="form-label">Ваш логин</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <?php if ($_SESSION['loginExist']) { ?>
                        <p>Упс! А логинчик-то занят!</p>
                    <?php }
                    unset($_SESSION['loginExist']); ?>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Ваш email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <?php if ($_SESSION['emailExist']) { ?>
                        <p>Упс! А email-то занят!</p>
                    <?php }
                    unset($_SESSION['emailExist']); ?>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required>

                </div>

                <div class="col-md-6">
                    <label for="password2" class="form-label">Повтротите пароль</label>
                    <input type="password" class="form-control" id="password2" name="password2" required>
                    <input type="hidden" name="token">

                </div>
                <?php
                $pasNoCheck = $_SESSION['passNoCheck'] ?? null;

                if ($pasNoCheck) {
                ?>
                    <div class="col-12 text-center">
                        <p>&#128064; Пароли не совпадают !</p>
                    </div>
                <?php
                }
                unset($_SESSION['passNoCheck']);
                ?>
                <div class="col-12 ">
                    <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
                </div>
            </form>

            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center">
                    <a href="?url=vkAuth">Авторизация ВК</a>
                </div>
            </div>

        </div>
    </div>
</div><!-- /.row Регистрация-->