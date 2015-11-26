/**************************************/
function validarSenha(formulario){
	if(formulario.senha.value != formulario.senhac.value){
		alert("Senhas não conferem!");
		formulario.senhac.focus();
		return false;
	}
}
function pulaCampo(campos) {
    if (campos.value.length == campos.maxLength) {
        for (var i = 0; i < campos.form.length; i++) {
            if (campos.form[i] == campos && campos.form[(i + 1)] && campos.form[(i + 1)].type != "hidden") {
                campos.form[(i + 1)].focus();
                break;
            }
        }
    }
}
function confirmarExclusao() {
    if (confirm("Atenção!!! Deseja realmente apagar esse registro?"))
        return true;
    else
        return false;
}
function confirmarFecharRelatorio() {
    if (confirm("Atenção! Deseja realmente fechar o relatório mensal?"))
        return true;
    else
        return false;
}

//valida numero inteiro com mascara
function mascaraInteiro(campo) {
		
    if (event.keyCode < 48 || event.keyCode > 57) {
        event.returnValue = false;
        return false;
    }
	if(campo.value == "0"){
		campo.value = '';		
		event.returnValue = false;
		return false;
	}
    return true;
}

function checarDatas(){ 
	var data_1 = document.turma.data_abertura.value;
	var data_2 = document.turma.data_encerramento.value;
	
	if(data_1 > data_2){
		alert("Preencha corretamente as datas.");
		return false;
	}else
	return true;
	
//	alert(document.form_inserir.data_abertura.value);
}