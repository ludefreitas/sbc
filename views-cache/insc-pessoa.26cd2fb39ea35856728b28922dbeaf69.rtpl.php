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
    <li><a href="/prof"><i class="fa fa-dashboard"></i> Home</a></li>
    <!--<li class="active"><a href="/admin/espaco/create">Cadastrar</a></li>-->
  </ol>
</section>

<section class="content">


<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Consulta inscrições para <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo calcularIdade($pessoa["dtnasc"]); ?> anos </h3>
            </div>
        </div>
    </div>
</div>


    <div class="container">
        <div class="row">                
            
            <div class="col-md-12">
             
                <div id="" style="position: relative;">
                     <?php $counter1=-1;  if( isset($insc) && ( is_array($insc) || $insc instanceof Traversable ) && sizeof($insc) ) foreach( $insc as $key1 => $value1 ){ $counter1++; ?>                           
                    <table class="">
                        <thead>                           
                            <tr>
                                <th colspan="2" >
                                    <h3>
                                        INCRIÇÃO Nº: <?php echo htmlspecialchars( $value1["idinsc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                                    <!--    <br>Número para concorrer no sorteio: &nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars( $value1["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -->

                                    </h3>
                                </th>
                            </tr>
                            <tr>
                                <th class="product-name">Turma / Temporada</th>
                                <td class="product-name">[<?php echo htmlspecialchars( $value1["idturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>] - <?php echo htmlspecialchars( $value1["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> (<?php echo htmlspecialchars( $value1["periodo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) - <?php echo htmlspecialchars( $value1["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                            </tr>
                            <tr>
                                <th class="product-name">Horário / Professor</th>
                                <td class="product-name"><?php echo htmlspecialchars( $value1["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $value1["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value1["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Prof. <?php echo htmlspecialchars( $value1["apelidoperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">Local da aula (CREC)</th>
                                <td class="product-name"><?php echo htmlspecialchars( $value1["descespaco"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - (<?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) </td>
                            </tr>
                            <tr>
                                <th class="product-name">Data da Inscrição</th>
                                <td class="product-name"><?php echo formatDateHour($value1["dtinsc"]); ?></td>
                            </tr> 
                             <tr>
                                <th class="product-name">Laudo ?</th>
                                <td class="product-name"><?php if( $value1["laudo"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
                            </tr>      
                            <tr>
                                <th class="product-name">PCD ?</th>
                                <td class="product-name"><?php if( $value1["inscpcd"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">PVS ?</th>
                                <td class="product-name"><?php if( $value1["inscpvs"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
                            </tr>                                                                                                                                                                        
                            <tr <?php echo colorStatus($value1["idinscstatus"]); ?>>
                                <th class="product-name">Status da Inscrição</th>
                                <td class="product-name"><?php echo htmlspecialchars( $value1["descstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">Respons. p/ inscrição</th>
                                <td class="product-name">&nbsp;&nbsp;<?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>                                        

                        </thead>
                        <tbody>
                            
                               
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                    <hr>
                    <?php }else{ ?>

                    <div class="product-big-title-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Não localizamos inscrições para o(a) <?php echo htmlspecialchars( $pessoa["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> CPF: <?php echo formatCpf($pessoa["numcpf"]); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                    
                </div>

                    <div id="payment">
                        <div class="form-row place-order">
                            <input type="submit" value="Imprimir" class="button alt" onclick="window.print()">
                        </div>
                        <div class="clear"></div>
                    </div>              

            </div>
        </div>
    </div>

</section>