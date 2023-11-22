<?php 

use \Sbc\Model\User;
use \Sbc\Model\Saude;
use \Sbc\DB\Sql;
use \Sbc\Model\Temporada;
use \Sbc\Model\Insc;
use \Sbc\Model\Turma;
use \Sbc\Model\Agenda;
use \Sbc\Model\Pessoa;
use \Sbc\Model\Local;

function numeroNaListaDePresençaByIdturmaData($idturma, $ano, $mes, $dia){

    $data = ''.$ano.'-'.$mes.'-'.$dia;

    $numeroListaDePresenca = new Insc();
    $numeroListaDePresenca = Insc::getCountNumeroNaListaDePresençaByIdturmaData($idturma, $data);

    $numeroListaDePresenca = (int)$numeroListaDePresenca[0]["count(*)"];    

    if($numeroListaDePresenca <= 0){
        return 0;
    }else{
         return 1;       
    }    
}

function PegaInscByModalidadeByCpf($numcpf, $idtemporada, $idmodal, $idlocal){

    $InscByModalidadeByCpf = new Insc();
    $InscByModalidadeByCpf = (int)Insc::InscByModalidadeByCpf($numcpf, $idtemporada, $idmodal, $idlocal);
    if($InscByModalidadeByCpf > 0){
        return true;
    }else{
        return false;
    }
    
}

function repostaSimParq($idpess){

    $saude = new Saude();
    $pessoa = new Pessoa();

    $pessoa->get((int)$idpess);

    $saude->getParqUltimoByIdPess($idpess);

    $questaoum = $saude->getquestaoum();
    $questaodois = $saude->getquestaodois();
    $questaotres = $saude->getquestaotres();
    $questaoquatro = $saude->getquestaoquatro();
    $questaocinco = $saude->getquestaocinco();
    $questaoseis = $saude->getquestaoseis();
    $questaosete = $saude->getquestaosete();

    if($questaoum == 1 OR $questaodois == 1 OR $questaotres == 1 OR $questaoquatro == 1 OR $questaocinco == 1 OR $questaoseis == 1 OR $questaosete == 1){

        return true;
    }else{
        return false;
    }
}

function existeParq($idpess){


    $existeparq = Saude::getCountParqByIdPess($idpess);
    
    if($existeparq > 0){
        return true;
    }else{
        return false;
    }   
}

function getAtestadoIcone($idpess){
    $saude = new Saude();
    $atestado = $saude->getCountAtestadoByIdPess($idpess);
     $html = [];
    if($atestado > 0){ 
        array_push($html, '<span style="color: darkgreen;">Clínico</span><i style="font-size: 12px; color: darkorange" class="fa fa-check"></i>'
            );                          
    }else{
        array_push($html, '[Clínico]'
            );
    }
    return $html[0];
}

function getAtestadoDermaIcone($idpess){
    $saude = new Saude();
    $atestado = $saude->getCountAtestadoDermaByIdPess($idpess);
     $html = [];
    if($atestado > 0){ 
        array_push($html, '<span style="color: darkgreen;">Dermato</span><i style="font-size: 12px; color: darkorange" class="fa fa-check"></i>'
            );                          
    }else{
        array_push($html, '[Dermato]'
            );
    }
    return $html[0];
}

function getAtestadoIconeByNumCpf($numcpf){
    $saude = new Saude();
    $atestado = $saude->getCountAtestadoByNumcpf($numcpf);
    $validade = $saude->getAtestadoUltimoByNumcpf($numcpf);

    $hoje = date('Y-m-d');
    $validade = $validade[0]['datavalidade'];
    
    $html = [];
    if($atestado > 0){
        if($hoje > $validade){
            array_push($html, '<span style="color: darkgreen;">Atestado</span>&nbsp;<i style="font-size: 12px; color: red" class="fa fa-question-circle"></i>'
            );                          
        }else{
            array_push($html, '<span style="color: darkgreen;">Atestado</span><i style="font-size: 12px; color: darkorange" class="fa fa-check"></i>'
            );                          
        } 
        
    }else{
        array_push($html, '[Atestado]'
            );
    }
    return $html[0];
}

function getDefTea($idpess){
    $saude = new Saude();
    $doenca = $saude->getDeficienciaByidpess($idpess);
    if($doenca[0]['deftea'] == 1){
        return 'Pessoa com TEA';
    }else{
        return '';
    }    
}

