<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">

      $(document).ready(function(){
            $('#data').mask('00-00-0000');
        });

    $(document).ready(function(){
            $('#dataderma').mask('00-00-0000');
        });

    function popupAtestado(idpess) {

            //alert(idpess)

            let url = '/prof/saude/dadosatestado/'+idpess

            let ajax = new XMLHttpRequest();
            ajax.open('GET', 'url');        
        
            $.ajax({
            url: url,
            method: 'GET'  
            }).done(function(result){

                document.getElementById('textConteudoAtestado').innerHTML = result

                document.getElementById('conteudoAtestadoId').value = idpess
                
                document.getElementById('divPopupAtestado').hidden = false

            });

        } 

    function popupAtestadoDerma(idpess, iduser) {

            //alert(idpess)

            let url = '/prof/saude/dadosatestadoderma/'+idpess

            let ajax = new XMLHttpRequest();
            ajax.open('GET', 'url');        
        
            $.ajax({
            url: url,
            method: 'GET'  
            }).done(function(result){

                document.getElementById('textConteudoAtestadoDerma').innerHTML = result

                document.getElementById('conteudoAtestadoDermaId').value = idpess
                
                document.getElementById('divPopupAtestadoDerma').hidden = false

            });

        }  

    function fecharPopupAtestado() {

            document.getElementById('divPopupAtestado').hidden = true 
            
            document.getElementById('conteudoAtestadoId').value = ''
            document.getElementById('data').value = ''
            document.getElementById('observ').value = ''
        }

    function fecharPopupAtestadoDerma() {

            document.getElementById('divPopupAtestadoDerma').hidden = true 
            
            document.getElementById('conteudoAtestadoDermaId').value = ''
            document.getElementById('dataderma').value = ''
            document.getElementById('observderma').value = ''
        }

    function AtualizaAtestadoClinico() {

            let idpess = document.getElementById('conteudoAtestadoId').value
            let data = document.getElementById('data').value
            let observ = document.getElementById('observ').value
            let iduser = document.getElementById('iduser').value

            if(idpess == '' || data == '' || observ == ''){
                alert('Preencha todos os dados')
                return
            }

            var traco1 = data.substr(2,1)
            var traco2 = data.substr(5,1)
            var dia = data.substr(0,2);
            var mes = data.substr(3,2);
            var ano = data.substr(6,4); 
                 
            if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                alert('Formato da data inválida');
            }else{

                if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                }else{

                    let url = '/prof/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+'/'+iduser

                    let ajax = new XMLHttpRequest();
                    ajax.open('GET', 'url');        
                    
                    $.ajax({
                    url: url,
                    method: 'GET'  
                    }).done(function(result){

                        document.getElementById('divPopupAtestado').hidden = true

                        document.getElementById('conteudoAtestadoId').value = ''
                        document.getElementById('data').value = ''
                        document.getElementById('observ').value = ''

                        alert( result );

                    });
                }
            }

        }

        function AtualizaAtestadoDerma() {

            let idpess = document.getElementById('conteudoAtestadoDermaId').value
            let data = document.getElementById('dataderma').value
            let observ = document.getElementById('observderma').value
            let iduser = document.getElementById('iduserderma').value


            if(idpess == '' || data == '' || observ == ''){
                alert('Preencha todos os dados')
                return
            }

            let url = '/prof/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+observ+'/'+iduser

            let ajax = new XMLHttpRequest();
            ajax.open('GET', 'url');        
        
            $.ajax({
            url: url,
            method: 'GET'  
            }).done(function(result){

                document.getElementById('divPopupAtestadoDerma').hidden = true
                
                document.getElementById('conteudoAtestadoDermaId').value = ''
                document.getElementById('dataderma').value = ''
                document.getElementById('observderma').value = ''
                
                alert( result );

            });
            
        }

      function dadosAtestado(idpess){

        let url = '/prof/saude/dadosatestado/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atualizar atestado CLÍNICO clique em "OK"'))
          {
              adicionarArtestado(idpess)
          };

        });
      }

      function adicionarArtestado(idpess){
        
        let confirmaAtestado = confirm('Deseja realmente atualizar atestado CLÍNICO?')

        if(confirmaAtestado == true)
        {                      
            var data = prompt("Informe a data da emissão do Atestado CLÍNICO. Ex.: dd-mm-aaaa");     


            if (data == null || data == "") {

                alert("As informaçãoes do atestado CLÍNICO não foram atualizadas! Informe a data e faça alguma observação")
            } else {

                 var traco1 = data.substr(2,1)
                 var traco2 = data.substr(5,1)
                 var dia = data.substr(0,2);
                 var mes = data.substr(3,2);
                 var ano = data.substr(6,4); 
                 
                 if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                    alert('Formato da data inválida');
                 }else{

                    if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                    }else{

                        //alert('Data validada!!! ' + dia + ' ' + mes + ' ' + ano)

                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado CLÍNICO não foram atualizadas! Informe a data e faça alguma observação.");
                        } else {

                            let url = '/prof/saude/atulizaatestado/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestado(url) 
                        }           
                    }                           
                }
            }        
        } 
         //let url = '/prof/saude/dadosatestado/'+idpess

        //dadosAtestado(url)  
    }
      /*
      function dadosAtestado(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }
      */

      function atualizarAtestado(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }

      function atualizarAtestadoDerma(url){

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          alert(result)

        });
      }

      function dadosAtestadoDerma(idpess){

        let url = '/prof/saude/dadosatestadoderma/'+idpess

        let ajax = new XMLHttpRequest();
        ajax.open('GET', 'url');        
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if (window.confirm(' '+ result + 'Para atualizar atestado DERMATOLÓGICO clique em "OK"'))
          {
              adicionarArtestadoDerma(idpess)
          };

        });
      }

      function adicionarArtestadoDerma(idpess){
        
        let confirmaAtestado = confirm('Deseja realmente atualizar atestado DERMATOLÓGICO?')

        if(confirmaAtestado == true)
        {                      
            var data = prompt("Informe a data da emissão do Atestado DERMATOLÓGICO. Ex.: dd-mm-aaaa");     


            if (data == null || data == "") {

                alert("As informaçãoes do atestado DERMATOLÓGICO não foram atualizadas! Informe a data e faça alguma observação")
            } else {

                 var traco1 = data.substr(2,1)
                 var traco2 = data.substr(5,1)
                 var dia = data.substr(0,2);
                 var mes = data.substr(3,2);
                 var ano = data.substr(6,4); 
                 
                 if((traco1 != '-') || (traco2 != '-') || (ano.length < 4)){
                    alert('Formato da data inválida');
                 }else{

                    if((dia > 31) || (dia == 0) || (mes > 12) || (mes == 0)){

                    alert('data inválida!')
                    
                    }else{

                        //alert('Data validada!!! ' + dia + ' ' + mes + ' ' + ano)

                        
                        var observ = prompt("Digite uma observação");
                        if (observ == null || observ == "") {
                                lert("As informaçãoes do atestado DERMATOLÓGICO não foram atualizadas! Informe a data e faça alguma observação.");
                        } else {

                            let url = '/prof/saude/atulizaatestadoderma/'+idpess+'/'+data+'/'+observ+''

                            atualizarAtestadoDerma(url) 
                        }           
                    }                           
                }
            }        
        } 
         //let url = '/prof/saude/dadosatestado/'+idpess

        //dadosAtestado(url)  
    }

      function requisitarPaginaEndereco(url){

        let ajax = new XMLHttpRequest();
        let idurl = url.substr(53);              
        ajax.open('GET', 'url');
        
        $.ajax({
          url: url,
          method: 'GET'  
        }).done(function(result){

          if(result){              
                alert(result)
          }else{
            alert('Endereço não encontrado!')
          }
        });
      }   

