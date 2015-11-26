	<form action="" method="post"> 
        <input type="hidden" name="logon" value="1">
        <table id="tabelaLogin">
            <tr id="tabelaLoginLinhaTitulo">
                <td align="center">
                    Login
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="20" maxlength="50" placeholder="E-mail" class="textoPadrao" name="usuario_email">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" size="15" maxlength="20" placeholder="Senha" class="textoPadrao" name="usuario_senha">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Acessar o Sistema" class="botoes">
                </td>
            </tr>
            <tr>
                <td>
                    <font color="#FF0000" size="2"><?php if(isset($_GET["erro_login_senha"])) echo "Usuário ou senha Inválidos!"; ?></font>
                </td>
            </tr>
        </table>
    </form>