function getDefAutismo($idpess){
    $saude = new Saude();
    $doenca = $saude->getDeficienciaByidpess($idpess);
    if($doenca[0]['defautismo'] == 1){
        return 'Autista';
    }else{
        return '';
    }    
}

function getDefFisica($idpess){
    $saude = new Saude();
    $doenca = $saude->getDeficienciaByidpess($idpess);
    if($doenca[0]['deffisica'] == 1){
        return 'Deficiente Físico';
    }else{
        return '';
    }    
}

function getDefAuditiva($idpess){
    $saude = new Saude();
    $doenca = $saude->getDeficienciaByidpess($idpess);
    if($doenca[0]['defauditiva'] == 1){
        return 'Deficiente Auditivo';
    }else{
        return '';
    }    
}

function getDefIntelectual($idpess){
    $saude = new Saude();
    $doenca = $saude->getDeficienciaByidpess($idpess);
    if($doenca[0]['defintelectual'] == 1){
        return 'Deficiente Intelectual';
    }else{
        return '';
    }    
}

function getDefVisual($idpess){
    $saude = new Saude();
    $doenca = $saude->getDeficienciaByidpess($idpess);
    if($doenca[0]['defvisual'] == 1){
        return 'Deficiente Visual';
    }else{
        return '';
    }    
}


function getCidDoenca($idpess){
    $saude = new Saude();
    $doenca = $saude->getDoencaByidpess($idpess);
    if($doenca){
        return $doenca[0]['doenca'];
    }else{
        return '';
    }    
}

function getCid($idpess){
    $saude = new Saude();
    $doenca = $saude->getDoencaByidpess($idpess);
    if($doenca){
        return $doenca[0]['codigo'];
    }else{
        return '';
    }    
}

function vagasPubGeralMenosInscPubGeral($idtemporada, $idturma){
    $vagasPubGeral = Turma::getVagasByIdTurma($idturma);
    $numinscPublicoGeral = Insc::getNumInscPublicoGeralValidaTurmaTemporada($idtemporada, $idturma);
    return ($vagasPubGeral - $numinscPublicoGeral);
}

function vagasPubLaudoMenosInscPubLaudo($idtemporada, $idturma){
    $vagasPubLaudo = Turma::getVagasLaudoByIdTurma($idturma);
    $numinscPublicoLaudo = Insc::getNumInscPublicoLaudoValidaTurmaTemporada($idtemporada, $idturma);
    return ($vagasPubLaudo - $numinscPublicoLaudo);
}

function vagasPubPcdMenosInscPubPcd($idtemporada, $idturma){
    $vagasPubPcd = Turma::getVagasPcdByIdTurma($idturma);
    $numinscPublicoPcd = Insc::getNumInscPublicoPcdValidaTurmaTemporada($idtemporada, $idturma);
    return ($vagasPubPcd - $numinscPublicoPcd);
}

function vagasPubPvsMenosInscPubPvs($idtemporada, $idturma){
    $vagasPubPvs = Turma::getVagasPvsByIdTurma($idturma);
    $numinscPublicoPvs = Insc::getNumInscPublicoPvsValidaTurmaTemporada($idtemporada, $idturma);
    return ($vagasPubPvs - $numinscPublicoPvs);
}

function naoHaVagasPubGeral($idtemporada, $idturma){
    $vagasPubGeral = Turma::getVagasByIdTurma($idturma);
    $numinscPublicoGeral = Insc::getNumInscPublicoGeralValidaTurmaTemporada($idtemporada, $idturma);
    if($numinscPublicoGeral >= $vagasPubGeral){
        return true;
    }else{
        return false;
    }   
}

function naoHaVagasPubLaudo($idtemporada, $idturma){
    $vagasPubLaudo = Turma::getVagasLaudoByIdTurma($idturma);
    $numinscPublicoLaudo = Insc::getNumInscPublicoLaudoValidaTurmaTemporada($idtemporada, $idturma);
    if($numinscPublicoLaudo >= $vagasPubLaudo){
        return true;
    }else{
        return false;
    }   
}

