<?php if(!class_exists('Rain\Tpl')){exit;}?>
 <div class="container"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 15px 0px 50px 0px;">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if( $erroInsc != '' ){ ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars( $erroInsc, ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </div>
            <?php } ?>
            <?php if( $success != '' ){ ?>
            <script type="text/javascript">  
                alert('Inscrição efetuada com sucesso!!!');
            </script>
        <div class="alert alert-info">
            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </div>
            <?php } ?>
            <div class="row">            
                <div class="col-md-7 alert alert-primary">
                    <h5>Nome do aluno: <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($pessoa["dtnasc"]); ?> anos </h5>
                    <h5>Inscrição Nº <?php echo htmlspecialchars( $insc["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                    
                </div>
                <div class="col-md-5 alert alert-success">
                   
                       <p><h5 style="text-align: center"> Nº para concorrer no sorteio: </h5>
                       <p><h3 style="color: red; text-align-last: center"><?php echo htmlspecialchars( $insc["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3> </p>
                       <h6 style="text-align: center; font-size: 12px;"> * Caso esta inscrição vá para sorteio</h6></p>
                      
                </div> 
                
            </div>              
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Turma / Temporada: </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php echo htmlspecialchars( $insc["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Horário: </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php echo htmlspecialchars( $insc["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $insc["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $insc["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Professor: </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php echo htmlspecialchars( $insc["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 5px">
            <strong>Local da aula (CREC): </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php echo htmlspecialchars( $insc["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Data da Inscrição: </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php echo formatDateHour($insc["dtinsc"]); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Com laudo? </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php if( $insc["laudo"] == 0 ){ ?>Não<?php }else{ ?>Sim<?php } ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Pessoa com deficiência? </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php if( $insc["inscpcd"] == 0 ){ ?>Não<?php }else{ ?>Sim<?php } ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px;">
            <strong>STATUS da Inscrição: </strong>
        </div>
        <div class="col-md-9 alert alert-success" <?php echo colorStatus($insc["idinscstatus"]); ?>>
            <strong><?php echo htmlspecialchars( $insc["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Início previsto das aulas: </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php echo formatDate($insc["dttermmatricula"]); ?></strong>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="col-md-12" style="padding-top: 10px">
            
            <input type="submit" value="Imprimir" class="button alt" onclick="window.print()">
        
        </div>
        
    </div>
    -->
</div>
</div> <!-- final da index -->


<!--
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
</style>
-->