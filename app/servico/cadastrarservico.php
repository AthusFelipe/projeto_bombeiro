<?php

include "./../../protegesessao.php"; 


include "header.html";
include "controller.php";  
setlocale(LC_TIME, 'portuguese'); 






?>



<!DOCTYPE html>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm"> <br>
    <form method='POST' action='cadastrarservico.php'>
    <div class='form-group row col-sm-10 form-control'>
     

            <h2>Cadastrar novo serviço</h2>
            <label for='descricao'>Descrição do servico</label>
        <input type='text' name='descricao'><br><br>
        <label for='dataservico'>Data do serviço</label>
        <input type='date' name='dataservico'><br><br>
        <label for='horaservico'>Horário do serviço</label>
        <input type='time' name='horaservico'><br><br>

        <input type='submit' value='Criar'>
        
    </form>
    </div>
    </div>
    <div class="col-sm">
    <table class="table"><br>
  <thead>
      <h2>Serviços cadastrados</h2>
    <tr>
      <th scope="col">HORA</th>
      <th scope="col">DIA</th>
      <th scope="col">SERVIÇO</th>
    </tr>
  </thead>
  <tbody>
   <?= $servico ?>
   
  </tbody>
  
 
    </table>
    Página: 
    <?php  for($i = 1; $i < $numPaginas + 1; $i++) { 
                    echo "<a href='?pagina=$i'>".$i."</a> "; 
                }?>
    </div>
  
   
  </div>
 
</div>



</body>


</html>