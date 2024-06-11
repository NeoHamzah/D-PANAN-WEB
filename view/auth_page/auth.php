<?php
$errReg = [];
$errLog = [];

if (isset($errorReg)) {
  $errReg = $errorReg;
}

if (isset($errorLog)) {
  $errLog = $errorLog;
}
?>

<div class="container" id="container">
  <div class="container-form register">
    <form action="<?= urlpath('register') ?>" method="post">
      <h1>Register Akun</h1>
      <input type="hidden" name="role" value="renter">
      <?php if (array_key_exists('email', $errReg)) : ?>
        <p style="color: red; font-size: 12px; font-weight: 600; text-align: left; margin: 0px 0px 0px 0px;"><?= $errReg['email'] ?></p>
      <?php endif ?>
      <input type="email" placeholder="Email" name="email" />
      <?php if (array_key_exists('username', $errReg)) : ?>
        <p style="color: red; font-size: 12px; font-weight: 600; text-align: left; margin: 0px 0px 0px 0px;"><?= $errReg['username'] ?></p>
      <?php endif ?>
      <input type="text" placeholder="Username" name="username" />
      <?php if (array_key_exists('password', $errReg)) : ?>
        <p style="color: red; font-size: 12px; font-weight: 600; text-align: left; margin: 0px 0px 0px 0px;"><?= $errReg['password'] ?></p>
      <?php endif ?>
      <input type="password" placeholder="Password" name="password" />
      <button>Register</button>
    </form>
  </div>
  <div class="container-form login">
    <form action="<?= urlpath('login') ?>" method="post">
      <h1>Login Akun</h1>
      <?php if (array_key_exists('username', $errLog)) : ?>
        <p style="color: red; font-size: 12px; font-weight: 600; text-align: left; margin: 0px 0px 0px 0px;"><?= $errLog['username'] ?></p>
      <?php endif ?>
      <input type="text" placeholder="Username" name="username" required />
      <?php if (array_key_exists('password', $errLog)) : ?>
        <p style="color: red; font-size: 12px; font-weight: 600; text-align: left; margin: 0px 0px 0px 0px;"><?= $errLog['password'] ?></p>
      <?php endif ?>
      <input type="password" placeholder="Password" name="password" />
      <button>Login</button>
    </form>
  </div>
  <div class="container-toggle">
    <div class="toggle">
      <div class="toggle-panel toggle-right">
        <h1>Selamat Datang Kembali!</h1>
        <p>Masih belum memiliki akun?<br />Silahkan registrasi terlebih dahulu!</p>
        <button class="hiddenn" id="register">Register</button>
      </div>
      <div class="toggle-panel toggle-left">
        <h1>Halo, Selamat<br />Datang!</h1>
        <p>Sudah memiliki akun?<br />Silahkan login terlebih dahulu!</p>
        <button class="hiddenn" id="login">Login</button>
      </div>
    </div>
  </div>
</div>

<script>
  const container = document.getElementById('container');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');
  const searchParams = window.location.pathname.split('/');

  if (searchParams.includes('register')) {
    container.classList.add("active")
  } else {
    container.classList.remove("active")
  }

  registerBtn.addEventListener('click', () => {
    container.classList.add('active');
  });

  loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
  });
</script>