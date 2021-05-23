<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="container">
    <div class="row">
        <div class="col-md-12 alert alert-primary">
            <h5>Nome do aluno: <?php echo htmlspecialchars( $insc["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($insc["dtnasc"]); ?> anos </h5>
            Número para concorrer no sorteio: <span style="font-weight: bold; font-size: 20px; color: red">&nbsp;<?php echo htmlspecialchars( $insc["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
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
            <strong><?php echo htmlspecialchars( $insc["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>
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
            <strong>Status da Inscrição: </strong>
        </div>
        <div class="col-md-9 alert alert-success">
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
    <div class="row">
        <div class="col-md-12" style="padding-top: 10px">
            
            <input type="submit" value="Imprimir" class="button alt" onclick="window.print()">
        
        </div>
        
    </div>
</div>



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