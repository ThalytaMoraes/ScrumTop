
<script language="javascript">
    function ajax() {
        var xmlhttp;
        /*@cc_on
         @if (@_jscript_version >= 5)
         try {
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
         try {
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         } catch (e) {
         xmlhttp = false;
         }
         }
         @else
         xmlhttp = false;
         @end @*/
        if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
            try {
                xmlhttp = new XMLHttpRequest();
            } catch (e) {
                 xmlhttp =  false;
            }
        }
        return xmlhttp;
    }
// -------------------------------------------------------------


    editando = false;
    function edit(celula) {
        idcelula = celula.id;
    
        // aqui pegamos o nome do campo que irá sofrer alteração.
        idlinha = celula.parentNode.id; // aqui pegamos o ID da linha (TR), que é o id do registro no banco de dados.


        txt = celula.innerHTML; // valor atual da celula...
        if (!editando) { // so podemos editar um campo de cada vez
            editar = "<input type='text' id='" + idlinha + "' name='" + idcelula + "' size='25' value=" + txt + " onblur=\"salva(this)\">";
            //ao perder o foco, a funcao salva() sera acionada e ira salvar o novo valor no banco.
            celula.innerHTML = editar;

            $focar = celula.childNodes[0]; //apos inserirmos o input, vamos colocar o cursor nele.
  
       
            editando = true;
        }
    }
    function salva(celula) {
       
        http = ajax(); //http é um objeto.
        idtr = celula.id; // estamos no input, voltamos dois niveis e estamos na TR, como ja sabemos o id da TR é o mesmo id do registro no banco
        novovalor = celula.value; //o novo valor é oque foi digitado no campo input
        campo = celula.parentNode.id; //aqui pegamos o id da celula, que é o nome do campo onde iremos fazer o update
        
          parametros = "&id=" + campo + "&novovalor=" + novovalor;
        http.open("POST", "updatepronto.php", true); //update.php é pagina para onde iremos enviar os parametros, esta pagina será acessada somente pelo ajax e os parametros serao passados via POST
        http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //cabeçalho necessário para a passagem de parametros via post
        http.send(parametros); //acessando a pagina e enviando os parametros...
    
        http.onreadystatechange = function() { //verificando o andamento da operação
            if (http.readyState == 4) { //verifica se a operação ja foi concluida
                if (http.status == 200) { 
                 
                    celula.parentNode.innerHTML =  novovalor; //mostra na celula somente o novo valor, agora sem o campo input
                } else {
                    alert('Erro na tentativa de salvar a alteração'); //caso acontecer algum erro mostre este alert
                }
                editando = false; //para permitir outra edicao.
                http = null;
            }
        }

    }
</script>