<?php

include "controller.php";
//deslocamentos abertos
$buscaDesloc = $conn->query('SELECT * FROM viaturasdeslocamento WHERE kmfinal  = 0 ORDER BY horainicial DESC')->fetchAll(PDO::FETCH_OBJ);


$listaDesloc = ''; 
foreach ($buscaDesloc as $desloc){
$nomevtr = $conn->query("SELECT nomeviatura FROM viaturascadastro WHERE idviaturas = $desloc->idviatura")->fetch(PDO::FETCH_OBJ);
$militarmotorista = $conn->query("SELECT cargo, nomeguerra FROM usuarios WHERE codfunc = $desloc->codfuncmotorista")->fetch(PDO::FETCH_OBJ);
$militarcriador = $conn->query("SELECT cargo, nomeguerra FROM usuarios WHERE codfunc = $desloc->codfunccriador")->fetch(PDO::FETCH_OBJ);
$datatratada = date('d/m H:i', strtotime($desloc->horainicial));




    $listaDesloc .= "
                      <tr>
                      <th>$nomevtr->nomeviatura</th>
                      <th>$militarmotorista->cargo $militarmotorista->nomeguerra</th>
                      <th>$desloc->kminicial</th>
                      <th>$datatratada</th>
                      <th>$desloc->destino</th>
                      <th><a href='editardeslocamento.php?iddeslocamento=$desloc->iddeslocamento'>Finalizar</a></th>
                      </tr>
                        ";



}






include "layout/header.html";
?>



<!DOCTYPE html>
<style>
    .deslocamentosabertos{
        display:grid;
width: fit-content;  




}
    .menu-superior{
        display: inline-flex;
        width: fit-content;
        list-style-type: none;
        
    }
    ul{
        text-align: center;
        padding: 0;
    }
   
    li{
        margin: 0 30px;
        text-align: center;
        align-items: center;
        padding: 0;
        width: fit-content;
    }
    
    .menusuperior{
        text-align: center;
        padding: 0;
        margin: 0;
        align-items: center;
        align-content: center;
        background-color: #bf0000;
        color: white;

    }

    .menutopo {
        align-items: center;
        align-self: center;
        align-content: center;
        text-align: center;
        display: block;
        margin: 10px auto;
        padding: 10px auto;
        max-width: fit-content;
        max-height: fit-content;
        color: black;
        border-style: solid;
        border-color: black;
        border-radius: 5%;
        font-weight: bold;
    }

    .deslocaberto{
        text-align: center;
        background-color: #bf0000;
        margin: 3% 0 0 0 ;
        color: white;
        text-shadow: #bf0000 ;
        font-weight: bold;
    }
    .botao{
        margin: 1%;
    }
    
    </style>
    <div class='botao'>
        <a href='./index.php'><button class='btn btn-danger'>VOLTAR </button></a><br></div>

<div class='menutopo'>

<p class='menusuperior'>Deslocamentos</p>
    <ul>
    <div class='menu-superior'>

        <li><a href='novodeslocamento.php'>Novo deslocamento</a></li>
        <li>Consultar deslocamentos</li>

    </ul>
    </div>
</div>
<div class='deslocamentoabertos '>
<p class='deslocaberto'>DESLOCAMENTOS EM ABERTO</p>

<table class='table'>
    <tr>
        <th>VTR</th>
        <th>MOTORISTA</th>
        <th>KM</th>
        <th>HORÁRIO</th>
        <th>DESTINO</th>
    </tr>
    <tbody>

<?= $listaDesloc ;?>
    </tbody>
</table>



</form>

</div>


</html>
