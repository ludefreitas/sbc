<?php if(!class_exists('Rain\Tpl')){exit;}?>        <script type="text/javascript">

       
  

        /*

        function upload(idpess, data){


            if(document.getElementById("arquivo").value == ''){

                alert('Selecione um arquivo!')
                return

            }else{

                let arquivo = document.getElementById("arquivo").files[0];        

                let arquivotipo = arquivo['type'];

                if(arquivotipo != 'application/pdf'){

                    alert('Arquivo que você selecionou não é um arquivo do tipo PDF')
                    return

                }else{

                    arquivoname = arquivo['name'];
                    arquivosize = arquivo['size'];
                    let traco = "-"
                    let arquivotiposembarra = arquivotipo
                    arquivotipo = arquivotiposembarra.replace("/",traco);               
                }
            }      

            url = '/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+arquivotipo+'/'+arquivoname+'/'+arquivosize

            let ajax = new XMLHttpRequest();
            ajax.open('POST', 'url');
            
            $.ajax({
              url: url,
              method: 'GET'  
            }).done(function(result){

              if(result){              
                    alert(result)
              }else{
                alert('Dados não disponíveis!')
              }
            });
          }
          */


            /*


            // receber seletor do formulário
            let cadForm = document.getElementById("upload-arquivo");

            // acessa o IF quando existe o formulário com o seletor "upload-arquivo"
            if(cadForm){

                // Qaundo o usuário clicar no botão com submit executa a função
                cadForm.addEventListener("submit", async (e) => {

                    //bloquear o carregamento da página                
                    e.preventDefault();

                    // receber o arquivo do formulário
                    let arquivo = document.getElementById("arquivo").files[0];
                    console.log(arquivo);
                });

            }else{
                console.log('Não');
            }

        */

        function leiamais(){
          var pontos = document.getElementById("pontos");
          var maisTexto = document.getElementById("mais");
          var btnLeiaMais = document.getElementById("btnLeiaMais");

          if(pontos.style.display === "none"){
            pontos.style.display="inline";
            maisTexto.style.display="none";
            btnLeiaMais.innerHTML="Leia Mais";    
          }else{
            pontos.style.display="none";
            maisTexto.style.display="inline";
            btnLeiaMais.innerHTML="Leia menos";
          }
        }

        </script>

        <style type="text/css">
  #mais{
    display: none;
  }

  #popup{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 180px;
    padding: 0px;    
  }

  #popupimage{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 180px;
    padding: 0px;
    border: solid 1px #4c4d4f;
    background: #ccc;    
  }
 
</style>




         <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-12" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

                <div class="container" style="margin: 0px 0px 0px 0px; ">
             
                    <hr style="background-color: #0f71b3;">
                    <span>
                        <span style="font-size: 20px; color: red;" >Atenção!!</span><br>
                    Antes de selecionar o arquivo em pdf para inserir o atestado no seu cadastro, tire uma foto de seu atestado médico 
                    </span><span id="pontos">...</span>
 
                    <span id="mais">
                    (Clínico ou Dermatológico), se você ainda não tirou, de modo que fique bem vísivel (nítido), em seguida selecione a foto do atestado que você acabou de tirar, clique no três pontinhos (...) na parte superior direita da tela de seu celular e clique na opção imprimir, em seguida clique na seta com a palavra PDF, selecione o nome da pasta desejada (anote o nome da pasta, porque você ira precisar dela quando for selecionar o arquivo) e clique em OK.<span style="color: red"> LEMBRE-SE</span>, a data de emissão do atestado, o nome e CRM do médico devem estar bem visíveis!  
                    </span> 

                     <a onclick="leiamais()" id="btnLeiaMais" class="btn btn-default" style="font-size: 14px; color: red;">Leia mais...</a>

                    <hr style="background-color: #0f71b3;">

                    <div class="row" style="margin: -5px -5px -5px -5px; ">   
                        <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 

                             <h5>Inserir atestado médico em PDF <br>
                            <span style="color: darkblue; font-size: 18px">( Carregar atestado em PDF )</span></h5>      

                          <!--  <form action=""  method="GET" id="upload-arquivo" enctype="multipart/form-data"> -->
                            <form  method="POST" action="/saude/atulizaatestadoarquivopdf" id="upload-arquivo" enctype="multipart/form-data">

                                <label style="color: blue; font-weight: bold;">Arquivo: </label><br> 
                                <input type="file" name="arquivo" id="arquivo" accept="application/pdf" required ><br><br> 

                                <div class="box-body">
                                    <label style="color: blue; font-weight: bold;">Selecione o tipo do atestado:</label>
                                <p>
                                    <input type="radio" name="tipoatestado" value="clinico" style="height: 20px; width: 20px;" required> 
                                    <label>Clínico &nbsp;&nbsp;</label>
                                    &nbsp;&nbsp;
                                    <input type="radio" name="tipoatestado" value="dermatologico" style="height: 20px; width: 20px;" required> 
                                    <label>Dermatológico &nbsp;</label>
                                </p>
                                </div>

                                <div class="box-body">                                        
                                    <label style="color: blue; font-weight: bold;">Selecione de quem é o atestado:</label>
                                    <?php $counter1=-1;  if( isset($pessoa) && ( is_array($pessoa) || $pessoa instanceof Traversable ) && sizeof($pessoa) ) foreach( $pessoa as $key1 => $value1 ){ $counter1++; ?>
                                        <p>
                                        <input type="radio" name="idpess" value="<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="height: 20px; width: 20px;" required> <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
                                        <br>                                       
                                            
                                            <span style="color: darkred; font-weight:">  
                                            <?php echo getAtestadoClinicoExiste($value1["numcpf"], 1); ?>
                                            </span>
                                            &nbsp;
                                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?>
                                        </a>
                                            
                                            &nbsp; - &nbsp;
                                             
                                            <span style="color: darkred;">  
                                                <?php echo getAtestadoDermaExiste($value1["numcpf"], 2); ?>
                                            </span>
                                            &nbsp;
                                        <a style="color: orange; text-align-last: right;" onclick="dadosAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?> 
                                        </a>
                                        <br>                                              
                                        </p>                                
                                    <?php }else{ ?>
                                        <p>
                                             Não há pessoas inseridas
                                        </p>    
                                    <?php } ?>
                                    <p>
                                       <a href="/pessoa-create">  INSERIR UMA NOVA PESSOA </a>
                                    </p>
                                </div>


                                     

                                    
                               
                                <input type="submit" name="Enviar" class="btn btn-warning"  >


                                
                            </form>          
               
                        </div>
                        <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 
                             

                        </div>
                    </div> 

                    <hr style="background-color: #0f71b3;">

                </div>
         
            
          