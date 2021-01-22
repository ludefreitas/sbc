<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Cursos Esportivos SBC</h2>
                            <p>
                                O Programa “Hora do Treino” oferece cursos de iniciação esportiva, direcionados às crianças e adolescentes, com idade entre 7 e 17 anos, e compreende a iniciação esportiva nas modalidades de futsal, vôlei, basquete, handebol, judô, karatê, badminton entre outros.

                                Para o público adulto, a partir dos 18 anos de idade, as atividades desenvolvidas através do Programa “Corpo em Ação” compreendem a ginástica, dança, alongamento, yoga, tai chi chuan, pilates, zumba, ritmos, entre outras atividades para adultos e idosos.

                                Elogiado pela comunidade, o PELC - Programa Esporte e Lazer da Cidade, também estará presente nos Centros Esportivos da cidade, oferecendo diferentes oficinas relacionadas tanto à prática de atividade física quanto atividades relacionadas aos demais conteúdos do lazer, tais como artesanato, dança, capoeira, dentre outros.
                            </p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/cursosesportivossbc" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.youtube.com/CursosEsportivosSbc" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="https://www.instagram.com/cursosesportivossbc/" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>

                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Navegação </h2>
                        <ul>
                            <li><a href="#">Minha Conta</a></li>
                            <li><a href="#">Minha Família</a></li>
                            <li><a href="/profile/insc">Minhas Inscrições</a></li>
                        </ul>                        
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Temporada</h2>
                        <ul>
                            <?php require $this->checkTemplate("temporada-menu");?>                            
                        </ul>                        
                    </div>
                </div>
                <!--
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Faixa Etária</h2>
                        <ul>
                            <?php require $this->checkTemplate("faixaetaria-menu");?>                            
                        </ul>                        
                    </div>
                </div>
                -->

                <div class="col-md-3 col-sm-6">
                     <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Modalidades</h2>
                        <ul>
                            <?php require $this->checkTemplate("modalidade-menu");?>    
                        
                        </ul>                        
                    </div>
                </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Crec´s</h2>
                        <ul>
                            <?php require $this->checkTemplate("local-menu");?>                            
                        </ul>                        
                    </div>
                </div>
                
                <!--
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Espaço</h2>
                        <ul>
                            <?php require $this->checkTemplate("espaco-menu");?>                            
                        </ul>                        
                    </div>
                </div>
                -->
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2017 Cursos Esportivos SBC. <a href="http://www.cursosesportivossbc.com.br" target="_blank">cursosesportivossbc.com.br</a> - 
                         <a href="#">Politicas de Privacidade e Termos de Uso</a></p> 
                    </div>
                </div>
                
                
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="res/site/js/owl.carousel.min.js"></script>
    <script src="res/site/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="res/site/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="res/site/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="res/site/js/bxslider.min.js"></script>
	<script type="text/javascript" src="res/site/js/script.slider.js"></script>
  </body>
</html>