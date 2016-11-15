<div class="row">
    <?php $error = processLogInForm(); ?>
    <form class="form-horizontal" method="post">

    <?php if ( $login_errors ) { ?>
      <div class="bg-danger">
        <?php foreach ( $login_errors as $error ) { echo $error . '<br />';} ?>
      </div>
    <?php } ?>
        <div class="form-group <?php echo isset( $login_errors['username'] ) ? 'has-error' : '' ?>">
            <label for="inputEmail3"
                   class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <input type="text"
                       name="username"
                       value="<?php echo filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) ?>"
                       class="form-control"
                       id="inputEmail3"
                       placeholder="Username">
            </div>
        </div>
        <div class="form-group <?php echo isset( $login_errors['password'] ) ? 'has-error' : '' ?>">
            <label for="inputPassword3"
                   class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <input type="password"
                       name="password"
                       value="<?php echo filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)?>"
                       class="form-control"
                       id="inputPassword3"
                       placeholder="Password">
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Remember me
            </label></br>
            <button type="submit"
                    name="login-form"
                    class="btn btn-default">Sign in</button>
        </div>
    </form>
</div><!-- end row -->