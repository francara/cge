 /**
  * @author: Flåviø Sïlvå
  * @version: 1.0
  * @date: 18/03/2011
  * @contact: http://www.flaviosilva.net
  * 
  * Format a number with grouped thousand
  *
  * @param int decimals;
  * @param char sepDecimals;
  * @param char sepDecimals;
  * @return String;
  
  Como usar? Simples
  
  var a = 2501258845456; // Número a ser formatado;
  document.write(a.formatNumber(2,',','.'));
  // Escreve: 25.012.588.454,56  
  
  */

 Number.prototype.formatNumber = function(decimals, sepDecimals, sepThousand){
  if(decimals==null)decimals=2;  
  if(sepDecimals==null)sepDecimals=',';
  if(sepThousand==null)sepThousand='.';  

  var n = new String(this.toFixed(decimals)).replace('.','').split('');
  n.reverse();
  var fn = new Array();
  var cont = decimals+1;
  for(this.i=0;this.i<n.length;this.i++){
   if(this.i==decimals-1 && n.length>decimals-1){
    fn.unshift(sepDecimals+n[this.i]);
   }else{
    if(cont--==0 && this.i != n.length-1){
     fn.unshift(sepThousand+n[this.i]);
     cont = 2;
    }else fn.unshift(n[this.i]);
   } 
  }
  return fn.join('');
 }


// JavaScript Document
function textFormat(formField) {
var txt = "";
var carc = "";
var words = formField.value.split(" ");
var spcase = new Array("do", "em", "e", "no", "na", "com", "de", "da",
                       "em", "se", "um", "uma", "uns", "se",
                       "o", "a", "lhe", "IBICT", "TSE", "TRE", "SUS",
                       "HRAN", "cnpjq", "meu", "seu", "Sr.", "UnB", "SQN",
                           "SCN", "CDT/UnB", "Cecae/USP");

spcase:
for(i=0; i < words.length; i++) {
        for(k=0; k<spcase.length; k++) {
                if (words[i].toUpperCase() == spcase[k].toUpperCase())
                  {
                    txt += spcase[k];
                    if (i != (words.length-1))
                       { txt += " "; }
                    continue spcase;
                  }
                }

        for(j=0; jwords[i].length; j++)
               {
               if (j==0)
                 {
                   carc = words[i].charAt(j).toUpperCase();
                   txt += carc;
                   if (j == (words[i].length-1) && i != (words.length-1))
                   { txt += " "; }
                        }
               else
                 {
                   carc = words[i].charAt(j).toLowerCase();
                    txt += carc;
                   if (j == (words[i].length-1) && i != (words.length-1))
                   { txt += " "; }
                 }
          }
}
formField.value = txt;
}

function formataTelefone(campo) {
        var textoOriginal = campo.value;
        var textoFormatado = "";

        // Limpa qualquer caractere não numerico
        textoOriginal = forceNumbers(textoOriginal);
        var tamanho           = textoOriginal.length;

        for (i=0; itamanho; i++) {
                rIndex = tamanho - i - 1;
                if (i == 4) {
                        textoFormatado += "-" + textoOriginal.charAt(rIndex);
                } else {
                        textoFormatado += textoOriginal.charAt(rIndex);
                }
        }
        return reverseString(textoFormatado);
}

function formataCEP(campo) {
        var textoOriginal = campo.value;
        var textoFormatado = "";

        // Limpa qualquer caractere não numerico
        textoOriginal = forceNumbers(textoOriginal);
        var tamanho           = textoOriginal.length;

        for (i=0; itamanho; i++) {
                rIndex = tamanho - i - 1;
                if (i == 3) {
                        textoFormatado += "-" + textoOriginal.charAt(rIndex);
                } else if (i == 6) {
                        textoFormatado += "." + textoOriginal.charAt(rIndex);
                } else {
                        textoFormatado += textoOriginal.charAt(rIndex);
                }
        }
        return reverseString(textoFormatado);
}
function CepOk(e) {
    var dv = false;
    s = FiltraCampo(e.value);
    tam = s.length
    if ( tam == 8 ) {
        dv=true;
    }
    if ( tam>0 && tam < 8) {
        mensagem = "           Erro de digitação:\n";
        mensagem+= "          ===============\n\n";
        mensagem+= " O Cep: " + e.value + " não existe!!\n\n\n";
                mensagem+= " Use o seguinte formato: ddddd-ddd\n\n";
        mensagem+= " Exemplo: 70800-200\n";
        alert(mensagem);
                e.focus();
    }
        //Avancar(e);
    return dv;
}