function naoHaVagasPubPcd($idtemporada, $idturma){
    $vagasPubPcd = Turma::getVagasPcdByIdTurma($idturma);
    $numinscPublicoPcd = Insc::getNumInscPublicoPcdValidaTurmaTemporada($idtemporada, $idturma);
    if($numinscPublicoPcd >= $vagasPubPcd){
        return true;
    }else{
        return false;
    }   
}

function naoHaVagasPubPvs($idtemporada, $idturma){
    $vagasPubPvs = Turma::getVagasPvsByIdTurma($idturma);
    $numinscPublicoPvs = Insc::getNumInscPublicoPvsValidaTurmaTemporada($idtemporada, $idturma);
    if($numinscPublicoPvs >= $vagasPubPvs){
        return true;
    }else{
        return false;
    }   
}

function vagasTotaisListaEsperaGeral($vagas, $idmodal){
    if($idmodal == 25){
        $vagastotais = round($vagas * 0.5);
    }else{
        $vagastotais = round($vagas * 0.2);
    }
    return $vagastotais;
}

function vagasTotaisListaEsperaLaudo($vagaslaudo, $idmodal){
    if($idmodal == 25){
        $vagastotais = round($vagaslaudo * 0.5);
    }else{
        $vagastotais = round($vagaslaudo * 0.2);
    }    
    return $vagastotais;
}

function vagasTotaisListaEsperaPcd($vagaspcd, $idmodal){
     if($idmodal == 25){
        $vagastotais = round($vagaslaudo * 0.5);
    }else{
        $vagastotais = round($vagaslaudo * 0.2);
    }    
    return $vagastotais;
}

function vagasTotaisListaEsperaPvs($vagaspvs, $idmodal){
    if($idmodal == 25){
        $vagastotais = round($vagaspvs * 0.5);   
    }else{
        $vagastotais = round($vagaspvs * 0.2);
    }
    
    return $vagastotais;
}

function naoHaVagasListaEsperaPubGeral($idtemporada, $idturma, $idmodal, $idturmastatus){
    $vagasListaEsperaPubGeral = Turma::getVagasByIdTurma($idturma);
    if($idturmastatus == 6){
        if($idmodal == 25){
            $vagasListaEsperaPubGeral = round($vagasListaEsperaPubGeral * 1.5); 
        }else{
            $vagasListaEsperaPubGeral = round($vagasListaEsperaPubGeral * 1.2); 
        }
    }else{
        if($idmodal == 25){
            $vagasListaEsperaPubGeral = round($vagasListaEsperaPubGeral * 0.5); 
        }else{
            $vagasListaEsperaPubGeral = round($vagasListaEsperaPubGeral * 0.2); 
        }
    }
    $numinscListaEsperaPublicoGeral = Insc::getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma);
    if($numinscListaEsperaPublicoGeral > $vagasListaEsperaPubGeral){
        return true;
    }else{
        return false;
    }   
}

function naoHaVagasListaEsperaPubLaudo($idtemporada, $idturma, $idmodal, $idturmastatus){
    $vagasListaEsperaPubLaudo = Turma::getVagasLaudoByIdTurma($idturma);
    if($idturmastatus == 6){
        if($idmodal == 25){
            $vagasListaEsperaPubLaudo = round($vagasListaEsperaPubLaudo * 1.5); 
        }else{
            $vagasListaEsperaPubLaudo = round($vagasListaEsperaPubLaudo * 1.2); 
        }
    }else{
        if($idmodal == 25){
            $vagasListaEsperaPubLaudo = round($vagasListaEsperaPubLaudo * 0.5); 
        }else{
            $vagasListaEsperaPubLaudo = round($vagasListaEsperaPubLaudo * 0.2); 
        }
    }
    $numinscListaEsperaPublicoLaudo = Insc::getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma);
    if($numinscListaEsperaPublicoLaudo > $vagasListaEsperaPubLaudo){
        return true;
    }else{
        return false;
    }   
}

