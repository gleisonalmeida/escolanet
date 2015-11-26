	<form action="" method="post" onSubmit="return validarSenha(this);"> 
        <input type="hidden" name="cadastro" value="1">
        <table id="tabelaLogin">
            <tr id="tabelaLoginLinhaTitulo">
                <td align="center">
                    Cadastro de Responsável
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="35" maxlength="50" placeholder="Nome completo" required class="textoPadrao" name="nome">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="40" maxlength="50" placeholder="Endereço" required class="textoPadrao" name="endereco">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="20" maxlength="30" placeholder="Telefone" required pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" title="(99) 9999-9999 ou (99) 99999-9999" class="textoPadrao" name="telefone">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="25" maxlength="50" placeholder="E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="textoPadrao" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" size="15" maxlength="20" placeholder="Senha" required class="textoPadrao" name="senha">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" size="15" maxlength="20" placeholder="Confirmar Senha" required class="textoPadrao" name="senhac">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Cadastrar" class="botoes">
                    <input type="button" value="Cancelar" class="botoes" onClick="history.back(1)">
                </td>
            </tr>
            <tr>
                <td>
                    <font color="#FF0000" size="2"><?php if(isset($_GET["erro"])) echo $_GET["erro"]; ?></font>
                </td>
            </tr>
        </table>
    </form>