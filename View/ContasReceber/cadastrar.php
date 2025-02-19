<?php
    include "Conexao.php";
    include "../../Classes/ContasReceber.php";
    include "../../DAO/ContasReceberDAO.php";

    if (isset($_GET['cadastro'])){
        $CR = new ContasReceber();
        $CR->setDocumento_contasreceber($_POST['txtDocumento']);
        $CR->setValor_contasreceber($_POST['txtValor']);
        $CR->setCliente_contasreceber($_POST['cbCliente']);
        $CR->setVencimento_contasreceber($_POST['txtData']);
        $CR->setStatus_contasreceber("N");

        $CRDAO = new ContasReceberDAO();

        if ($CRDAO->InsertContasReceber($CR)){
            echo "<script>alert('Conta a receber, cadastrada com succeso!');</script>";
            echo "<script>window.location = 'listar.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRAR</title>
</head>
<body>
    <h2>Cadastro de contas a receber</h2>
    <hr/>

    <form action="?cadastro" method="post">
        <table style="width: 100%" class="ms-classic3-main">
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Cliente:</td>
                <td>
                    <select name="cbCliente">
                        <?php
                            $CR = new ContasReceber();
                            $CRDAO = new ContasReceberDAO();
                            foreach($CRDAO->ShowClientes($CR) as $exibir){
                                echo $exibir;
                            }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Documento:</td>
                <td class="ms-classic3-even"><input name="txtDocumento" style="width: 127px" type="text" /></td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Valor:</td>
                <td class="ms-classic3-even"><input name="txtValor" style="width: 127px" type="text" /></td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Data de Vencimento:</td>
                <td class="ms-classic3-even"><input name="txtData" style="width: 127px" type="text" /></td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left"> </td>
                <td class="ms-classic3-even"><input name="btCadastrar" type="submit" value="Cadastrar" /></td> 
            </tr>
        </table>
    </form>
 </body>
 </html>