function naoHaVagasListaEsperaPubPcd($idtemporada, $idturma, $idmodal, $idturmastatus){
    $vagasListaEsperaPubPcd = Turma::getVagasPcdByIdTurma($idturma);
    if($idturmastatus == 6){
        if($idmodal == 25){
            $vagasListaEsperaPubPcd = round($vagasListaEsperaPubPcd * 1.5); 
        }else{
            $vagasListaEsperaPubPcd = round($vagasListaEsperaPubPcd * 1.2); 
        }
    }else{
        if($idmodal == 25){
            $vagasListaEsperaPubPcd = round($vagasListaEsperaPubPcd * 0.5); 
        }else{
            $vagasListaEsperaPubPcd = round($vagasListaEsperaPubPcd * 0.2); 
        }
    }
    $numinscListaEsperaPublicoPcd = Insc::getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma);
    if($numinscListaEsperaPublicoPcd > $vagasListaEsperaPubPcd){
        return true;
    }else{
        return false;
    }   
}

function naoHaVagasListaEsperaPubPvs($idtemporada, $idturma, $idmodal, $idturmastatus){
    $vagasListaEsperaPubPvs = Turma::getVagasPvsByIdTurma($idturma);
    if($idturmastatus == 6){
        if($idmodal == 25){
            $vagasListaEsperaPubPvs = round($vagasListaEsperaPubPvs * 1.5); 
        }else{
            $vagasListaEsperaPubPvs = round($vagasListaEsperaPubPvs * 1.2); 
        }
    }else{
        if($idmodal == 25){
            $vagasListaEsperaPubPvs = round($vagasListaEsperaPubPvs * 0.5); 
        }else{
            $vagasListaEsperaPubPvs = round($vagasListaEsperaPubPvs * 0.2); 
        }
    }
    
    $numinscListaEsperaPublicoPvs = Insc::getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma);
    if($numinscListaEsperaPublicoPvs > $vagasListaEsperaPubPvs){
        return true;
    }else{
        return false;
    }   
}

function vagasListaEsperaPubGeralMenosInscPubGeral($idtemporada, $idturma, $idmodal){
    $vagasListaEsperaPubGeral = Turma::getVagasByIdTurma($idturma);
    if($idmodal == 25){
        $vagasListaEsperaPubGeral = round($vagasListaEsperaPubGeral * 0.5);
    }else{
        $vagasListaEsperaPubGeral = round($vagasListaEsperaPubGeral * 0.2);
    }    
    $numinscListaEsperaPublicoGeral = Insc::getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma);
    return ($vagasListaEsperaPubGeral - $numinscListaEsperaPublicoGeral);
}

function vagasListaEsperaPubLaudoMenosInscPubLaudo($idtemporada, $idturma, $idmodal){
    $vagasListaEsperaPubLaudo = Turma::getVagasLaudoByIdTurma($idturma);
    if($idmodal == 25){
        $vagasListaEsperaPubLaudo = round($vagasListaEsperaPubLaudo * 0.5);  
    }else{
        $vagasListaEsperaPubLaudo = round($vagasListaEsperaPubLaudo * 0.2);
    }    
    $numinscListaEsperaPublicoLaudo = Insc::getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma);
    return ($vagasListaEsperaPubLaudo - $numinscListaEsperaPublicoLaudo);
}

function vagasListaEsperaPubPcdMenosInscPubPcd($idtemporada, $idturma, $idmodal){
    $vagasListaEsperaPubPcd = Turma::getVagasPcdByIdTurma($idturma);
    if($idmodal == 25){
        $vagasListaEsperaPubPcd = round($vagasListaEsperaPubPcd * 0.5);  
    }else{
        $vagasListaEsperaPubPcd = round($vagasListaEsperaPubPcd * 0.2);
    }
    $numinscListaEsperaPublicoPcd = Insc::getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma);
    return ($vagasListaEsperaPubPcd - $numinscListaEsperaPublicoPcd);
}

function vagasListaEsperaPubPvsMenosInscPubPvs($idtemporada, $idturma, $idmodal){
    $vagasListaEsperaPubPvs = Turma::getVagasPvsByIdTurma($idturma);
    if($idmodal == 25){
        $vagasListaEsperaPubPvs = round($vagasListaEsperaPubPvs * 0.5);   
    }else{
        $vagasListaEsperaPubPvs = round($vagasListaEsperaPubPvs * 0.2);
    }
    
    $numinscListaEsperaPublicoPvs = Insc::getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma);
    return ($vagasListaEsperaPubPvs - $numinscListaEsperaPublicoPvs);
}

