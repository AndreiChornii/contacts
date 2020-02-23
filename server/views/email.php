<h1>Email</h1>
<form class="auth" action="">
    <fieldset>
        <legend>Email</legend>
        <p><?= $error ? $error : '' ?></p>
        <div class="auth__row">
            <label for="useremail">User email</label>
            <input class="auth__text" type="text" id="useremail" value="<?= $_SESSION['user']['email'] ?>">
            <i class="auth__error auth__error_hide">Not valid email (example@gmail.com)</i>
        </div>
        <div class="auth__row">
            <button type="button" id="sendbtn" class="auth__btn">Edit</button>
        </div>
    </fieldset>
</form>
<script src="/public/email.js"></script>