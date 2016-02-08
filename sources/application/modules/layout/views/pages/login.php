<div class="login-screen">
    <div class="panel-login blur-content">
        <div class="panel-heading"><img src="<?php echo base_url('assets/img/logo-white-large@2x.png'); ?>" height="100" alt=""></div><!--.panel-heading-->

        <div id="pane-login" class="panel-body active">
            <h2>Login to Dashboard</h2>
            <div class="form-group">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" placeholder="Enter your email address">
                    </div>
                </div>
            </div><!--.form-group-->
            <div class="form-group">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>
            </div><!--.form-group-->
            <div class="form-buttons clearfix">
                <label class="pull-left"><input type="checkbox" name="remember" value="1"> Remember me</label>
                <button type="submit" class="btn btn-success pull-right">Login</button>
            </div><!--.form-buttons-->

            <div class="social-accounts">
                <div class="btn-group btn-merged btn-group-justified">
                    <div class="btn-group">
                        <a class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-social btn-github"><i class="fa fa-github"></i> Github</a>
                    </div>
                </div>
            </div><!--.social-accounts-->

            <ul class="extra-links">
                <li><a href="#" class="show-pane-forgot-password">Forgot your password</a></li>
                <li><a href="#" class="show-pane-create-account">Create a new account</a></li>
            </ul>
        </div><!--#login.panel-body-->

        <div id="pane-forgot-password" class="panel-body">
            <h2>Forgot Your Password</h2>
            <div class="form-group">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" placeholder="Enter your email address">
                    </div>
                </div>
            </div><!--.form-group-->
            <div class="form-buttons clearfix">
                <button type="submit" class="btn btn-white pull-left show-pane-login">Cancel</button>
                <button type="submit" class="btn btn-success pull-right">Send</button>
            </div><!--.form-buttons-->
        </div><!--#pane-forgot-password.panel-body-->

        <div id="pane-create-account" class="panel-body">
            <h2>Create a New Account</h2>
            <div class="form-group">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="text" class="form-control" placeholder="Enter your full name">
                    </div>
                </div>
            </div><!--.form-group-->
            <div class="form-group">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="email" class="form-control" placeholder="Enter your email address">
                    </div>
                </div>
            </div><!--.form-group-->
            <div class="form-group">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>
            </div><!--.form-group-->
            <div class="form-group">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="password" class="form-control" placeholder="Enter your password again">
                    </div>
                </div>
            </div><!--.form-group-->
            <div class="form-group">
                <label><input type="checkbox" name="remember" value="1"> I have read and agree to the term of use.</label>
            </div>
            <div class="form-buttons clearfix">
                <button type="submit" class="btn btn-white pull-left show-pane-login">Cancel</button>
                <button type="submit" class="btn btn-success pull-right">Sign Up</button>
            </div><!--.form-buttons-->
        </div><!--#login.panel-body-->

    </div><!--.blur-content-->
</div><!--.login-screen-->

<div class="bg-blur dark">
    <div class="overlay"></div><!--.overlay-->
</div><!--.bg-blur-->

<svg version="1.1" xmlns='http://www.w3.org/2000/svg'>
    <filter id='blur'>
        <feGaussianBlur stdDeviation='7' />
    </filter>
</svg>