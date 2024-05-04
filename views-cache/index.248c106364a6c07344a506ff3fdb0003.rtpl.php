<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">


  let paginaAnterior = document.referrer
  
  if(paginaAnterior == 'http://www.cursosesportivos.com.br/forgot-site'){

    alert( 'Você já está logado(a)!. \nEscolha um local, uma modalidade e faça já a sua inscrição.' )

  } 

  function poupAgendaNatacaoBaetao() {

    document.getElementById('baetaopopup').hidden = false

  }  

  function poupAgendaNatacaoPauliceia() {

    document.getElementById('pauliceiapopup').hidden = false

  }  

  function irAgendaNatacaoPauliceia() {

    window.location.href = "http://www.cursosesportivos.com.br/calendariopauliceia/21"
  }  

  function irAgendaNatacaoBaetao() {

    window.location.href = "http://www.cursosesportivos.com.br/calendariobaetao/3"
  }  
     

  function imageNone() {

    document.getElementById('popup').hidden = true 
  }

   let ajax = new XMLHttpRequest();
    ajax.open('GET', 'url'); 
    $.ajax({
        statusCode: {
          500: function() {
            //window.location.href ="/admin";
            alert('Limite de usuários online excedido! TENTE NOVAMENTE MAIS TARDE!');

            document.location.href ="/redirecionando";
            //alert('Página não encontrada');
          } 
        }
    });
    
    // let ajax = new XMLHttpRequest();
    ajax.open('GET', 'url'); 
    $.ajax({
        statusCode: {
          505: function() {
            //window.location.href ="/admin";
            alert('Limite de usuários online excedido! TENTE NOVAMENTE MAIS TARDE!');
            document.location.href ="/redirecionando";
            //alert('Página não encontrada');
          } 
        }
    });


    /*
    alert('As turmas do PELC, como por exemplo, Ballet; Ritmos; Yoga; Capoeira; e Artesanato, terão seu início a partir da primeira quinzena de MARÇO/2023! ');
    */

    /*
    alert('Já está aberta a agenda para a natação espontânea no Baetão para o mês de janeiro/2023. A natação espontânea é somente para munícipes maiores de 18 anos e neste mês de janeiro acontece de Terça a Sexta-feira das 09:00 às 11:00 e das 14:00 às 16:00. Aproveitem!!!'); 
    */
  
  function msgPelc(){

  confirm('As Turmas do PELC e da ZUMBA serão disponibilizadas a partir de 1º de fevereiro de 2023. A inscrição será aqui mesmo neste site! ')
  
  }

/*
function msgProjetoSinais(){
  if (window.confirm('A Secretaria de Esporte e Lazer em parceria com o Ministério da Cidadania, vai realizar em 2023 o Projeto SINAIS, promovendo atividades físicas, esportivas, culturais e de lazer para crianças, jovens, adultos e idosos com deficiência auditiva. Se você tem interesse em participar, clique em "OK" e você será direcionado para prenecher o formulário de participação.'))
   {
   window.open('https://forms.gle/TYLx4pi91nWyw9ej7', '_blank');
   };
}
*/

/*
  function msgProjetoSinais(){
  if (window.confirm('Para maiores informações sobre o Projeto Sinais, que desenvolve esportes e aulas de libras para surdos, entre em contato pelo Whatsapp. Clique em "OK" e você será direcionado para o whatsapp, onde irá conversar com um dos nossos atendentes. Digite sua mensagem, e no app clique em enviar msg.'))
   {
   window.open('https://wa.me/+5511912672403?text=Olá!', '_blank');
   };
}
*/


function leiamais(){
  var pontos = document.getElementById("pontos");
  var maisTexto = document.getElementById("mais");
  var btnLeiaMais = document.getElementById("btnLeiaMais");

  if(pontos.style.display === "none"){
    pontos.style.display="inline";
    maisTexto.style.display="none";
    btnLeiaMais.innerHTML="Leia Mais";    
  }else{
    pontos.style.display="none";
    maisTexto.style.display="inline";
    btnLeiaMais.innerHTML="Leia menos";
  }
}

</script>

