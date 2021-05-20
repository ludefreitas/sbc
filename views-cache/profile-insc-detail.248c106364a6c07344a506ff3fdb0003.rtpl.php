<?php if(!class_exists('Rain\Tpl')){exit;}?>
                <div id="order_review" style="position: relative;">
                    <table class="shop_table">
                        <thead>
                            <tr>
                                <th colspan="2" class="product-name"><h5>Nome: <?php echo htmlspecialchars( $insc["nomepess"], ENT_COMPAT, 'UTF-8', FALSE ); ?> -  <?php echo calcularIdade($insc["dtnasc"]); ?> anos </h5></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="product-name">número para concorrer no sorteio: <span style="font-weight: bold; font-size: 26px;">&nbsp;<?php echo htmlspecialchars( $insc["numsorte"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> </th>
                            </tr>
                            <tr>
                                <th class="product-name">Turma / Temporada</th>
                                <td class="product-name"><?php echo htmlspecialchars( $insc["descturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $insc["desctemporada"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">Horário</th>
                                <td class="product-name"><?php echo htmlspecialchars( $insc["diasemana"], ENT_COMPAT, 'UTF-8', FALSE ); ?> das <?php echo htmlspecialchars( $insc["horainicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $insc["horatermino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">Professor</th>
                                <td class="product-name"><?php echo htmlspecialchars( $insc["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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
                                <th class="product-name">Início previsto das aulas</th>
                                <td class="product-name"><?php echo formatDate($insc["dttermmatricula"]); ?></td>
                            </tr>
                            <tr>
                                <th class="product-name">&nbsp;</th>
                                <td class="product-name">&nbsp;</td>
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