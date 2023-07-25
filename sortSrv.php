<?php
include '../Controller/Rdv.php';
$conn = config::getConnexion();
?>
<body>

<!-- search form section starts  -->

<section class="search-form">
   <form method="post" action="">
      <input type="text" Name="search_box" placeholder="Search" class="box">
      <button type="submit" Name="search_btn" class="fas fa-search"></button>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css">
   </form>
</section>

<!-- search form section ends -->


<section class="products" style="min-height: 100vh; padding-top:0;">

<div class="box-container">

      <?php
         if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
         $search_box = $_POST['search_box'];
         $select_Srv = $conn->prepare("SELECT * FROM `services` WHERE `couts` LIKE '%{$search_box}%' OR `type` LIKE '%{$search_box}%' OR `mode` LIKE '%{$search_box}%'");
         $select_Srv->execute();
         if($select_Srv->rowCount() > 0){
            while($fetch_Srv = $select_Srv->fetch(PDO::FETCH_ASSOC)){
      ?>
         
         <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Service Type</th>
                                        <th scope="col">Service Mode</th>
                                        <th scope="col">Frequency</th>
                                        <th scope="col">Service Price</th>
                                        <th scope="col">Description</th>
                                        <!-- <th scope="col">Delete</th> -->
                                        <!-- <th scope="col">Update</th> -->
                                        <!-- <th>Update</th> -->
                                        <!-- <th>Delete</th> -->
                                    </tr>
                                    
            <tr>
                <td><?php $fetch_Srv['id_srv']; ?></td>
                <td><?php $fetch_Srv['type']; ?></td>
                <td><?php $fetch_Srv['mode']; ?></td>
                <td><?php $fetch_Srv['freq']; ?></td>
                <td><?php $fetch_Srv['couts']; ?></td>
                <td><?php $fetch_Srv['description']; ?></td>
                <td> 
                </td>

    </table>
      <?php
      
            }
         }else{
            echo '<p class="empty">no such Service is added yet!</p>';
         }
      }

      ?>

   </div>

</section>

</body>
</html>
