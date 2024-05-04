<?php if(!class_exists('Rain\Tpl')){exit;}?><script>
    function formatarCampo(campoTexto) {
      if (campoTexto.value.length <= 11) {
        campoTexto.value = mascaraCpf(campoTexto.value);
      } else {
        campoTexto.value = mascaraCnpj(campoTexto.value);
      }
    }
    function retirarFormatacao(campoTexto) {
      campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g,"");
    }
    function mascaraCpf(valor) {
      return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
    }
    function mascaraCnpj(valor) {
      return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
    }

</script>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cursos Esportivos | SBC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/res/admin/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/"><b>Cursos</b> Esportivos<b> SBC</b></a>
   
  </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="help-block text-center">
    <span style="font-weight: bold;"> Digite seu e-mail, digite também seu CPF ( SOMENTE NÚMEROS ), uma nova senha, repita a nova senha e clique em confirmar.<span>
  </div>

  <div class="lockscreen-item">

    <!-- lockscreen credentials (contains the form) -->
    <form  action="/forgot-site" method="post">
      <div class="input-group">
        <input type="email" class="form-control" placeholder="Digite o e-mail cadastrado" name="email">
        
        <input type="numcpf" class="form-control" placeholder="Digite o CPF ( SOMENTE OS NÚMEROS )" name="numcpf" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" maxlength="14">

        <input type="password" class="form-control" placeholder="Digite a nova senha" name="novasenha">

        <input type="password" class="form-control" placeholder="Repita a nova senha" name="repetesenha">

        <div style="text-align: right;">
         <i class="fa fa-arrow-right text-muted" style="color: darkgreen;"></i>
          <button type="submit" class="btn" style="font-weight: bold; color: darkgreen;"> Confirmar </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->  
  <div class="text-center">
    <a href="/login">Entrar com um usuário diferente <br> VOLTAR</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2020-2021 <b><a href="/" class="text-black">Cursos Esportivos SBC</a></b><br>
    Todos os direitos reservados
  </div>
  
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
