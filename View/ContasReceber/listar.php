<?php
    include "Conexao.php";
    include "../../Classes/ContasReceber.php";
    include "../../DAO/ContasReceberDAO.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR</title>
</head>
<body>
    <h2>Lista de Contas a Receber</h2>
    <hr/>
    <table class="ms-classic3-main" style="width: 77%">
        <tr>
            <td class="ms-classic3-tl" style="width: 209px">Documento</td>
            <td class="ms-classic3-top" style="width: 165px">Valor</td>
            <td class="ms-classic3-top" style="width: 160px">Status</td>
            <td class="ms-classic3-top" style="width: 66px">Opções</td>
        </tr>
        <?php
            $CR = new ContasReceber();
            $CRDAO = new ContasReceberDAO();
            $query = $CRDAO->ShowContasReceber($CR);
            while($reg = $query->fetch_array()){
        ?>
                <tr>
                    <td class="ms-classic3-left" style="width:209px">
                        <?=$reg["documento_contasreceber"];?></td>
                    <td class="ms-classic3-even" style="width: 165px">
                        <?=$reg["valor_contasreceber"];?></td>
                    <td class="ms-classic3-even" style="width: 160px">
                        <?=$reg["status_contasreceber"];?></td>
                    <td class="ms-classic3-even" style="width: 66px">
                        <a href="atualizar.php?ID=<?=$reg["id_contasreceber"];?>">
                            <img alt="" height="16" src="imagens/editar.png" width="16" class="style1" border="0">
                        </a>
                        <a href="apagar.php?ID=<?=$reg["id_contasreceber"];?>">
                            <img alt="" height="16" src="imagens/apagar.png" width="16" class="style1" border="0">
                        </a>
                    </td>
                </tr>
        <?php } ?>
</table>
