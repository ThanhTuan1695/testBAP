<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Change password</h3>
            <form method="POST" action="javascript:void(0)" id="formChangePass">
                <div class="form-group">
                    <label for="user_signin">Old password</label>
                    <input type="password" class="form-control" id="old_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">New password</label>
                    <input type="password" class="form-control" id="new_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">Confirm password</label>
                    <input type="password" class="form-control" id="re_new_pass">
                </div>
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Back
                </a>
                <input type="submit" class="btn btn-primary" id="submit_change_pass" value="Change">
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>