<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tornar usuário administrador e/ou professor
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/users">Usuários</a></li>
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

        <!-- /.box-header -->        
        <!-- form start -->
        <form role="form" action="/admin/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desperson">Nome</label>
              <input disabled="true" type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label>-Apelido</label>
              <input type="text" class="form-control" id="apelidoperson" name="apelidoperson" placeholder="Digite o apelido" value="<?php echo htmlspecialchars( $user["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <!--
            <div class="form-group">
              <label for="deslogin">Login</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Digite o login"  value="<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="nrphone">Telefone</label>
              <input type="text" class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone"  value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          -->
            <?php if( getUserId() == 2 OR getUserId() == 1 OR getUserId() == 156 ){ ?>


                <div class="checkbox">
                <label>
                  <?php if( $user["inadmin"] == 1 ){ ?>

                <input type="checkbox" name="inadmin" value="1" checked> Acesso de Administrador
                <?php }else{ ?>

                  <input type="checkbox" name="inadmin" value="1" > Acesso de Administrador
                <?php } ?>

                    </label>
               </div>

                <div class="checkbox">
                  <label>
                <?php if( $user["isaudi"] == 1 ){ ?>

                <input type="checkbox" name="isaudi" value="1" checked> Acesso de Auditor
                <?php }else{ ?>

                  <input type="checkbox" name="isaudi" value="1" > Acesso de Auditor
                <?php } ?>

              </label>
               </div>

            <?php } ?>

            

            <div class="checkbox">
              <label>
                <?php if( $user["isprof"] == 1 ){ ?>

                <input type="checkbox" name="isprof" value="1" checked> Acesso de Professor
                <?php }else{ ?>

                  <input type="checkbox" name="isprof" value="1" > Acesso de Professor
                <?php } ?>

              </label>
            </div>
            <div class="checkbox">
              <label>
                <?php if( $user["isestagiario"] == 1 ){ ?>

                <input type="checkbox" name="isestagiario" value="1"checked> Acesso de Estagiário
                <?php }else{ ?>

                  <input type="checkbox" name="isestagiario" value="1" > Acesso de Estagiário
                <?php } ?>

                
              </label>
            </div>
            <!--
            <div class="checkbox">
              <label>
                <input type="checkbox" name="statususer" disabled="true" value="1" <?php if( $user["statususer"] == 1 ){ ?>checked<?php } ?>> Ativar usuário
              </label>
            </div>
          -->
          
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
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