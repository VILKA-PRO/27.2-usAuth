<!-- Авторизация  -->
<div class="row justify-content-center mt-5">
    <div class="col-12">
        <h1 class="pb-4 mb-4 font-italic border-bottom ">
            Dashboard
        </h1>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam corporis, aspernatur maxime, odio ea fugiat ipsam debitis at quam laudantium harum reiciendis recusandae tempore, maiores provident nobis vitae nihil culpa?</p>
        </div>
        <div class="col">

        </div>
        <div class="col-4 text-center">
            <?php if ($_SESSION['role'] == "vkuser") { ?>
                <img style="width:100%" src="img/1298877491.jpg">
            <?php } ?>
        </div>
    </div>



</div><!-- /.row Авторизация-->