function getNumInscPublicoGeralMatriculadaEAguardandoTurmaTemporada($idtemporada, $idturma){

    $numinscPublicoGeral = new Insc();
    $numinscPublicoGeral = Insc::getNumInscPublicoGeralValidaTurmaTemporada($idtemporada, $idturma);
    return $numinscPublicoGeral;
}

function getNumInscPublicoLaudoMatriculadaEAguardandoTurmaTemporada($idtemporada, $idturma){

    $numinscPublicoLaudo = new Insc();
    $numinscPublicoLaudo = Insc::getNumInscPublicoLaudoValidaTurmaTemporada($idtemporada, $idturma);
    return $numinscPublicoLaudo;
}

function getNumInscPublicoPcdMatriculadaEAguardandoTurmaTemporada($idtemporada, $idturma){

    $numinscPublicoPcd = new Insc();
    $numinscPublicoPcd = Insc::getNumInscPublicoPcdValidaTurmaTemporada($idtemporada, $idturma);
    return $numinscPublicoPcd;
}

function getNumInscPublicoPvsMatriculadaEAguardandoTurmaTemporada($idtemporada, $idturma){

    $numinscPublicoPvs = new Insc();
    $numinscPublicoPvs = Insc::getNumInscPublicoPvsValidaTurmaTemporada($idtemporada, $idturma);
    return $numinscPublicoPvs;
}


function getNumInscMatriculadaTurmaTemporada($idtemporada, $idturma){

    $numinscmatriculada = new Insc();
    $numinscmatriculada = Insc::getNumInscMatriculadaTurmaTemporada($idtemporada, $idturma);
    return $numinscmatriculada;
}

function getNumInscAguardandoMatriculaTurmaTemporada($idtemporada, $idturma){

    $numinscaguardando = new Insc();
    $numinscaguardando = Insc::getNumInscAguardandoMatriculaTurmaTemporada($idtemporada, $idturma);
    return $numinscaguardando;
}

function getNumInscListaEsperaTurmaTemporada($idtemporada, $idturma){

    $numinsclistaespera = new Insc();
    $numinsclistaespera = Insc::getNumInscListaEsperaTurmaTemporada($idtemporada, $idturma);
    return $numinsclistaespera;
}

function getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma){

    $numinsclistaesperaPubGeral = new Insc();
    $numinsclistaesperaPubGeral = Insc::getNumInscListaEsperaPubGeralTurmaTemporada($idtemporada, $idturma);
    return $numinsclistaesperaPubGeral;
}

function getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma){

    $numinsclistaesperaPubLaudo = new Insc();
    $numinsclistaesperaPubLaudo = Insc::getNumInscListaEsperaPubLaudoTurmaTemporada($idtemporada, $idturma);
    return $numinsclistaesperaPubLaudo;
}

function getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma){

    $numinsclistaesperaPubPcd = new Insc();
    $numinsclistaesperaPubPcd = Insc::getNumInscListaEsperaPubPcdTurmaTemporada($idtemporada, $idturma);
    return $numinsclistaesperaPubPcd;
}

function getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma){

    $numinsclistaesperaPubPvs = new Insc();
    $numinsclistaesperaPubPvs = Insc::getNumInscListaEsperaPubPvsTurmaTemporada($idtemporada, $idturma);
    return $numinsclistaesperaPubPvs;
}

function getUserNameById($iduser){

    $user = new User();

    $nome = $user->getUserNameById($iduser);

    return $nome[0]['desperson'];

}

function agendaPorDataIdHoraDiaSemana($data, $idlocal, $idhoradiasemana){

    $agenda = new Agenda();

    $qtdAgendamento = $agenda->contaQtdAgendamPorDataEIdHora($data, $idlocal, $idhoradiasemana);

    $numeroDeVagas = $agenda->getNumeroDeVagas($idhoradiasemana);

    return ($numeroDeVagas[0]['vagas'] - $qtdAgendamento[0]['count(*)']);

}

function vagasIdHorasemana($idhoradiasemana){

    $agenda = new Agenda();

    $numeroDeVagas = $agenda->getNumeroDeVagas($idhoradiasemana);

    return $numeroDeVagas[0]['vagas'];

}

function usuariosOnline(){

    $userOnline = User::pega_totalUsuariosOnline();
    return $userOnline;
}