function FormataCep(e) {
    var s = "";

    s = FiltraCampo(e.value);
    tam =  s.length;
        r = s.substring(0,5) + "-" + s.substring(5,8);
    if ( tam < 6 )
        s = r.substring(0,tam);
    else
        s = r.substring(0,tam+1);
    e.value = s;
    return s;
}



function Numerico(e) {
    var s = "";

    s = FiltraCampo(e.value);
    e.value = s;
    return s;
}



function forceNumbers(texto) {
        var tamanho = texto.length;
        var result = "";
        var validChars = "1234567890";

        for (i=0; i<tamanho; i++) {
                var letra = texto.charAt(i);
                if (validChars.indexOf(letra) >= 0) {
                        result += letra;
                }
        }

        return result;
}

function reverseString(string) {
        var tamanho  = string.length;
        var result         = "";

        for (i=0; i<tamanho; i++) {
                rIndex = tamanho - i - 1;
                result += string.charAt(rIndex);
        }

        return result;
}

function emailCheck (txtField) {
var emailStr = txtField.value
var emailPat=/^(.+)@(.+)$/
var specialChars="\\(\\)>@,;:\\\\\\\"\\.\\[\\]"
var validChars="\[^\\s" + specialChars + "\]"
var quotedUser="(\"[^\"]*\")"
var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
var atom=validChars + '+'
var word="(" + atom + "|" + quotedUser + ")"
var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")

var matchArray=emailStr.match(emailPat)
if (matchArray==null) {
        alert("Email inválido")
        txtField.focus();
        return false
}
var user=matchArray[1]
var domain=matchArray[2]

if (user.match(userPat)==null) {
    alert("Email inválido")
    txtField.focus();
    return false
}

var IPArray=domain.match(ipDomainPat)
if (IPArray!=null) {
          for (var i=1;i<=4;i++) {
            if (IPArray[i]>255) {
                alert("Email inválido")
                txtField.focus();
                return false
            }
    }
    return true
}

var domainArray=domain.match(domainPat)
if (domainArray==null) {
        alert("Email inválido")
        txtField.focus();
    return false
}

var atomPat=new RegExp(atom,"g")
var domArr=domain.match(atomPat)
var len=domArr.length
if (domArr[domArr.length-1].length<2 ||
    domArr[domArr.length-1].length>3) {
   alert("Email inválido")
   txtField.focus();
   return false
}

if (len<2) {
   var errStr="Email inválido"
   alert(errStr)
   txtField.focus();
   return false
}

return true;
}

function validatePwd() {
var invalid = " "; // Invalid character is a space
var minLength = 6; // Minimum length
var pw1 = document.myForm.password.value;
var pw2 = document.myForm.password2.value;
// check for a value in both fields.
if (pw1 == '' || pw2 == '') {
alert('Please enter your password twice.');
return false;
}
// check for minimum length
if (document.myForm.password.value.length < minLength) {
alert('Your password must be at least ' + minLength + ' characters long. Try again.');
return false;
}
// check for spaces
if (document.myForm.password.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed.");
return false;
}
else {
if (pw1 != pw2) {
alert ("You did not enter the same new password twice. Please re-enter your password.");
return false;
}
else {
alert('Nice job.');
return true;
      }
   }
   }