<style type="text/css">
  #mais{
    display: none;
  }

  #pauliceiapopup{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 216px;
    padding: 0px; 
    background-color: lightgray;
  }

  #baetaopopup{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 216px;
    padding: 0px; 
    background-color: lightgray;
  }

  #popupimage{
    position: fixed;
    top: 0; 
    bottom: 0;
    left: 0; 
    right: 0;
    margin: auto;
    width: 300px;
    height: 180px;
    padding: 0px;
    border: solid 1px #4c4d4f;
    background: #ccc;    
  }
 
</style>

 <div class="container" style="margin-top: 0px;"> <!-- container 1 -->
            <div class="row"> <!-- row 2 -->
              <div class="col-md-8" style="text-align-last: left; background-color: white; margin: 0px 0px 0px 0px;">

<div class="container" style="margin: 0px 0px 0px 0px; ">
<?php if( $profileMsg != '' ){ ?>
    <div class="alert alert-success">
      <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  

  <?php if( $error != '' ){ ?>
    <div class="alert alert-danger">
      <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </div>
  <?php } ?>
  </div><!--
  <a style="color: darkblue; text-align-last: center; font-size: 12px" href="https://www.saobernardo.sp.gov.br/documents/1136654/1245027/Edital+NM/42aa453e-2d70-8651-96e5-41d2d779d24c">Resolução SESP Nº 004 de 28 de outubro de 2021. </a>
  <hr>
  -->
  
  <!--
  <span style="font-size 12px;"> Dúvidas, sugestões e reclamações: </span>
  
           <strong style="font-size 16px; color: darkorange">contato@cursosesportivossbc.com.br</strong> 
 -->



     <span style="color: black; text-align-last: center; font-weight: bold;font-style: italic; font-style: italic; font-size: 12px;"> Dúvidas, sugestões e reclamações: </span> &nbsp;
                          
        <a href="https://wa.me/551126307421?text=Olá,%20Cursos%20Esportivos%20SBC! " target="_blank"><i class="fa fa-whatsapp" aria-hidden="true" style="background-color: white; color: green; font-size: 32px;">

          <span style="color: darkorange; text-align-last: center; font-weight: bold;font-style: italic; font-style: italic; font-size: 16px;">Cursos Esportivos SBC no whatsapp</span>
          </i>
                        
        </a>                                       

<hr style="background-color: #0f71b3;">
  <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 

           
           </div>

     
       <div style="text-align: justify; line-height: 20px; color: blue; font-size: 14px; font-style: italic; margin: 0px 5px 0px 5px; ">     
       <?php if( checkLogin(false) ){ ?>  

       Olá <span style="color: blue; font-weight: bold;">  <?php echo getUserName(); ?>, </span>seja bem vindo! <br><br>
        <?php }else{ ?>

       <span style="color: blue; font-weight: bold;">Olá </span>
       <span style="color: black; font-weight: bold;">  <?php echo getUserName(); ?>, </span>
       <span style="color: blue; font-weight: bold;">seja bem vindo!</span> <br><br>

        <?php } ?>
        
       <span>
           <u>Cursos Esportivos 2024 </u>
           <br><br>
           
           <span style="color: red">(Atualizado 21/12/2023)</span>

        <br><br>

        A Secretaria de Esportes e Lazer inicia no dia <b>15 de janeiro de 2024</b>, as inscrições para os Cursos Esportivos dos Programas “Hora do Treino” e “Corpo em Ação” que promovem atividade física para todas as idades, a partir de atividades orientadas pelos profissionais de Educação Física da Secretaria de Esportes, nos Centros Esportivos da Cidade.
        </span><span id="pontos">...</span>
 
        <span id="mais">
        <br><br>
        O <b>Programa “Hora do Treino”</b> oferece cursos de iniciação esportiva, direcionados às crianças e adolescentes, com idade entre 7 e 17 anos, e compreende a iniciação esportiva nas modalidades de futsal, vôlei, basquete, handebol, judô, ginástica rítmica, ginástica artística, natação entre outros.
        <br><br>

        Para o público adulto, a partir dos 18 anos de idade, as atividades desenvolvidas pelo <b>Programa “Corpo em Ação”</b> compreendem a hidroginástica, natação, dança fitness, alongamento, yoga, tai chi chuan, pilates, ginástica funcional, entre outras atividades para adultos e idosos.
        <br><br>   

        Um dos destaques do Programa Corpo em Ação é o Projeto <b>Perca o Medo de Nadar</b>, que promove a aprendizagem da natação para pessoas que tem medo de entrar na água. O projeto tem sido muito bem avaliado pelos participantes, e neste primeiro semestre, serão disponibilizadas 400 vagas para início dia 22 de janeiro.
        <br><br>   

        <b>A participação nos cursos é totalmente gratuita</b>, porém, as vagas são limitadas, sendo preenchidas por ordem de inscrição, respeitando o limite de 01 (uma) vaga/modalidade por pessoa, durante o período de 15 de janeiro à 14 de fevereiro de 2024. Caso às vagas não sejam preenchidas, a partir de 15 de fevereiro, será permitida a inscrição em uma segunda modalidade.
        <br><br> 
        
        A resolução que disciplina o processo de inscrições prevê a reserva de 30% das vagas para atendimento prioritário às pessoas com deficiência, laudo médico ou em vulnerabilidade social.
        
        <br><br> 

        As inscrições devem ser realizadas somente pelo site: <a href="https://cursosesportivossbc.com"> www.cursosesportivossbc.com </a>e o interessado deve fazer o seu cadastro, com seus dados pessoais, e depois escolher uma turma de interesse. O serviço é destinado apenas a moradores de São Bernardo do Campo.
        <br><br>  

        Maiores informações pelos whatsapp (11) 2630-7415, ou (11) 2630-7421, ou pelos telefones: 2630-7419, 2630-7420 ou 2630-7433 na Secretaria de Esportes e Lazer, Seção de Educação e Formação Esportiva.         

        Participe! Pratique atividade física!
        <br><br> 

        <span>

          Edital que regulamenta o proceesso de inscrições: 
          <a href="https://www.saobernardo.sp.gov.br/documents/1136654/1807257/Inscri%C3%A7%C3%B5es+2024/0812eb93-95c5-b325-ea0a-60b5ca9c4c28" style="color: darkgreen;"> Clique aqui </a> 
        </span>

        <br><br> 
        
        </span> 

        <a onclick="leiamais()" id="btnLeiaMais" class="btn btn-default" style="font-size: 14px; color: red;">Leia mais</a>

       <!--
        Estamos no período de rematricula. As vagas disponíveis são para pessoas já matriculadas e que já fazem aulas em alguma turma de nossos cursos esportivos. Então, quem se inscrever em alguma turma e que NÃO está matriculado e NÃO faz parte de nenhuma turma, irá se inscrever para uma lista de espera, respeitando uma lista de espera já existente com os professores e também a ordem de inscrições feitas a partir de agora.
        -->
        <!--
        O processo de inscrições para o ano de <span style="color: black; font-weight: bold;">2023</span> terá início em <span style="color: black; font-weight: bold;">01 de novembro de 2022.</span> 
        <br><br>

        Nesse primeiro momento, serão oportunizadas as vagas dos cursos esportivos que compõe os Programas <span style="color: black; font-weight: bold;">"Corpo em Ação"</span> e <span style="color: black; font-weight: bold;">"Hora do Treino"</span>, que são ministradas pelos profissionais de Educação Física efetivos do município.<br><br>

        Para o público adulto, a partir dos 18 anos de idade, as atividades desenvolvidas através do <span style="color: black; font-weight: bold;">Programa “Corpo em Ação” </span> compreendem a ginástica, hidroginástica, alongamento, yoga, tai chi chuan, pilates, ginástica funcional, entre outras atividades para adultos e idosos.<br><br>

        O <span style="color: black; font-weight: bold;">Programa “Hora do Treino” </span>oferece cursos de iniciação esportiva, direcionados às crianças e adolescentes, com idade entre 7 e 17 anos, e compreende a iniciação esportiva nas modalidades de futsal, vôlei, basquete, handebol, badminton, natação entre outros.<br><br>

        <span style="color: black; font-weight: bold;">
        Importante: As turmas do PELC (Programa Esporte e Lazer da Cidade) e as aulas de Zumba e Ritmos, serão disponibilizadas apenas a partir de 01 de fevereiro. </span> <br><br>

        Para 2023, não será adotado o critério do sorteio de vagas, conforme resultado de consultas públicas realizadas junto a população, e em conformidade com o previsto na <a href="http://www.saobernardo.sp.gov.br/documents/1136654/1572881/Edital+2023/17c16f83-8a66-f3e6-853b-8561dc1c8ca4" target="_blank"> Resolução 003/2022</a>, as vagas serão preenchidas gradualmente, permitindo inicialmente, apenas a escolha de uma modalidade por pessoa, sendo oportunizado gradualmente o acesso a mais cursos ao longo do ano. <br><br>


        Para participar, você deve se cadastrar no site exclusivo para inscrição, que pode ser acessado clicando <a href="/user-create">aqui.</a>
        <br><br>

        As inscrições, matrícula e participação nas aulas são totalmente gratuitas!
        <br><br>
        Precisa de ajuda? Clique abaixo no botão "Ajuda" e veja os vídeos explicativos para realizar sua inscrição:<br>
        
        -->
      </div>
  </div> 

  
 
  <hr style="background-color: #0f71b3;">

  <div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-12" style="border: 5px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif;"> 
    
      <div style="text-align-last: center; font-weight: bold; line-height: 15px; color: #0f71b3; font-size: 10px; font-style: italic; margin: 0px 5px 0px 5px; ">                                               
          CLIQUE EM UM DOS BOTÕES ABAIXO PARA SELECIONAR UMA TURMA POR LOCAL, OU UMA MODALIDADE PARA PRATICAR, OU AINDA SELECIONE UM LOCAL PARA PRÁTICA DA NATAÇÃO ESPONTÂNEA.
      </div>
   
  </div> 

  </div>
  <hr style="background-color: #0f71b3;">
  
  <!--
  
  <div class="container">
    <div class="row"> 
     
      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
                   
                      
                    <h5>                 
                    
                    <a  href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; margin: 5px; padding-top: 20px; padding-bottom: 20px; font-size: 18px; width: 180px; text-align: center;" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h5>

      <?php } ?>
      
            
    </div> 
  </div> 
  
  -->


