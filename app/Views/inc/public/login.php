<form class="form-signin" action="/login/proses" method="POST">
    <div class="text-center mb-4">
        <img class="mb-4" src="/media/img/pwni.png " alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-white">Login SIS BLT</h1>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputEmail" name="userlogin" class="form-control" placeholder="Nama User" required autofocus>
        <label for="inputEmail">Nama User</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="userpass" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
    <p class="mt-5 mb-3 text-white text-center">&copy; SISBLT 2020</p>
</form>