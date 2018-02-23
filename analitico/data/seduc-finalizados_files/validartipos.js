function validartipos(fr)
{
//Define as variáveis utilizadas na função
var resp;
var a=0;
var temp;
var s;
resp=true;
//Limpa o objeto de erro
erro.innerHTML="";
// Faz o laço através de todos os elementos do form
for(a=0;a<fr.elements.length;a++)
{ 
if (fr.elements[a].Tipo=="IN"){
	{    	

// Se o tipo for inteiro, faz a validação de valores
	    s=fr.elements[a].value;
	    s=limparstring(s);
	if (fr.elements[a].Obrigatorio=="1" || s.length>0) {
// A validação só é feita se o campo for obrigatório OU se estiver preenchido
	  temp=fr.elements[a].value;
//Utiliza a função isNaN para verificar se é um número e parseInt para verificar se é inteiro
	  if (isNaN(parseInt(temp)))
	   { resp=false;
	     erro.innerHTML=erro.innerHTML + fr.elements[a].Descricao + " deve conter um número inteiro<br>";
	     }
	}
	}
}


if (fr.elements[a].Tipo=="F") {
//Se o tipo for Float faz a validação
	    s=fr.elements[a].value;
	    s=limparstring(s);
	if (fr.elements[a].Obrigatorio=="1" || s.length>0) {
// A validação só é feita se o campo for obrigatório OU se estiver preenchido
	  temp=fr.elements[a].value;
//Utiliza a função isNaN para verificar se é um número e parseFloat para verificar se é Float
      if (isNaN(parseFloat(temp)) || parseFloat(temp)<=0)
	   { resp=false;
	     erro.innerHTML=erro.innerHTML + fr.elements[a].Descricao + " deve conter um número real positivo<br>";
	     }
	}
}


if (fr.elements[a].Tipo=="NOM") {
	    s=fr.elements[a].value;
	    s=limparstring(s);
	if (fr.elements[a].Obrigatorio=="1" || s.length>0) {
// A validação só é feita se o campo for obrigatório OU se estiver preenchido
	  temp=fr.elements[a].value;
// Verifica a existencia de espaço para saber se nome e sobrenome foram preenchidos
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
// A validação só é feita se o campo for obrigatório OU se estiver preenchido
	  temp=fr.elements[a].value;
// Verifica a existência de @ e . para validar o e-mail
      if (temp.indexOf("@")==-1 || temp.indexOf(".")==-1)
	   { resp=false;
	     erro.innerHTML=erro.innerHTML + fr.elements[a].Descricao + " deve conter um e-mail válido<br>";
	     }
	}
}

}

//Se algo foi inválido, resp contém false
return(resp); }