<!--

  <div class="container"> 
    <div class="row">
     
      <?php $counter1=-1;  if( isset($locais) && ( is_array($locais) || $locais instanceof Traversable ) && sizeof($locais) ) foreach( $locais as $key1 => $value1 ){ $counter1++; ?>
            
                   
                      
                    <h5>                 
                    
                    <a  href="/modalidades/local/<?php echo htmlspecialchars( $value1["idlocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn" style="background-color: #0f71b3; color: white; font-weight: bold; justify-content: flex-end; margin: 5px; padding-top: 20px; padding-bottom: 20px; font-size: 18px; width: 150px; text-align: center;" ><?php echo htmlspecialchars( $value1["apelidolocal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h5>

      <?php } ?>
      
            
    </div> 
  </div> 
-->



  <div class="container"> 
    <div class="row">    
            
                   
         <div class="col-md-5 btn" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/locais">                          
                <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
                          Cursos por <br> Centro Esportivo
                  </div>
            </a>
        </div>
                  
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
            <a href="/modalidades">           
                  <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
                          Cursos por<br> modalidade
                  </div>
            </a>
        </div> 

        <div class="col-md-5 btn" style="text-align-last: left; background-color: orange ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/eventos">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 18px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          EVENTOS <br> <i  class="fa fa-calendar-alt" style="font-size: 32px;"></i>   
                         
              </div>
            </a>
        </div>  
                                    
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #15a03f; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a onclick="poupAgendaNatacaoBaetao()">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 20px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          Espontâneo <br>
                          Baetão
              </div>
            </a>
        </div> 
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #909090; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a onclick="poupAgendaNatacaoPauliceia()">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 20px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          Espontâneo <br>
                          Crec Paulicéia
              </div>
            </a>
        </div> 
         
        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: orange ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/locaisnatacao-avaliacao">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          Avaliação <br> Natação
                         
              </div>
            </a>
        </div> 

         <div class="col-md-5 btn" style="text-align-last: left; background-color: #ce2c3e ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/atestado-upload">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 18px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          Insira seu ATESTADO<br>
                          (Arquivo em PDF) 
                         
              </div>
            </a>
        </div>

         <!--
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #ce2c3e ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/atestado-upload">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 28px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          Pelc <br>Zumba 
                         
              </div>
            </a>
        </div>
        -->
        
        
        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: royalblue ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/modalidade/22" onclick="msgProjetoSinais()">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          Esporte Para Surdos <br>(Projeto Sinais)
                         
              </div>
            </a>
        </div>
        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/craquesdofuturo">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 18px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                          Projeto Craques do Futuro<br> (Futebol de Campo)
                         
              </div>
            </a>
        </div>
        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: olivedrab ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/enderecolocais">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                        Endereços  <br>  <i  class="fa fa-map-marker" style="font-size: 32px;"></i>   
                         
              </div>
            </a>
        </div>
        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: green ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/transparent">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                        Transparência  <br>  <i  class="fa fa-clipboard" style="font-size: 32px;"></i>   
                         
              </div>
            </a>
        </div> 

        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/judo">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                        Inscreva-se <br> para Judô 
              </div>
            </a>
        </div> 

        <div class="col-md-5 btn" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/taekwondo">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                        Inscreva-se <br> para Taekwondo 
              </div>
            </a>
        </div> 
      
        <!--
        <div class="col-md-5 btn" style="text-align-last: left; background-color: #ff5d95 ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/zumba">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 24px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                        Inscreva-se <br> para Zumba 
              </div>
            </a>
        </div> 
      -->
        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: orange ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="/tutorial">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 28px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                        Ajuda  <br>  <i  class="fa fa-info-circle" style="font-size: 32px;"></i>   
                         
              </div>
            </a>
        </div>      
        
        <div class="col-md-5 btn" style="text-align-last: left; background-color: royalblue ; border: 5px white; margin: 0px 5px 5px 5px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
            <a href="#">                          
              <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 22px; font-style: normal; margin: 10px 5px 10px 0px; ">                          
                        Seja voluntário <br> do Esporte  <br>  <i class="fas fa-handshake" style="font-size: 32px;"></i>   
                         
              </div>
            </a>
        </div> 
        
        
    </div> 
  </div> 