///// Checagem de Data 24/02/2004
function DataOk(e) {
var strDia="";
var strMes="";
var strAno="";
var Dia=0;
var Mes=0;
var Ano=0;
var Texto=""; //VALOR A SER TESTADO
var Msg=""; // MENSAGEM A SER EXIBIDA NA TELA SE HOUVER ERRO
var Erro = false;

Texto = FormataData(e); // COLOCAR AS BARRAS

if (Texto!="") {
   //EXISTE VALOR

   // DATA ESTÁ DIGITADA INCOMPLETA
   if ( Texto.length < 10 && Texto.length != 8 ) {
      e.value = '';
      return true;
      }

   strDia = Texto.substring(0,2);
   strMes = Texto.substring(3,5);
   strAno = Texto.substring(6);


   Dia=parseInt(strDia,10);
   Mes=parseInt(strMes,10);
   Ano=parseInt(strAno,10);

   // colocar o ano com 4 digitos se o usuario informar com 2
   if ( Ano < 100 ) {
      if (Ano > 40 )
          Ano += 1900
      else
         Ano += 2000;
      e.value = strDia+'/'+strMes+'/'+Ano;
   }

   if ((Dia<1) || (Dia>31) || (isNaN(Dia))) {
      Msg = Msg + 'Dia '+Dia+' inválido\n';
      Erro = true;
      }
   if ((Mes<1) || (Mes>12) || (isNaN(Mes))) {
      Msg = Msg + 'Mês '+Mes+' inválido\n';
      Erro = true;
      }
   if (isNaN(Ano)) {
      Msg = Msg + 'Ano '+Ano+' inválido\n';
      Erro = true;
      }
   if ((Dia>=31) && ((Mes==4) || (Mes==6) || (Mes==9) || (Mes==11))) {
      Msg = Msg + 'Dia inválido para este mês\n';
      Erro = true;
      }
   if (Mes==2) {
      //MES DE FEVEREIRO
      if (Dia>=30) {
         Msg = Msg + 'Dia inválido para fevereiro\n';
         Erro = true;
        }
      if ((Dia==29) && (((Ano % 4) != 0) || (((Ano % 100) == 0) && ((Ano % 400) != 0)))) {           Msg = Msg + 'Dia inválido para fevereiro. '+ Ano +' não é bisexto\n';
         Erro = true;
         }
      }
   }
  if ( Erro ) {
    alert(Msg +'Informe a data no formato dd/mm/aaaa\nExemplo:13/11/2005' );
    e.focus();
    }
  return true;
}

function FiltraCampo(codigo) {
    var s = "";
        tam = codigo.length;
        for (i = 0; i < tam ; i++) {
                if (codigo.substring(i,i + 1) == "0" ||
                   codigo.substring(i,i + 1) == "1" ||
            codigo.substring(i,i + 1) == "2" ||
            codigo.substring(i,i + 1) == "3" ||
            codigo.substring(i,i + 1) == "4" ||
            codigo.substring(i,i + 1) == "5" ||
            codigo.substring(i,i + 1) == "6" ||
            codigo.substring(i,i + 1) == "7" ||
            codigo.substring(i,i + 1) == "8" ||
            codigo.substring(i,i + 1) == "9"  )
                                 s = s + codigo.substring(i,i + 1);
        }
        return s;
}

function FormataData(e) {
    var s = "";

    s = FiltraCampo(e.value);
    tam =  s.length;

    r = s.substring(0,2) + "/" + s.substring(2,4) + "/";
    r+= s.substring(4,8);
    if ( tam < 3 )
        s = r.substring(0,tam);
    else if ( tam < 5 )
        s = r.substring(0,tam+1);
    else
        s = r.substring(0,tam+2);
    e.value = s;
    return s;
}

// checagem de cpf