function usuariosVisitantes(){

    $visitOnline = User::pega_totalVisitantesOnline();
    return $visitOnline;
}

function todosInscricoes($desctemporada){

    $todosUsuarios = new Insc();
    $todosUsuarios = Insc::getInscGeralDesctemporada($desctemporada);
    return $todosUsuarios;
}

function todosInscricoesValidas($desctemporada){

    $todosUsuarios = new Insc();
    $todosUsuarios = Insc::getInscGeralDesctemporadaValidas($desctemporada);
    return $todosUsuarios;
}

function MatriculadosDesctemporada($desctemporada){

    $todosMatriculados = new Insc();
    $todosMatriculados = (int)Insc::numMatriculadosDescTemporada($desctemporada);
    return $todosMatriculados;
}

function pegaInscTemporadaModalidade($desctemporada, $idmodal){

    $InscTemporadaModalidade = new Insc();
    $InscTemporadaModalidade = (int)Insc::getInscTemporadaModalidade($desctemporada, $idmodal);
    return $InscTemporadaModalidade;
}

function pegaSomaVagasByTurmaIdmodal($desctemporada, $idmodal){

    $SomaVagasByTurmaIdmodal = new Turma();
    $SomaVagasByTurmaIdmodal = (int)Turma::getSomaVagasByTurmaIdmodal($desctemporada, $idmodal);
    return $SomaVagasByTurmaIdmodal;
}

function pegaSomaVagasByDescTemporada($desctemporada){

    $SomaVagasByTemporada = new Turma();
    $SomaVagasByTemporada = (int)Turma::getSomaVagasByDescTemporada($desctemporada);
    return $SomaVagasByTemporada;
}

function NumAlunosPresentesPorData(){

    date_default_timezone_set('America/Sao_Paulo');    
    $diaHoje = date('Y-m-d'); 

    $alunosPresentesPorData = new Insc();
    $alunosPresentesPorData = (int)Insc::getAlunosPresentesPorData($diaHoje);
    return $alunosPresentesPorData;
}

function NumAlunosAusentesPorData(){

    date_default_timezone_set('America/Sao_Paulo');    
    $diaHoje = date('Y-m-d');  

    $alunosAusentesPorData = new Insc();
    $alunosAusentesPorData = (int)Insc::getAlunosAusentesPorData($diaHoje);
    return $alunosAusentesPorData;
}

function NumAlunosJustificadosPorData(){

    date_default_timezone_set('America/Sao_Paulo');    
    $diaHoje = date('Y-m-d');  

    $alunosJustificadosPorData = new Insc();
    $alunosJustificadosPorData = (int)Insc::getAlunosJustificadosPorData($diaHoje);
    return $alunosJustificadosPorData;
}

function temTokenPorTurmaCpf($idturma, $numcpf){

    $html = [];

    array_push($html, '<input type="text" name="tokencpf" value="" placeholder="Insira aqui o TOKEN"/>'
                        
    );

    if(Turma::temtokenCpf($idturma, $numcpf)){

        return $html[0];
    }    
}

function statusPresenca($dia, $mes, $idinsc, $idturma, $idtemporada)
{
    $statusPresenca = new Insc();
    $statusPresenca = Insc::getStatusPresencaByIdinscIdturmaIdtemporada($dia, $mes, $idinsc, $idturma, $idtemporada);

    if($statusPresenca == 0){
        return '<span style="color: red;">F</span>';
    }
    if($statusPresenca == 1){
        return '<span style="color: black;">P</span>';
    }
    if($statusPresenca == 2){
        return '<span style="color: blue;">J</span>';
    }
    if($statusPresenca == 4){
        return '-';
    }
    
}

function ControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada)
{
    $controleAnoAnt = new Temporada();
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    return $controleAnoAnt;
}

function ControleFrequenciaJan($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleJan = new Temporada();    
    $controleJan = Temporada::listAllTurmaTemporadaControleFrequenciaJan($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 1){
        return 0;
    }else{
       return $controleJan + $controleAnoAnt; 
    }
}

function ControleFrequenciaFev($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleFev = new Temporada();    
    $controleFev = Temporada::listAllTurmaTemporadaControleFrequenciaFev($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 2){
        return 0;
    }else{
       return $controleFev + $controleAnoAnt; 
    }
}

