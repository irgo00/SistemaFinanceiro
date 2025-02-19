<?php
    include "../Conexao.php";
    include "../Classes/ContasPagar.php";
    include "../DAO/ContasPagarDAO.php";

    $CP = new ContasPagar();
    $CP->setId_contaspagar($_GET["ID"]);
    $CP->setFornecedor_contaspagar($CP->getFornecedor_contaspagar());

    $CPDAO = new ContasPagarDAO();    

    if (isset($_GET['atualizar'])){
        $CP->setDocumento_contaspagar($_POST['txtDocumento']);
        $CP->setValor_contaspagar($_POST['txtValor']);
        $CP->setFornecedor_contaspagar($_POST['cbFornecedor']);
        $CP->setVencimento_contaspagar($_POST['txtData']);
        $CP->setStatus_contaspagar($_POST['txtStatus']);

        if ($CPDAO->UpdateContasPagar($CP)){
            echo "<script>alert('Conta a pagar, atualizada com succeso!');</script>";
        }
    }

    $CPDAO->ShowContasPagar($CP);
?>
<head>
</head>
<body>
    <h2>Atualizar contas a pagar</h2>
    <hr/>

    <form action="atualizar.php?atualizar&ID=<?=$_GET["ID"];?>" method="post">
        <table style="width: 100%" class="ms-classic3-main">
            <tr>
                <td style="width: 136px" class="ms-classic3-tl">Documento:</td>
                <td class="ms-classic3-top">
                    <input name="txtDocumento" value="<?=$CP->getDocumento_contaspagar();?>" style="width: 292px" type="text" />
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Valor:</td>
                <td class="ms-classic3-even">
                    <input name="txtValor" value="<?=$CP->getValor_contaspagar();?>" style="width: 292px" type="text" />
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Fornecedor:</td>
                <td class="ms-classic3-even">
                    <select name="cbFornecedor">
                        <?php
                            foreach($CPDAO->ShowFornecedores($CP) as $exibir){
                                echo $exibir;
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Data de Vencimento:</td>
                <td class="ms-classic3-even">
                    <input name="txtData" value="<?=$CP->getVencimento_contaspagar();?>" style="width: 127px" type="text" />
                </td>
            </tr>
            <tr>
                <td style="width: 136px" class="ms-classic3-left">Status:</td>
                <td class="ms-classic3-even">
                    <input name="txtStatus" value="<?=$CP->getStatus_contaspagar();?>"
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