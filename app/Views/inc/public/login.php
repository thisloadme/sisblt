<form class="form-signin" action="<?php echo base_url('pasien') ?>">
    <div class="text-center mb-4">
        <img class="mb-4" src="<?php echo base_url('media/img/pwni.png'); ?> " alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-white">Login SiRusa</h1>
    </div>

    <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
    <p class="mt-5 mb-3 text-white text-center">&copy; SiRusa 2020</p>
</form>