function DvCpfOk(e) {
    var dv = false;

    controle = "";
    s = FiltraCampo(e.value);
    tam = s.length;
    if ( tam == 11 ) {
        dv_cpf = s.substring(tam-2,tam);
        for ( i = 0; i < 2; i++ ) {
            soma = 0;
            for ( j = 0; j < 9; j++ )
                soma += s.substring(j,j+1)*(10+i-j);
            if ( i == 1 ) soma += digito * 2;
            digito = (soma * 10) % 11;
            if ( digito == 10 ) digito = 0;
            controle += digito;
        }
        if ( controle == dv_cpf )
            dv = true;

        if ( ! dv && tam > 0) {
            mensagem = "           Erro de digitação:\n";
            mensagem+= "          ===============\n\n";
            mensagem+= " O CPF: " + e.value + " não existe!!\n";
            alert(mensagem);
            
            //e.focus(); 
            // Esta função funcionou apenas no Internet Explore, no FireFox não funcionou, 
            // então foi necessario controlar via PHP, ao tentar inserir no Banco de Dados (arquivo insert_db.php)
            // Para Campos Tipo CPF é necessario adicionar ID = "CPF", para o comando reconhcer
            // ########### - Wellington Mesquita - 18/05/2011 ############
                       
            //document.getElementById('cpf').focus();
            formmtc_usu.getElementById('cpf').focus();
            
        }
     } else  {
            e.value = '';
            mensagem = "           Erro de digitação:      \n";
            mensagem+= "           ==================    \n\n";        
            mensagem+= " para CPF é necessário 11 digitos \n";
            alert(mensagem);
            
            //e.focus(); 
            // Esta função funcionou apenas no Internet Explore, no FireFox não funcionou, 
            // então foi necessario controlar via PHP, ao tentar inserir no Banco de Dados (arquivo insert_db.php)
            // Para Campos Tipo CPF é necessario adicionar ID = "CPF", para o comando reconhcer
            // ########### - Wellington Mesquita - 18/05/2011 ############
                       
            //document.getElementById('cpf').focus();
            formmtc_usu.getElementById('cpf').focus();
            
            
            
            
        }
    return dv;
}

// Essa funcao chamava-se FormataCpf
// Tive que trocar pra FormataCpf1 - Tava conflitando com uma outra que esta no valida.php da entidade
// mudei os seguintes arquivos para chamar FormataCpf1
//  insert.php / update.php  pasta --> adm
// insert.php                pasta --> convenio\denuncia
// insert.php                pasta --> cooperacao

function FormataCpf1(e) {
    var s = "";
    s = FiltraCampo(e.value);
    tam =  s.length;
    r = s.substring(0,3) + "." + s.substring(3,6) + "." + s.substring(6,9)
    r += "-" + s.substring(9,11);
    if ( tam < 4 )
        s = r.substring(0,tam);
    else if ( tam < 7 )
        s = r.substring(0,tam+1);
    else if ( tam < 10 )
        s = r.substring(0,tam+2);
    else
        s = r.substring(0,tam+3);
    e.value = s;
    return s;
}

// checagem de cnpj



function FormataCnpj(e) {
    var s = "";
    var r = "";

    s = FiltraCampo(e.value);
    tam =  s.length;
    r = s.substring(0,2) + "." + s.substring(2,5) + "." + s.substring(5,8)
    r += "/" + s.substring(8,12) + "-" + s.substring(12,14);
    if ( tam < 3 )
        s = r.substring(0,tam);
    else if ( tam < 6 )
        s = r.substring(0,tam+1);
    else if ( tam < 9 )
        s = r.substring(0,tam+2);
    else if ( tam < 13 )
        s = r.substring(0,tam+3);
    else
        s = r.substring(0,tam+4);
    e.value = s;
    return s;
}
function DvCnpjOk(e) {
    var dv = false;

    controle = "";
    s = FiltraCampo(e.value);
    tam = s.length
    if ( tam  == 14 ) {
        dv_cnpj = s.substring(tam-2,tam);
        for ( i = 0; i < 2; i++ ) {
            soma = 0;
            for ( j = 0; j < 12; j++ )
                soma += s.substring(j,j+1)*((11+i-j)%8+2);
            if ( i == 1 ) soma += digito * 2;
            digito = 11 - soma  % 11;
            if ( digito > 9 ) digito = 0;
            controle += digito;
        }
        if ( controle == dv_cnpj )
            dv = true;


        if ( ! dv && tam > 0) {
            mensagem = "           Erro de digitação:\n";
            mensagem+= "          ===============\n\n";
            mensagem+= " O CNPJ: " + e.value + " não existe!!\n";
            alert(mensagem);
            
            //e.focus(); 
            // Esta função funcionou apenas no Internet Explore, no FireFox não funcionou, 
            // então foi necessario controlar via PHP, ao tentar inserir no Banco de Dados (arquivo insert_db.php)
            // Para Campos Tipo CPF é necessario adicionar ID = "CPF", para o comando reconhcer
            // ########### - Wellington Mesquita - 18/05/2011 ############
                       
            document.getElementById('cnpj').focus();
            
        }
     } else  {
         e.value = '';
        mensagem = "           Erro de digitação:      \n";
        mensagem+= "           ==================    \n\n";        
        mensagem+= " para CNPJ é necessário 14 digitos \n";
        alert(mensagem);
        
        //e.focus(); 
        // Esta função funcionou apenas no Internet Explore, no FireFox não funcionou, 
        // então foi necessario controlar via PHP, ao tentar inserir no Banco de Dados (arquivo insert_db.php)
        // Para Campos Tipo CPF é necessario adicionar ID = "CPF", para o comando reconhcer
        // ########### - Wellington Mesquita - 18/05/2011 ############
        
        document.getElementById('cnpj').focus();
        
        
         }
     return dv;
}


