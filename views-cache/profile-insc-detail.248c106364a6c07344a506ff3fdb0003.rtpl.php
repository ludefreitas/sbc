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
                alert('Inscrição EFETUADA COM SUCESSO! As aulas já começaram, então você deve comprarecer com os documentos pessoais, sem falta, já na próxima aula, no Centro Esportivo no dia e horário da aula escolhida');
            </script>
        <div class="alert alert-info">
            <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </div>
            <?php } ?>
            <div class="row">            
                <div class="col-md-7 alert alert-primary" style="text-align-last: center;">
                    <h5><?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($pessoa["dtnasc"]); ?> anos </h5>
                    <h5>Inscrição <?php echo htmlspecialchars( $insc["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                    
                </div>
                
                   
                <?php if( $insc["idinscstatus"] == 9 ){ ?>
                    <div class="col-md-5 alert alert-success" style="text-align-last: center;">
                        <p><h5 style="text-align: center"><strong style="color: red; font-size: 20px;"> <?php echo htmlspecialchars( $insc["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </strong></h5>
                        </p>
                    </div> 

                <?php }else{ ?>
                    <?php if( $insc["idstatustemporada"] == 5 ){ ?>

                    <?php }else{ ?>
                    <!--
                        <div class="col-md-5 alert alert-success" style="text-align-last: center;">
                                <p><h5 style="text-align: center"> Nº para concorrer no sorteio: </h5>
                                <p><h3 style="color: red; text-align-last: center"><?php echo htmlspecialchars( $insc["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3> </p>
                                <h6 style="text-align: center; font-size: 12px;"> * Caso esta inscrição vá para sorteio</h6></p>
                        </div> 
                    -->
                    <?php } ?>
                
                <?php } ?>
                
                
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
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Pessoa em situação de vulnerabilidade social? </strong>
        </div>
        <div class="col-md-9 alert alert-success">
            <strong><?php if( $insc["inscpvs"] == 0 ){ ?>Não<?php }else{ ?>Sim<?php } ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Status da Inscrição: </strong>
        </div>
        <div class="col-md-9 alert alert-success" <?php echo colorStatus($insc["idinscstatus"]); ?>>
            <strong><?php echo htmlspecialchars( $insc["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="padding-top: 10px">
            <strong>Início previsto das aulas e matrícula: </strong>
        </div>
        <div class="col-md-9 alert alert-success">
             <?php if( $insc["idinscstatus"] == 1 ){ ?>
             As aulas já começaram. Se o status desta inscrição é "Matriculada", então você está matriculado(a) nesta turma. Frequente as aulas e evite faltar sem justificativa para que você não perca sua vaga.
             <?php } ?>

             <?php if( $insc["idinscstatus"] == 2 ){ ?>
             As aulas já começaram. Se o status desta inscrição é "Aguardando matrícula", então você deve comprarecer com os documentos pessoais, sem falta, já na próxima aula, no Centro Esportivo no dia e horário da aula escolhida.
             <?php } ?>

             <?php if( $insc["idinscstatus"] == 7 ){ ?>
             Se o status desta inscrição é "Lista de Espera", então você está em uma lista de espera, aguardando o comunicado de uma eventual vaga. Mantenha atualizado, neste site, seu número de telefone celular, com whatsapp, para receber o comunicado.
             <?php } ?>

             <strong>Leia a observção abaixo, se existir.</strong>
            <?php if( $insc["obs"] ){ ?>
            <br> <span style="color: red; font-weight: bold;"> Atenção! </span> <span style="color: red;"><?php echo htmlspecialchars( $insc["obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        
         <div style="text-align-last: center" class="col-md-12 alert alert-info" <?php echo colorStatus($insc["idinscstatus"]); ?>>
            <strong>
                <a href="/profile/insc" role="button"> Detalhes </a>
            </strong>
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