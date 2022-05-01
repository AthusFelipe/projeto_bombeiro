<?php


 include "./Controllers/Viaturas.controller.php" ; 


 include "./../../style/header.html";

?>

<!DOCTYPE html>

<style>
 input[type='checkbox'] { display: none; } .wrap-collabsible { margin: 1.2rem 0; } .lbl-toggle { display: block; font-weight: bold; font-family: monospace; font-size: 1.2rem; text-transform: uppercase; text-align: center; padding: 1rem; color: #DDD; background: #0069ff; cursor: pointer; border-radius: 7px; transition: all 0.25s ease-out; } .lbl-toggle:hover { color: #FFF; } .lbl-toggle::before { content: ' '; display: inline-block; border-top: 5px solid transparent; border-bottom: 5px solid transparent; border-left: 5px solid currentColor; vertical-align: middle; margin-right: .7rem; transform: translateY(-2px); transition: transform .2s ease-out; } .toggle:checked+.lbl-toggle::before { transform: rotate(90deg) translateX(-3px); } .collapsible-content { max-height: 0px; overflow: hidden; transition: max-height .25s ease-in-out; } .toggle:checked + .lbl-toggle + .collapsible-content { max-height: 350px; } .toggle:checked+.lbl-toggle { border-bottom-right-radius: 0; border-bottom-left-radius: 0; } .collapsible-content .content-inner { background: rgba(0, 105, 255, .2); border-bottom: 1px solid rgba(0, 105, 255, .45); border-bottom-left-radius: 7px; border-bottom-right-radius: 7px; padding: .5rem 1rem; } .collapsible-content p { margin-bottom: 0; }
    
    
    .imgviaturainformacoes{
        min-width: 100px;
        max-width: 40%;
        height: auto;
        padding: 15px;
    }

    .informacoes-viatura{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content:center;
        gap: 30px;
        align-items: center;
        align-content: center;
    }

    
    </style>


<div class='container'>
<div class='informacoes-viatura'>
     <img class='imgviaturainformacoes flex-item-viatura'src='<?= $viatura->getFotoviatura() ?>'>
     <div class='flex-item-viatura'>
     <h3> <?= $viatura->getNomeviatura() ?> </h3>
     <p>Modelo: <?= $viatura->getModelo()?> </p>
     <p>Placa: <?= $viatura->getPlaca() ?> </p>
     <p>Fabricante: <?=$viatura->getFabricante() ?> </p>
     <p>Combustivel: <?=$viatura->getCombustivel() ?> </p>
     <p> Chassi: <?=$viatura->getChassi() ?> </p>
     <p> Status: <?= $viatura->status() ?> </p>
     <p>Categoria: <?= $viatura->getCategoria() ?> </p></div>
</div>
</div>

    <hr>
    </div>
    <div class="wrap-collabsible " style='max-width:60%;margin: 0 auto;' >
  <input id="collapsible2" class="toggle" type="checkbox" >
  <label for="collapsible2" class="lbl-toggle" style='background-color: green;color:white;border-style:solid;border-color:black;'>Últimos deslocamentos</label>
  <div class="collapsible-content">



    <?= $abastecimentos ?>



    
</div>
</div>




<div class="wrap-collabsible " style='max-width:60%;margin: 0 auto;' >
  <input id="collapsible3" class="toggle" type="checkbox" >
  <label for="collapsible3" class="lbl-toggle" style='background-color: orange;color:white;border-style:solid;border-color:black;'>Últimos abastecimentos</label>
  <div class="collapsible-content">



    <?= $abastecimentos ?>



    
</div>
</div>




<div class="wrap-collabsible " style='max-width:60%;margin: 0 auto;' >
  <input id="collapsible" class="toggle" type="checkbox" >
  <label for="collapsible" class="lbl-toggle" style='background-color: darkblue;color:white;border-style:solid;border-color:black;'>Últimas manutenções</label>
  <div class="collapsible-content">



    <?= $abastecimentos ?>



    
</div>
</div>