<hr style="background-color: #0f71b3;">

<!--
<div class="row" style="margin: -5px -5px -5px -5px; ">   
  <div class="col-md-6 btn" style="text-align-last: left; background-color: #0f71b3; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
    <a href="/locais">                          
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 0px; ">                                               
          Turmas por local
      </div>
    </a>
  </div>
  
  <div class="col-md-6" style="text-align-last: left; background-color: #cc5d1e; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;"> 
    <a href="/modalidades">           
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 5px; ">                                               
          Turmas por modalidades
      </div>
    </a>
  </div> 
-->
<!--
  <div class="col-md-4" style="text-align-last: left; background-color: #909090; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">
    <a href="/">    
      <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14px; font-style: normal; margin: 10px 5px 10px 5px;  ">                                               
          Todas turmas
      </div>
    </a>
  </div>

-->
<!--
  </div>

  <div class="row" style="margin: -5px -5px -5px -5px; ">   
    <div class="col-md-12" style="text-align-last: left; background-color: green; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
      <a href="/locaisnatacao">                          
        <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 0px; ">                          
            Agendar Natação Espontânea
        </div>
      </a>
    </div>
  </div>
  <div class="row" style="margin: -5px -5px -5px -5px; ">   
    <div class="col-md-12" style="text-align-last: left; background-color: lightcoral; border: 5px white; margin: 0px 0px 10px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center; border-radius: 15px;">  
      <a href="#">                          
        <div style="text-align-last: center; font-weight: 600; line-height: 30px; color: white; font-size: 14sx; font-style: normal; margin: 10px 5px 10px 0px; ">                          
            Cursos Especiais (NATAÇÃO)
        </div>
      </a>
    </div>
  </div>