function ControleFrequenciaMar($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleMar = new Temporada();    
    $controleMar = Temporada::listAllTurmaTemporadaControleFrequenciaMar($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 3){
        return 0;
    }else{
       return $controleMar + $controleAnoAnt; 
    }
}

function ControleFrequenciaAbr($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleAbr = new Temporada();    
    $controleAbr = Temporada::listAllTurmaTemporadaControleFrequenciaAbr($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 4){
        return 0;
    }else{
       return $controleAbr + $controleAnoAnt; 
    }
}

function ControleFrequenciaMai($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleMai = new Temporada();    
    $controleMai = Temporada::listAllTurmaTemporadaControleFrequenciaMai($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 5){
        return 0;
    }else{
       return $controleMai + $controleAnoAnt; 
    }
}

function ControleFrequenciaJun($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');    
    $controleJun = new Temporada();    
    $controleJun = Temporada::listAllTurmaTemporadaControleFrequenciaJun($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 6){
        return 0;
    }else{
       return $controleJun + $controleAnoAnt; 
    }
    
}

function ControleFrequenciaJul($idturma, $idtemporada, $desctemporada)
{   
    $data = date('m'); 
    $controleJul = new Temporada();    
    $controleJul = Temporada::listAllTurmaTemporadaControleFrequenciaJul($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 7){
        return 0;
    }else{
       return $controleJul + $controleAnoAnt; 
    }
}

function ControleFrequenciaAgo($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleAgo = new Temporada();    
    $controleAgo = Temporada::listAllTurmaTemporadaControleFrequenciaAgo($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 8){
        return 0;
    }else{
       return $controleAgo + $controleAnoAnt; 
    }
}

function ControleFrequenciaSet($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleSet = new Temporada();    
    $controleSet = Temporada::listAllTurmaTemporadaControleFrequenciaSet($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 9){
        return 0;
    }else{
       return $controleSet + $controleAnoAnt; 
    }
}

function ControleFrequenciaOut($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleOut = new Temporada();    
    $controleOut = Temporada::listAllTurmaTemporadaControleFrequenciaOut($idturma, $idtemporada, $desctemporada);    
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 10){
        return 0;
    }else{
       return $controleOut + $controleAnoAnt; 
    }
}

function ControleFrequenciaNov($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleNov = new Temporada();    
    $controleNov = Temporada::listAllTurmaTemporadaControleFrequenciaNov($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 11){
        return 0;
    }else{
       return $controleNov + $controleAnoAnt; 
    }
}

/*
function ControleFrequenciaDez($idturma, $idtemporada, $desctemporada)
{    
    $data = date('m');
    $controleDez = new Temporada();    
    $controleDez = Temporada::listAllTurmaTemporadaControleFrequenciaDez($idturma, $idtemporada, $desctemporada);
    $controleAnoAnt = new Temporada();    
    $controleAnoAnt = Temporada::listAllTurmaTemporadaControleFrequenciaAnoAnt($idturma, $idtemporada, $desctemporada);
    if($data < 12){
        return 0;
    }else{
       return $controleDez + $controleAnoAnt; 
    }
}
*/

function formatar_mascara($src, $mascara) {
  $campo = $src.value.length;
  $saida = $mascara.substring(0,1);
  $texto = $mascara.substring($campo);
 if($texto.substring(0,1) != $saida) {
 $src += $texto.substring(0,1);
 }
}

function colorStatus($idinscstatus){

    if($idinscstatus === '1'){
       return 'style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), transparent);"';
    }else if($idinscstatus === '2'){
       return 'style="background: linear-gradient(to bottom, rgba(0, 255, 0, 0.4), transparent);"'; 
    }else if($idinscstatus === '3'){
       return 'style="background: linear-gradient(to bottom, rgba( 96, 96, 192, 0.4), transparent);"'; 
    }else if($idinscstatus === '6'){
       return 'style="background: linear-gradient(to bottom, rgba(0, 0, 255, 0.4), transparent);"';    
    }else if($idinscstatus === '7'){       
       return 'style="background: linear-gradient(to bottom, rgba(0, 192, 255, 0.4), transparent);"';     
    }else if($idinscstatus === '8'){
       return 'style="background: linear-gradient(to bottom, rgba(192, 192, 192, 0.4), transparent);"'; 
    }else if($idinscstatus === '9'){
       return 'style="background: linear-gradient(to bottom, rgba(255, 0, 0, 0.4), transparent);"'; 
    }   
}