</script>

<style>
@media print {
    .header-area,
    .site-branding-area,
    .sticky-wrapper,
    .footer-top-area,
    .footer-bottom-area,
    .single-product-area .col-md-3,
    .button.alt,
    .product-big-title-area {
        display:none!important;
    }
    .single-product-area .col-md-9 {
        width: 100%!important;
    }
}

#divPopupAtestado{
        position: fixed;
        top: 0; 
        bottom: 0;
        left: 0; 
        right: 0;
        margin: auto;
        width: 50%;
        min-height: 200px;
        max-height: 350px;
        padding: 5px; 
        background-color: rgba(255, 165, 0, 1);
    }  

    #divPopupAtestadoDerma{
        position: fixed;
        top: 0; 
        bottom: 0;
        left: 0; 
        right: 0;
        margin: auto;
        width: 50%;
        min-height: 200px;
        max-height: 350px;
        padding: 5px; 
        background-color: rgba(255, 165, 0, 1);
    }


</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista com <?php echo htmlspecialchars( $total, ENT_COMPAT, 'UTF-8', FALSE ); ?> alunos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/prof"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/prof/pessoas">Alunos</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
          <?php if( $error != '' ){ ?>
              <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
          <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
              </div>
          <?php } ?>
            
            <div class="box-header">

              <div class="box-tools">
                <form action="/prof/pessoas">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">              

            <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>
            <div class="box-body" style="border: solid 1px lightblue; margin: 5px;">
              <div class="row">
              <div class="col-md-10" >
                <h5 style="text-align: left;">
                         <strong> <?php echo htmlspecialchars( $value1["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong> -  
                  &nbsp; <strong>CPF: <?php echo formatCpf($value1["numcpf"]); ?></strong>   
                  &nbsp; D.Nasc.:<?php echo formatDate($value1["dtnasc"]); ?>                
                  &nbsp; <strong> <?php echo calcularIdade($value1["dtnasc"]); ?> anos</strong>   
                  &nbsp; Resp..: <?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - 
                  &nbsp; <strong>Email.: <?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
                  &nbsp; Status: <?php if( $value1["statuspessoa"] == 1 ){ ?>Ativo<?php }else{ ?>Inativo<?php } ?>   
                  &nbsp; <span style="color: red"><?php if( $value1["pcd"] == 1 ){ ?>(PCD)<?php } ?></span>
                  &nbsp; <a style="font-weight: bold;" onclick="requisitarPaginaEndereco('/prof/insc-turma-temporada-endereco/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-map-marker-alt"></i>
                            Endereço 
                        </a>         

                  <br>
                      <span style="color: black; font-weight: bold">Atestado:  </span>
                      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                      <span style="color: darkred; font-weight: bold">  
                        <?php echo getAtestadoClinicoProfExiste($value1["numcpf"], 1); ?>
                        </span>

                         <a style="color: orange; text-align-last: right;" onclick="popupAtestado(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoIconeByNumCpf($value1["numcpf"]); ?></a>  


                         &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                         <span style="color: darkred;">  
                         <?php echo getAtestadoDermaProfExiste($value1["numcpf"], 2); ?>
                          </span>

                        &nbsp; 
                        
                         <a style="color: orange; text-align-last: right;" onclick="popupAtestadoDerma(<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)"><?php echo getAtestadoDermaIconeByNumCpf($value1["numcpf"]); ?></a>
                    
                </h5>
              </div>                
              
              <div class="col-md-2" >
                   <a href="/prof/insc/pessoa/<?php echo htmlspecialchars( $value1["idpess"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-search"></i>&nbsp;Consulta inscrições</a>
              </div>
            </div>           
            </div>
            <?php } ?>
            
              </div>
          </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>
            
            <button type="button" onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-print"></i> Imprimir
            </button>
            
          </div>
  	</div>
  </div>

  <div hidden id="divPopupAtestado" style="text-align-last: center; border-radius: 15px 15px 15px 15px"> 

                <div style="background-color: lightblue; text-align: center; padding: 0px; font-size: 13px; font-weight: bold; border-radius: 15px 15px 0px 0px; width: 100%;">
                    <div style="text-align-last: right; font-weight: bold; color: red; " onclick="fecharPopupAtestado()"> ( x ) &nbsp;&nbsp;
                    </div>  
                </div>

                <div style="background-color: lightblue; text-align: justify; padding: 5px; font-size: 12px; font-weight: bold; border-radius: 0px 0px 0px 0px  ; width: 100%;">
                    <p id="textConteudoAtestado"></p>
                </div> 

                <div style="text-align: center; padding: 5; width: 100%;">
                    <form id="formAtestado" method="get" style="height: 100%;"> 
                        <label style="font-weight: bold; font-size: 10px">Preencha os dados abaixo para atualizar o atestado clínico</label>
                        <br>
                        <input hidden id="conteudoAtestadoId" name="idpess" type="text" required>
                        <input hidden id="iduser" name="iduser" type="text" value='<?php echo getUserId(); ?>' required>
                        <input id="data" name="data" type="text" required="required" style="height: 30px; margin-bottom: 2px; width: 90%" placeholder="Somente números 00-00-0000">
                        <br> 
                        <input id="observ" type="text" name="observ" required="required" style="height: 30px; margin-bottom: 2px; margin-top: 2px; width: 90%" placeholder="Observação:" >
                        <br> 
                        
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaAtestadoClinico()"> Atualizar </span>
                    
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="fecharPopupAtestado()" > Cancelar</span>
                    
                        
                    </form>        
                </div>                
            </div>
            <div hidden id="divPopupAtestadoDerma" style="text-align-last: center; border-radius: 15px 15px 15px 15px"> 
                <div style="background-color: lightblue; text-align: center; padding: 0px; font-size: 13px; font-weight: bold; border-radius: 15px 15px 0px 0px; width: 100%;">
                    <div style="text-align-last: right; font-weight: bold; color: red; " onclick="fecharPopupAtestadoDerma()"> ( x ) &nbsp;&nbsp;
                    </div>  
                </div>
                <div style="background-color: lightblue; text-align: justify; padding: 5px; font-size: 12px; font-weight: bold; border-radius: 0px 0px 0px 0px  ; width: 100%;">
                    <p id="textConteudoAtestadoDerma"></p>
                </div> 
                <div style="text-align: center; padding: 5; width: 100%;">
                    <form id="formAtestadoDerma" method="get" style="height: 100%;"> 
                        <label style="font-weight: bold; font-size: 10px">Preencha os dados abaixo para atualizar o atestado dermatológico</label>
                        <input hidden id="conteudoAtestadoDermaId" name="idpess" type="text" required>
                        <input hidden id="iduserderma" name="iduserderma" type="text" value='<?php echo getUserId(); ?>' required>
                        <input id="dataderma" name="data" type="text" required="required" style="height: 30px; margin-bottom: 2px; width: 90%" placeholder="Somente números 00-00-0000">
                        <br> 
                        <input id="observderma" type="text" name="observderma" required="required" style="height: 30px; margin-bottom: 2px; margin-top: 2px; width: 90%;" placeholder="Observação:">
                        <br> 
                        
                        <span class="btn btn-success"  name="enviar" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="AtualizaAtestadoDerma()"> Atualizar </span>
                        
                        <span class="btn btn-danger" style="margin-top: 2px; width: 44%; font-size: 60%" onclick="fecharPopupAtestadoDerma()"> Cancelar</span>
                    
                         
                    </form>          
                </div>           
            </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->