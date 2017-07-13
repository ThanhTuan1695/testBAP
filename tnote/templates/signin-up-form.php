<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-primary">Login</h3>
            <form method="POST" action="javascript:void(0)" id="formSignin">
                <div class="form-group">
                    <label for="user_signin">Username</label>
                    <input type="text" class="form-control" id="user_signin">
                </div>
                <div class="form-group">
                    <label for="pass_signin">Password</label>
                    <input type="password" class="form-control" id="pass_signin">
                </div>
                <input type="submit" class="btn btn-primary" id="submit_signin" value="Login" />
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-success">Register!</h3>
            <p class="text-danger">* Fill full this field :</p>
            <form method="POST" action="javascript:void(0)" id="formSignup">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" id="user_signup">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" id="pass_signup">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="confirm password" id="repass_signup">
                </div>
                <input type="submit" class="btn btn-success" id="submit_signup" value="Create Account">
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>