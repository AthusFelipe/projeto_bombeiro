<?php

include "controller.php";


if (isset($_POST['nomeviatura'])) {

    $nameimg = date("Y.m.d-H.i.s") . $_FILES['fotoviatura']['name'];
    $dir = './imagensviatura/';
    move_uploaded_file($_FILES['fotoviatura']['tmp_name'], $dir . $nameimg);

    $idFotoViatura = $dir . $nameimg;

    $v1 = new Viatura;

    $v1->cadastrarViatura($_POST['nomeviatura']);
    $v1->informacoes($_POST['modeloviatura'], $_POST['placaviatura'], $_POST['marcaviatura'], $_POST['combustivel'], $_POST['chassiviatura'], $_POST['categoriaviatura']);





    $conn->prepare('INSERT INTO viaturascadastro (nomeviatura, statusviatura, fotoviatura) VALUES (?, ?, ?)')
        ->execute([$v1->getNomeviatura(), $v1->getStatus(), $idFotoViatura]);

    $v1->setIdviatura($conn->lastInsertId());


    $conn->prepare('INSERT INTO viaturasinformacao VALUES (?, ?, ?, ?, ?, ?, ?)')
        ->execute([$v1->getIdviatura(), $v1->getModelo(), $v1->getPlaca(), $v1->getFabricante(), $v1->getCombustivel(), $v1->getChassi(), $v1->getCategoria()]);


    if($v1){
        header('location: ./index.php');
    }
}

