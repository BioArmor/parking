function envia(pag){
    document.form.action = '/parking'+pag+'.html';
        document.form.submit();
}
 
function valida(){
    var usuario = document.getElementByName("uname");
    var contraseña = document.getElementByName("psw");
    var minLongitudPassword = 6;
    var longitudPassword = document.getElementByName("psw").value.length;
            
    if((usuario == "")||(contraseña == "")){
        window.alert("¡Los campos usuario y contraseña no pueden estar vacios!");
    }else if (document.form.uname.value == document.form.psw.value){
    	window.alert("¡La contraseña no puede ser igual al usuario!");
    	document.form.uname.focus();
    	return;
	}else if (longitudPassword < minLongitudPassword) {
        window.alert("¡La contraseña íntroducida no és válida!");
    }else{
        envia('login');
    }
}