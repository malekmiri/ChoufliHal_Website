<?php

include_once ('C:\xampp\htdocs\Project\Controller\produitC.php');
$produitC = new produitC();
$list = $produitC->listprod();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of reviews</h1>
        <h2>
            <a href="AjouterProduit.php">Add Product</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
        <th scope="col">#ID</th>
                                        <th scope="col">#nom</th>
                                        <th scope="col">#prix</th>
                                        <th scope="col">#image</th>
                                        <th scope="col">#description</th>
                                 
        </tr>
        <?php
        foreach ($list as $produit) {
        ?>
            <tr>
                                    <td><?= $produit['id']; ?></td>
                <td><?= $produit['nom'];?></td>
                <td><?= $produit['prix'];?></td>
                <td><?= $produit['image']; ?></td>
                <td><?= $produit['description'];?></td>
                
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