//checagem cnpj e cpf

function DvCpfCnpjOk(e,outra) {
    var s = "";
       
    
    s = FiltraCampo( e.value );
    tam = s.length;
    if ( tam < 12 )    
	{
        if (tam > 10)
        {
        	DvCpfOk(e);
			if (outra==1)
			{
				valida_cpf_cnpj();
			}
        }
        else
        {
        	mensagem = "           Erro de digitação:      \n";
            mensagem+= "           ==================    \n\n";
            mensagem+= " para CPF é necessário 11 digitos  \n";
            mensagem+= " para CNPJ é necessário 14 digitos \n";
            alert(mensagem);
            
            //e.focus(); 
            // Esta função funcionou apenas no Internet Explore, no FireFox não funcionou, 
            // então foi necessario controlar via PHP, ao tentar inserir no Banco de Dados (arquivo insert_db.php)
            // Para Campos Tipo CPF é necessario adicionar ID = "CPF", para o comando reconhcer
            // ########### - Wellington Mesquita - 18/05/2011 ############
                       
            document.getElementById('cpfcnpj').focus();
        }
	}
    else
	{
    	if (tam == 14)
        {
        	 DvCnpjOk(e);
            if (outra==1)
            {
            valida_cpf_cnpj();
			}
        }
        else
        {
        	mensagem = "           Erro de digitação:      \n";
            mensagem+= "           ==================    \n\n";
            mensagem+= " para CPF é necessário 11 digitos  \n";
            mensagem+= " para CNPJ é necessário 14 digitos \n";
            alert(mensagem);
                       
            //e.focus(); 
            // Esta função funcionou apenas no Internet Explore, no FireFox não funcionou, 
            // então foi necessario controlar via PHP, ao tentar inserir no Banco de Dados (arquivo insert_db.php)
            // Para Campos Tipo CPF é necessario adicionar ID = "CPF", para o comando reconhcer
            // ########### - Wellington Mesquita - 18/05/2011 ############
                       
            document.getElementById('cpfcnpj').focus();
            
        }
       
	}
}

function FormataCpfCnpj(e) {
   var s = "";
    s = FiltraCampo(e.value);
    tam =  s.length;

    if (tam < 12 ) {
       FormataCpf1(e);
       }
    else
       {
       FormataCnpj(e);
       }
}


// checagen fone e fax

function FormataFoneFax(e) {
    var s = "";
    var res = "";

    s = FiltraCampo(e.value);
    while ( s.substring(0,1) == "0" ) {
        s1 = s.substring(1,s.length);
        s = s1;
    }
    if ( s.length == 14 || s.length == 12 )
        s = s.substring(s.length-10,s.length);
    if ( s.length == 13 || s.length == 11 )
        s = s.substring(s.length-9,s.length);

    res = s.substring(s.length-4,s.length);
    if ( s.length > 4  && s.length < 9 )
        res = s.substring(0,s.length-4)+"-"+res;
    if ( s.length > 8  )
        res = "(0" + s.substring(0,2) + ") " +
                   s.substring(2,s.length-4) + "-" + res;
    e.value = res;
    return res;
}
 function excluir(link) {
                                  if (confirm ("Deseja excluir registro."))
                                  document.location = link
                                }