-->
  </div> <!-- final da index -->

<!--
              <div class="col-md-4" style="text-align-last: center; background-color: white; margin: 0px 0px 15px 0px ">

                <div class="container">
                  <div class="row estruturaAcessos">

                     <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #0f71b3; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                          <i class="fas fa-walking"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                         Eventos Esportivos
                      </div>
                    </div>     

                     <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #909090; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                         <i class="fas fa-swimmer"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">

                         Cursos Esportivos

                      </div>
                    </div> 
                    <a href="/modalidades">    
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #cc5d1e; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                         <i class="fas fa-trophy"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Modalidades
                      </div></a>
                    </div> 

                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #15a03f; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                         <i class="fas fa-futbol"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Campos de Futebol
                      </div>
                    </div> 
                    <a href="/locais">        
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #ce2c3e; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-warehouse"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Crec's
                      </div>
                      </a>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #0f71b3; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-bicycle"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Lazer
                      </div>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #909090; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-handshake"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Parceiros
                      </div>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #cc5d1e; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-user-plus"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-family: 'Open Sans'; f ">                         
                         Melhor Idade
                      </div>
                    </div>     
                    <div class="col-md-12" col-sm-1 style="text-align-last: left; background-color: #15a03f; margin: 15px 0px 0px;  line-height: 20px; font-family: 'Helvetica Neue', Helvetica, Arial,sans-serif; text-align: center;">
                      <div style="text-align-last: center; font-weight: 900; font-size: 60px; color: white; margin: 5px;">
                      
                         <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div style="text-align-last: center; font-weight: 600; line-height: 20px; color: white; font-size: 14px; font-style: normal; margin: 5px; ">
                                               
                         Mapas
                      </div>
                    </div>         
                    
                    
                  </div> -->
                </div>

              </div>

                     <!--
        <div id="popup" style="text-align-last: center; border-radius: 15px"> 
                <div style="text-align-last: right; font-weight: bold; " onclick="imageNone()"> x &nbsp;&nbsp;</div>  
                <div style="background-color: lightgreen; text-align: justify; border-radius: 15px 15px 15px 15px; padding: 10px; font-size: 13px; font-weight: bold;">
                    <span style="color: red;"> ATENÇÃO! </span><br>
                        LEMRAMOS que: Se você já fez uma inscrição, sua PRIMEIRA OPÇÃO, para a temporada 2024 e está matriculado(a), ou está aguardando matrícula, ou ainda está na lista de espera. Você deve aguardar até o dia 15/02 para fazer uma nova inscrição, sua SEGUNDA OPÇÃO, para as vagas remanescentes. 
                </div> 
                
           </div>
  
        -->
        
        <div hidden id="pauliceiapopup" style="text-align-last: center; border-radius: 15px"> 
                <div style="text-align-last: right; font-weight: bold; color: red; " onclick="irAgendaNatacaoPauliceia()"> Fechar ( x ) &nbsp;&nbsp;</div>  
                <div style="background-color: lightblue; text-align: justify; border-radius: 15px 15px 0px 0px; padding: 10px; font-size: 13px; font-weight: bold;">
                    <span style="color: red;"> ATENÇÃO! </span><br>
                    Você já pode inserir, aqui mesmo em nosso site, seu ATESTADO MÉDICO clínico e/ou dermatológico em formato PDF. O atestado ficará disponível para que o seu professor o valide e para que, depois de validado, você possa praticar suas atividades físicas com segurança em nossos Centros , Esportivos. 
                        LEMRAMOS que: alunos de hidroginástica, natação, natação espontânea e avaliação para a natação deverão, OBRIGATÓRIAMENTE, inserir o atestado CLÍNICO E DERMATOLÓGICO.
                </div> 
                <div style="text-align: center;">
                    <div  class="btn btn-info" style="border-radius: 0px 0px 15px 15px; width: 300px">
                     <a href="/atestado-upload" style="color: white;" > Inserir Atestado PDF </a>
                    </div>   
                </div>  
             <!-- <img src="\res\site\img\insc2024detail.jpg" onclick="imageNone()"> -->
            
            </div>  
           
           <div hidden id="baetaopopup" style="text-align-last: center; border-radius: 15px"> 
                <div style="text-align-last: right; font-weight: bold; color: red; " onclick="irAgendaNatacaoBaetao()"> Fechar ( x )&nbsp;&nbsp;</div>  
                <div style="background-color: lightblue; text-align: justify; border-radius: 15px 15px 0px 0px; padding: 10px; font-size: 13px; font-weight: bold;">
                    <span style="color: red;"> ATENÇÃO! </span><br>
                    Você já pode inserir, aqui mesmo em nosso site, seu ATESTADO MÉDICO clínico e/ou dermatológico em formato PDF. O atestado ficará disponível para que o seu professor o valide e para que, depois de validado, você possa praticar suas atividades físicas com segurança em nossos Centros , Esportivos. 
                        LEMRAMOS que: alunos de hidroginástica, natação, natação espontânea e avaliação para a natação deverão, OBRIGATÓRIAMENTE, inserir o atestado CLÍNICO E DERMATOLÓGICO.
                </div> 
                <div style="text-align: center;">
                    <div  class="btn btn-info" style="border-radius: 0px 0px 15px 15px; width: 300px">
                     <a href="/atestado-upload" style="color: white;" > Inserir Atestado PDF </a>
                    </div>   
                </div>   
           
                <!-- <img src="\res\site\img\insc2024detail.jpg" onclick="imageNone()"> -->
            
            </div> 
            