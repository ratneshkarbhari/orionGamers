<main class="page-content"  id="admin-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">

                <h1 class="page-title text-center"><?php echo $title; ?></h1>
                <p class="text-danger text-center"><?php echo $error; ?></p>

                <form action="<?php echo site_url('admin-login-exe'); ?>" method="post">
                    <div class="form-group">
                        <label for="admin-username">Username</label>
                        <input class="form-control" type="text" name="admin-username" id="admin-username">
                    </div>
                    <div class="form-group">
                        <label for="admin-password">Password</label>
                        <input class="form-control" type="password" name="admin-password" id="admin-password">
                    </div>
                    <button style="background-color: red;" class="btn btn-block">Login</button>
                </form>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        </div>
    </div>
</main>
<style>
    header,footer{
        display: none;
    }
</style>