function FormataReais(fld, milSep, decSep, e) {
var sep = 0;
var key = '';
var i = j = 0;
var len = len2 = 0;
var strCheck = '-0123456789';
var aux = aux2 = '';

//var whichCode = (window.Event) ? e.which : e.keyCode;

var whichCode = e.keyCode  ? e.keyCode  :
			    e.charCode ? e.charCode :
			    e.which    ? e.which    : void 0;

if (whichCode == 8) return true;
if (whichCode == 9) return true;
if (whichCode == 13) return true;
if (whichCode == 27) return true;
if (whichCode == 46) return true;
if ((whichCode >= 35)  &&  (whichCode <= 40)) return true;
key = String.fromCharCode(whichCode);  // Valor para o código da Chave
if (strCheck.indexOf(key) == -1) return false;  // Chave inválida
len = fld.value.length;

if ((key == "-") && (len != 0)) return false;

for(i = 0; i < len; i++)
if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep))
break;
aux = '';
for(; i < len; i++)
if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt
(i);
aux += key;
len = aux.length;
if (len == 0) fld.value = '';
if (len == 1) fld.value = '0'+ decSep + '0' + aux;
if (len == 2) fld.value = '0'+ decSep + aux;
if (len > 2) {
aux2 = '';
for (j = 0, i = len - 3; i >= 0; i--) {
if (j == 3) {
aux2 += milSep;
j = 0;
}
aux2 += aux.charAt(i);
j++;
}
fld.value = '';
len2 = aux2.length;
for (i = len2 - 1; i >= 0; i--)
fld.value += aux2.charAt(i);
fld.value += decSep + aux.substr(len - 2, len);
}
return false;
}


function FormataReaisPositivos(fld, milSep, decSep, e) {
var sep = 0;
var key = '';
var i = j = 0;
var len = len2 = 0;
var strCheck = '0123456789';
var aux = aux2 = '';
//var whichCode = (window.Event) ? e.which : e.keyCode;

var whichCode = e.keyCode  ? e.keyCode  :
			    e.charCode ? e.charCode :
			    e.which    ? e.which    : void 0;

if (whichCode == 13) return true;
if (whichCode == 8) return true;
if (whichCode == 9) return true;
if (whichCode == 27) return true;
if (whichCode == 46) return true;
if ((whichCode >= 35)  &&  (whichCode <= 40)) return true;

key = String.fromCharCode(whichCode);  // Valor para o código da Chave
if (strCheck.indexOf(key) == -1) return false;  // Chave inválida
len = fld.value.length;

if ((key == "-") && (len != 0)) return false;

for(i = 0; i < len; i++)
if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep))
break;
aux = '';
for(; i < len; i++)
if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt
(i);
aux += key;
len = aux.length;
if (len == 0) fld.value = '';
if (len == 1) fld.value = '0'+ decSep + '0' + aux;
if (len == 2) fld.value = '0'+ decSep + aux;
if (len > 2) {
aux2 = '';
for (j = 0, i = len - 3; i >= 0; i--) {
if (j == 3) {
aux2 += milSep;
j = 0;
}
aux2 += aux.charAt(i);
j++;
}
fld.value = '';
len2 = aux2.length;
for (i = len2 - 1; i >= 0; i--)
fld.value += aux2.charAt(i);
fld.value += decSep + aux.substr(len - 2, len);
}
return false;
}




function StringtoNumero(e)
         {
         var valor;
         valor=e.replace(".","");
         valor=valor.replace(".","");
         valor=valor.replace(",",".");
         return(valor);
         }

