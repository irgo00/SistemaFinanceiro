<?php
    include "Conexao.php";
    include "../../Classes/ContasReceber.php";
    include "../../DAO/ContasReceberDAO.php";

    $CR = new ContasReceber();
    $CR->setId_contasreceber($_GET["ID"]);
    $CR->setCliente_contasreceber($CR->getCliente_contasreceber());

    $CRDAO = new ContasReceberDAO();    

    if (isset($_GET['atualizar'])){
        $CR->setDocumento_contasreceber($_POST['txtDocumento']);
        $CR->setValor_contasreceber($_POST['txtValor']);
        $CR->setCliente_contasreceber($_POST['cbCliente']);
        $CR->setVencimento_contasreceber($_POST['txtData']);
        $CR->setStatus_contasreceber($_POST['txtStatus']);

        if ($CRDAO->UpdateContasReceber($CR)){
            echo "<script>alert('Conta a receber, atualizada com succeso!');</script>";
        }
    }

    $CRDAO->ShowContasReceber($CR);
?>
<head>
</head>
<body>
    <h2>Atualizar contas a receber</h2>
    <hr/>

    <form action="atualizar.php?atualizar&ID=<?=$_GET["ID"];?>" method="post">
        <table style="width: 100%" class="ms-classic3-main">
            <tr>
                <td style="width: 136px" class="ms-classic3-tl">Documento:</td>
                <td class="ms-classic3-top">
                    <input name="txtDocumento" value="<?=$CR->getDocumento_contasreceber();?>" style="width: 292px" type="text" />
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Valor:</td>
                <td class="ms-classic3-even">
                    <input name="txtValor" value="<?=$CR->getValor_contasreceber();?>" style="width: 292px" type="text" />
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Fornecedor:</td>
                <td class="ms-classic3-even">
                    <select name="cbCliente">
                        <?php
                            foreach($CRDAO->ShowClientes($CR) as $exibir){
                                echo $exibir;
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Data de Vencimento:</td>
                <td class="ms-classic3-even">
                    <input name="txtData" value="<?=$CR->getVencimento_contasreceber();?>" style="width: 127px" type="text" />
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Status:</td>
                <td class="ms-classic3-even">
                    <input name="txtStatus" value="<?=$CR->getStatus_contasreceber();?>"
                        style="width: 127px" type="text" /> (Sim/Não)
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left"> </td>
                <td class="ms-classic3-even">
                    <input name="btCadastrar" type="submit" value="Atualizar" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>