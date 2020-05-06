

<html>
<head>

<style type="text/css">
<!--.Style4 {font-size: 12px}-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="420" border="0">
    <tr>
      <td width="169"><label>
      </label></td>
      
        
    </tr>
  
    
    <tr>
      <td colspan="2"><label>
       
        <input name="ajouter" type="submit" id="ajouter" value="Ajouter" />
        <input name="Modifier" type="submit" id="Modifier" value="Modifier" />
        <input name="supprimer" type="submit" id="supprimer" value="Supprimer" />
          <input name="vale" type="text" id="vale" size='5' />
      </label></td>
    </tr>
  </table>
  <p> </p>
   
    
</form>
      <?php
    if(isset($_POST['Modifier'])){
      
      header('Location: modifier_produit.php');
    
    }else{
      
    }
    
    if(isset($_POST['supprimer'])){

               
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gest_stock";

try {
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM produits WHERE ID_PRODUIT=".$_POST['vale'];

   

    // execute the query
    $conn->exec($sql);
    
    
    
    
    

    // echo a message to say the UPDATE succeeded
    echo " records DELETE successfully";
    header('Location: Voir_produit.php');
    }

catch(PDOException $e)
    {
    echo 'Please select the row you want to delete';
    }

$conn = null;
    }
    
    ?>
    
    
<?php
require("tableau_produit.php")
?>
 <script>
    var table=document.getElementById('tablau'),rIndex;
    for(var i=0;i<table.rows.length;i++){
        table.rows[i].onclick=function(){
            for(var s=0;s<table.rows.length;s++){
                table.rows[s].style.background='white';
            }
            document.getElementById('vale').value=this.cells[0].innerHTML;
             this.style.background='green';
        }}
    </script>