function formatCpf($cpf){

    $cpf1 = substr($cpf, 0, 4);
    $cpf2 = substr($cpf, 11, 11);

    return $cpf1."###.###".$cpf2;
}

function formatDateEng($date)
{

    return date('dd/mm/YYYY', strtotime($date));

}


function formatDate($date)
{

	return date('d/m/Y', strtotime($date));

}

function formatDateHour($dateHour)
{

    return date('d/m/Y H:i:s', strtotime($dateHour));

}

function formatAnoInicial($initIdade)
{
    $anoAtual = date('Y');

    $anoInicial = $anoAtual - $initIdade;

    return $anoInicial;
}

function formatAnoFinal($fimIdade)
{
    $anoAtual = date('Y');

    $AnoFinal = $anoAtual - $fimIdade;

    return $AnoFinal;
}

function checkLogin($inadmin = true)
{

	return User::checkLogin($inadmin);

}

function getUserName()
{

	$user = User::getFromSession();

	return $user->getdesperson();

}

function getUserIsEstagiario()
{
    $user = User::getFromSession();

    $html = [];

    array_push($html, '<li class="nav-item">
                            <a href="/prof-estagiario" class="nav-link">
                              <span class="text-white" style="font-weight: bold"> 
                                Estagiário
                              </span>
                            </a>
                        </li>'
                    );

    if ($user->getisestagiario() == 1){
        return $html[0];
    }
}

function getUserIsProf()
{
    $user = User::getFromSession();

    $html = [];

    array_push($html, '<li class="nav-item">
                            <a href="/prof" class="nav-link">
                              <span class="text-white" style="font-weight: bold"> 
                                Professor
                              </span>
                            </a>
                        </li>'
                    );

    if ($user->getisprof() == 1){
        return $html[0];
    }
}

function getUserIsAudi()
{
    $user = User::getFromSession();

    $html = [];

    array_push($html, '<li class="nav-item">
                            <a href="/admin-audi" class="nav-link">
                              <span class="text-white" style="font-weight: bold">
                                Admin/dados
                              </span>
                            </a>
                        </li>'
                    );

    if ($user->getisaudi() == 1){
        return $html[0];
    }
}

function getUserIsAdmin()
{
    $user = User::getFromSession();

    $html = [];

    array_push($html, '<li class="nav-item">
                            <a href="/admin" class="nav-link">
                             <span class="text-white" style="font-weight: bold">
                                Admin
                              </span>
                            </a>
                        </li>'
                    );

    if ($user->getinadmin() == 1){
        return $html[0];
    }
}

function UserIsAdmin()
{
    $user = User::getFromSession();

    if ($user->getinadmin() == 1){
        return true;
    }
}

function UserIsProf()
{
    $user = User::getFromSession();

    if ($user->getisprof() == 1){
        return true;
    }
}

function UserIsEstagiario()
{
    $user = User::getFromSession();

    if ($user->getisestagiario() == 1){
        return true;
    }
}

function UserIsAudi()
{
    $user = User::getFromSession();

    if ($user->getisaudi() == 1){
        return true;
    }
}

function getUserId()
{

    $user = User::getFromSession();

    return $user->getiduser();

}

function calcularIdade($date){
    $time = strtotime($date);
    if($time === false){
      return '';
    }
 
    $year_diff = '';
    $date = date('Y-m-d', $time);
    list($year,$month,$day) = explode('-',$date);
    $year_diff = date('Y') - $year;
    $month_diff = date('m') - $month;
    $day_diff = date('d') - $day;
    if ($day_diff < 0 || $month_diff < 0){
    	$year_diff;
    } 
 
    return $year_diff;

   }

   function idadeCerta($idade, $initIdade, $fimIdade){

        if(($idade <= $initIdade) || ($idade <= $fimIdade)){

            return false;

       }else{

            return true;
       }
    }

    function getApelidoLocalById($idlocal){

        $local = new Local();

        $apelido = $local->getApelidoLocalById($idlocal);

        return $apelido[0]['apelidolocal'];

    }


 ?>