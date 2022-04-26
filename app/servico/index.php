<?php

include "./../../protegesessao.php";

include "layout/header.html";



?>

<style>
  

 
 body {
     font-family: 'Open Sans', sans-serif;
 }
 ul {
     margin: 0;
     padding: 0;
     height: 80px;
     border-radius: 3px;
     background-color: #fff;
 }
 .wrapper {
     position: static;
     margin: auto;
     text-align: center;
     margin-top: 2% ; 

 }
 li {
     display: inline-block;
     /* Removes the default space between items */
     width: 150px;
     text-align: center;
 }
 li:hover > a,
 .current > a {
     color: red;
 }
 .current {
     margin-top: -6px;
     border-top: 6px solid red;
     border-bottom: 6px solid red;
 }
 .current::before {
     display: block;
     margin: 0 auto -6px auto;
     width: 0;
     border-top: 6px solid red;
     border-right: 8px solid transparent;
     border-left: 8px solid transparent;
     content: "";
 }
 .a {
     display:block;
     box-sizing: border-box;
     padding-top: 19px;
     height: 80px;
     border-right: thin solid #e0e1db;
     text-decoration: none;
     font-size: 2.375em;
 }
 a,
 a:visited {
     color: #848577;
 }
 li:last-of-type > a {
     border-right-style: none;
 }
 li div {
     margin-top: 5px;
     font-size: 1rem;
 }
</style>


<body>
<div class='wrapper'>
  <ul>
    <li>
      <a class='a' href='voluntario.php'>
        <div>Serviço Extra</div>
      </a>
    </li>
    <li >
      <a class='a' href='gerenciarescala.php'>
        <div>Gerenciar Escalas</div>
      </a>
    </li>
    <li>
      <a  class='a'href='cadastrarservico.php'>
        <div>Cadastrar Escalas</div>
      </a>
    </li>
    <li>
      <a class='a' href='relatoriomensal.php'>
        <div>Relatório Mensal</div>
      </a>
    </li>
   
  </ul>
</div>






</body>