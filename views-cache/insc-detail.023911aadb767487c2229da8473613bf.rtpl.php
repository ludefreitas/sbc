<?php if(!class_exists('Rain\Tpl')){exit;}?><style>
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="/professor"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/professor/insc">Inscrições</a></li>
    <!--<li class="active"><a href="/professor/espaco/create">Cadastrar</a></li>-->
  </ol>
</section>

<section class="content">


<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="container">
        <div class="row">                
            
            <div class="col-md-12">
                
                <h3 id="order_review_heading" style="margin-top:30px;">Detalhes da inscrição N°<?php echo htmlspecialchars( $insc["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                <div id="order_review" style="position: relative;">
                    <table class="shop_table">
                        <thead>
                            <tr>
                                <th colspan="2" class="product-name"><h3>Nome: <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($pessoa["dtnasc"]); ?> anos </h3></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="product-name"><h3>número para concorrer no sorteio: <?php echo htmlspecialchars( $insc["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3></th>
                            </tr>
                            <tr>
                                <th class="product-name">Turma / Temporada</th>
                                <td class="product-name"><?php echo htmlspecialchars( $insc["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">Horário / Professor</th>
                                <td class="product-name"><?php echo htmlspecialchars( $insc["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $insc["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $insc["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Prof. <?php echo htmlspecialchars( $insc["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">Local da aula (CREC)</th>
                                <td class="product-name"><?php echo htmlspecialchars( $insc["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">Data da Inscrição</th>
                                <td class="product-name"><?php echo formatDateHour($insc["dtinsc"]); ?></td>
                            </tr>                            
                            <tr>
                                <th class="product-name">Status da Inscrição</th>
                                <td class="product-name"><?php echo htmlspecialchars( $insc["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                             <tr>
                                <th class="product-name"> Início previsto das aulas </th>
                                <td class="product-name"> <?php echo formatDate($insc["dttermmatricula"]); ?> </td>
                            </tr>

                        </thead>
                        <tbody>
                            
                               
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                    <div id="payment">
                        <div class="form-row place-order">
                            <input type="submit" value="Imprimir" class="button alt" onclick="window.print()">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>