function validartipos(fr)
{
//Define as vari�veis utilizadas na fun��o
var resp;
var a=0;
var temp;
var s;
resp=true;
//Limpa o objeto de erro
erro.innerHTML="";
// Faz o la�o atrav�s de todos os elementos do form
for(a=0;a<fr.elements.length;a++)
{ 
if (fr.elements[a].Tipo=="IN"){
	{    	

// Se o tipo for inteiro, faz a valida��o de valores
	    s=fr.elements[a].value;
	    s=limparstring(s);
	if (fr.elements[a].Obrigatorio=="1" || s.length>0) {
// A valida��o s� � feita se o campo for obrigat�rio OU se estiver preenchido
	  temp=fr.elements[a].value;
//Utiliza a fun��o isNaN para verificar se � um n�mero e parseInt para verificar se � inteiro
	  if (isNaN(parseInt(temp)))
	   { resp=false;
	     erro.innerHTML=erro.innerHTML + fr.elements[a].Descricao + " deve conter um n�mero inteiro<br>";
	     }
	}
	}
}


if (fr.elements[a].Tipo=="F") {
//Se o tipo for Float faz a valida��o
	    s=fr.elements[a].value;
	    s=limparstring(s);
	if (fr.elements[a].Obrigatorio=="1" || s.length>0) {
// A valida��o s� � feita se o campo for obrigat�rio OU se estiver preenchido
	  temp=fr.elements[a].value;
//Utiliza a fun��o isNaN para verificar se � um n�mero e parseFloat para verificar se � Float
      if (isNaN(parseFloat(temp)) || parseFloat(temp)<=0)
	   { resp=false;
	     erro.innerHTML=erro.innerHTML + fr.elements[a].Descricao + " deve conter um n�mero real positivo<br>";
	     }
	}
}


if (fr.elements[a].Tipo=="NOM") {
	    s=fr.elements[a].value;
	    s=limparstring(s);
	if (fr.elements[a].Obrigatorio=="1" || s.length>0) {
// A valida��o s� � feita se o campo for obrigat�rio OU se estiver preenchido
	  temp=fr.elements[a].value;
// Verifica a existencia de espa�o para saber se nome e sobrenome foram preenchidos
      if (temp.indexOf(" ")==-1)
	   { resp=false;
	     erro.innerHTML=erro.innerHTML + fr.elements[a].Descricao + " deve conter nome e sobrenome<br>";
	     } 
	}
}

if (fr.elements[a].Tipo=="MAIL") {
	    s=fr.elements[a].value;
	    s=limparstring(s);
	if (fr.elements[a].Obrigatorio=="1" || s.length>0) {
// A valida��o s� � feita se o campo for obrigat�rio OU se estiver preenchido
	  temp=fr.elements[a].value;
// Verifica a exist�ncia de @ e . para validar o e-mail
      if (temp.indexOf("@")==-1 || temp.indexOf(".")==-1)
	   { resp=false;
	     erro.innerHTML=erro.innerHTML + fr.elements[a].Descricao + " deve conter um e-mail v�lido<br>";
	     }
	}
}

}

//Se algo foi inv�lido, resp cont�m false
return(resp); }
