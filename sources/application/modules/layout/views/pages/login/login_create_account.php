<div id="pane-create-account" class="panel-body">
    <h2 class="titleForm">Quer sua conta?</h2>
    <p class="message-form">Preencha os campos abaixo para iniciar o processo de cadastro no sistema.</p>
    <form id="create-account-form" accept-charset="utf-8" novalidate autocomplete="off">
        <div style="display: none;">
            <input type="text" id="PreventChromeAutocomplete"
                   name="PreventChromeAutocomplete" autocomplete="address-level4" />
        </div>
        <div class="form-group">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="text" class="form-control ca-input" name="ca-nome" id="ca-nome" placeholder="Nome" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="text" class="form-control ca-input" name="ca-login" id="ca-login" placeholder="Login" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="email" class="form-control ca-input" name="ca-email" id="ca-email" placeholder="Digite seu e-mail" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="email" class="form-control ca-input" name="ca-email-confirm" id="ca-email-confirm" placeholder="Confirme o e-mail" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-buttons clearfix">
            <div class="checkboxer pull-left" style="margin-left:28px;margin-bottom:20px;">
                <input type="checkbox" id="checkboxTerms" value="termosservico">
                <label for="checkboxTerms"><a href="#" style="color:white;">Eu concordo com os termos de serviço.</a></label>
            </div>
        </div>
        <div class="form-buttons clearfix" style="margin-top:20px !important;">
            <button type="submit" class="btn btn-white pull-left show-pane-login btn-login-page">Cancelar</button>
            <button type="submit" id="create-account-button" class="btn btn-blue-grey pull-right btn-login-page">Cadastrar</button>
        </div>
    </form>
</div>