        <form class="auth" action="">
            <fieldset>
                <legend>Login</legend>
                <p><?= $error ? $error : '' ?></p>
                <div class="auth__row">
                    <label for="useremail">User email</label>
                    <input name="email" class="auth__text" type="text" id="useremail">
                    <i class="auth__error auth__error_hide">Don't contain (_, -, {}, $, 0-9, length > 5 characters)</i>
                </div>
                
                <div class="auth__row">
                    <label for="userpass">User pass</label>
                    <input name="password" class="auth__text" type="password" id="userpass">
                    <i class="auth__error auth__error_hide">Must contain (a-z, A-Z, 0-9, length > 7 characters)</i>
                </div>

                <div class="auth__row">
                    <button type="button" id="sendbtn" class="auth__btn">Login</button>
                </div>
            </fieldset>
        </form>
        <script src="/public/login.js"></script>