<?php if(!class_exists('Rain\Tpl')){exit;}?><script>
    function getDadosEnderecoPorCep(cep){

      let url = 'https://viacep.com.br/ws/'+cep+'/json/unicode/'

        let xmlHttp = new XMLHttpRequest()
            
        xmlHttp.open('GET', url)

        xmlHttp.onreadystatechange = () => {
        
          if(xmlHttp.readyState == 4 && xmlHttp.status == 200){

            let dadosJSONText = xmlHttp.responseText

            let dadosJSONObj = JSON.parse(dadosJSONText)

            document.getElementById('rua').value = dadosJSONObj.logradouro
            document.getElementById('bairro').value = dadosJSONObj.bairro
            document.getElementById('cidade').value = dadosJSONObj.localidade
            document.getElementById('uf').value = dadosJSONObj.uf                                               
          }
                                
        }

       xmlHttp.send()
                            
    }
  </script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastrar Novo Crec
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/local">Crecs</a></li>
    <!--<li class="active"><a href="/admin/local/create">Cadastrar</a></li>-->
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <?php if( $error != '' ){ ?>

          <div class="alert alert-danger" style="margin: 10px 10px 0px 10px">
        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

          </div>
        <?php } ?>

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/local/create" method="post">
          <div class="box-body">

            <div class="row">

              <div class="col-md-6">

                <div class="box-header">
                  <label for="apelidolocal">Apelido do Crec</label>
                  <input type="text" class="form-control" id="apelidolocal" name="apelidolocal" placeholder="Informe o apelido do Crec" value="<?php echo htmlspecialchars( $createLocalValues["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div> 

                <div class="box-header">
                  <label for="nomelocal">Nome do Crec</label>
                  <input type="text" class="form-control" id="nomelocal" name="nomelocal" placeholder="Informe o nome oficial do Crec" value="<?php echo htmlspecialchars( $createLocalValues["nomelocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div> 

                <div class="box-header">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o nome do Bairro" value="<?php echo htmlspecialchars( $createLocalValues["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Informe o nome da cidade" value="<?php echo htmlspecialchars( $createLocalValues["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="box-header">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="uf" name="estado" placeholder="Informe o nome do Estado" value="<?php echo htmlspecialchars( $createLocalValues["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>                              

              </div>

              <div class="col-md-6">

                <div class="box-header">
                  <label for="cep">Cep</label>
                  <input type="number" class="form-control" id="cep" name="cep" placeholder="Informe o Cep de onde está localizado o Crec" value="<?php echo htmlspecialchars( $createLocalValues["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="getDadosEnderecoPorCep(this.value)">
                </div> 

                <div class="box-header">
                  <label for="rua">Rua</label>
                  <input type="text" class="form-control" id="rua" name="rua" placeholder="Informe o nome da rua ou avenida" value="<?php echo htmlspecialchars( $createLocalValues["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>  

                 <div class="box-header">
              <label for="numero">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o número" value="<?php echo htmlspecialchars( $createLocalValues["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>   

            <div class="box-header">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Informe o complemento, se houver" value="<?php echo htmlspecialchars( $createLocalValues["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>   

            <div class="box-header">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Informe o númeor do telefone do local" value="<?php echo htmlspecialchars( $createLocalValues["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div> 

            <div class="checkbox">
              <label>
                <input type="checkbox" name="statuslocal" value=""> Ativar local?
              </label>
            </div>

             <div class="box-header">
              <label for="idlocal">Professor / Coordenador</label>
              <select class="form-control" name="iduser">
                 <option selected="selected" value="">Selecione professor</option>
                  <?php $counter1=-1;  if( isset($prof) && ( is_array($prof) || $prof instanceof Traversable ) && sizeof($prof) ) foreach( $prof as $key1 => $value1 ){ $counter1++; ?>

                 <option  value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>

              </select>
            </div>                           
                
              </div>                          

            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            &nbsp&nbsp&nbsp&nbsp
            <a type="button" class="btn btn-danger" href="javascript:window.history.go(-1)">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->