// Verifica se Data2 é maior que Data1
function DataMaior(Data1, Data2)
 {		
  var dt_1;
  var dt_2;

	 dt_1 = Data1;
	 dt_1 = dt_1.substr(6,4) + dt_1.substr(3,2) + dt_1.substr(0,2);
     dt_1 = String(dt_1);
	 
	 dt_2 = Data2;        	 
	 dt_2 = dt_2.substr(6,4) + dt_2.substr(3,2) + dt_2.substr(0,2);     
     dt_2 = String(dt_2);

     
//  if (dt_1!=="" && dt_2!=="" && dt_2>dt_1)
  if (dt_2>dt_1)  
   {
    return true;
   }
		else {return false;}
	}
	
// Verifica se Data2 é menor que Data1
function DataMenor(Data1, Data2)
 {		
  var dt_1;
  var dt_2;

	 dt_1 = Data1;
	 dt_1 = dt_1.substr(6,4) + dt_1.substr(3,2) + dt_1.substr(0,2);
	 
	 dt_2 = Data2;        	 
	 dt_2 = dt_2.substr(6,4) + dt_2.substr(3,2) + dt_2.substr(0,2);

//  if (dt_1!=="" && dt_2!=="" && dt_2<dt_1)
   if (dt_2<dt_1)  
   {
    return true;
   }
		else {return false;}
	}
	
function float2moeda(num) {

   x = 0;

   if(num<0) {
      num = Math.abs(num);
      x = 1;
   }

   if(isNaN(num)) num = "0";
      cents = Math.floor((num*100+0.5)%100);

   num = Math.floor((num*100+0.5)/100).toString();

   if(cents < 10) cents = "0" + cents;
      for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
         num = num.substring(0,num.length-(4*i+3))+'.'
               +num.substring(num.length-(4*i+3));

   ret = num + ',' + cents;

   if (x == 1) ret = ' - ' + ret;return ret;

}


//###################################################################################

function dataDif(data1, data2)
{
	if ( (data1.split("/") == "") &&(data2.split("/") == "") )
	{
	   data1 = new Date();
   	   data2 = new Date();
	}
	else
    {
	   var dtInicio = data1.split("/");
       var dtFim = data2.split("/");
       data1 = new Date(dtInicio[2] + "/" + dtInicio[1] + "/" + dtInicio[0]);
       data2 = new Date(dtFim[2] + "/" + dtFim[1] + "/" + dtFim[0]);
    }
 	var utc1 = Date.UTC(data1.getFullYear(), data1.getMonth(), data1.getDate());
	var utc2 = Date.UTC(data2.getFullYear(), data2.getMonth(), data2.getDate());

	total= Math.floor((utc2 - utc1) / ( 1000 * 60 * 60 * 24) );
	return total;
}

//###################################################################################

function somadata(dias, dataX)
{
	dia = dataX.substr(0,2);
	mes = dataX.substr(3,2);
	ano = dataX.substr(6,4);
	
	for (i=0;i<dias;i++){
		if (mes == 01 || mes == 03 || mes == 05 || mes == 07 || mes == 08 || mes == 10 || mes == 12){
			if (mes == 12 && dia == 31){
				mes = 01;
				ano++;
				dia = 00;
			}
			if (dia == 31 && mes != 12){
				mes++;
				dia = 00;
			}
		}//fecha if geral

		if (mes == 04 || mes == 06 || mes == 09 || mes == 11){
			if (dia == 30){
				dia = 00;
				mes++;
			}
		}//fecha if geral

		if (mes == 02){
			if (ano % 4 == 0 && ano % 100 != 0){ //ano bissexto
				if (dia == 29){
					dia = 00;
					mes++;
				}
			}
			else
			{
				if (dia == 28){
					dia = 00;
					mes++;
				}
			}
		}//FECHA IF DO MÊS 2
		dia++;
	}//fecha o for()

// Confirma Saída de 2 dígitos ------------------------------------------------
	dia = dia.toString();
	mes = mes.toString();
	if (dia.length == 1) {dia = "0"+dia;}
	if (mes.length == 1) {mes = "0"+mes;}
// Monta Saída ----------------------------------------------------------------

	nova_data = dia+"/"+mes+"/"+ano ;
	return nova_data;
}//fecha a funçâo data 	




	
