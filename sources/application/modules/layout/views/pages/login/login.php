<!-- LOGIN FORM -->
<form id="login-form" accept-charset="utf-8" novalidate>
    <div id="pane-login" class="panel-body active"><!-- login.panel-body -->

        <h2 id="loginTitle">Entrar no Sistema</h2><!-- login title -->

        <div class="form-group"><!-- email form-group-->
            <div class="inputer">
                <div class="input-wrapper">
                    <div class="login-error login-error-email pull-right" id="email-error"></div>
                    <input class="form-control" name="email" id="email" placeholder="Login / E-mail" autocomplete="off">
                </div>
            </div>
        </div><!-- end email form-group-->

        <div class="form-group"><!-- senha form-group -->
            <div class="inputer">
                <div class="input-wrapper">
                    <div class="login-error login-error-email pull-right" id="senha-error"></div>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                </div>
            </div>
        </div><!-- end senha form-group -->

        <div class="form-buttons clearfix"><!-- form-buttons -->
            <div class="checkboxer pull-left" style="margin-left:35px;">
                <input type="checkbox" id="checkboxRemember" value="remember">
                <label for="checkboxRemember">Lembrar de mim</label>
            </div>
            <button id="btn-login" class="btn btn-error pull-right">Entrar</button>
        </div><!-- end form-buttons-->

        <ul class="extra-links">
            <li><a class="show-pane-forgot-password" style="cursor: pointer;">Esqueci a senha</a></li>
            <li><a class="show-pane-create-account" style="cursor: pointer;">Não sou registrado</a></li>
        </ul>

    </div><!-- end login.panel-body -->
</form>
<!-- END LOGIN FORM -->