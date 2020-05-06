

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
      <td>ID_produit</td>
      <td><label>
        <input name="t_id" type="text" id="t_id" />
      </label></td>
    </tr>
    <tr>
      <td>Nom</td>
      <td><label>
        <input name="t_nom" type="text" id="t_nom" />
      </label></td>
    </tr>
    <tr>
      <td>Prix Unitaire</td>
      <td><label>
        <input name="t_prix" type="text" id="t_prix" />
      </label></td>
    </tr>
    <tr>
      <td>Stock</td>
      <td><input name="t_stock" type="text" id="t_stock" /></td>
    </tr>
    <tr>
      <td colspan="2"><label>
       <input name="Cancel" type="submit" id="Cancel" value="Cancel" />
        <input name="valider" type="submit" id="valider" value="valider" />
        
        
      </label></td>
    </tr>
  </table>
  <p> </p>
    
    
    
</form>
   
    
<?php
require("tableau_produit.php")
?>

<?php
   if(isset($_POST['Cancel'])){
       header('Location: Voir_produit.php');
   } 
    else if(isset($_POST['valider'])){
        
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gest_stock";

try {
    if(isset($_POST['t_nom']) && isset($_POST['t_prix']) && isset($_POST['t_stock']) && isset($_POST['t_id']))
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE produits SET ID_PRODUIT=".$_POST['t_id'].", NOM_PRODUIT='".$_POST['t_nom']."', PRIX_UNITAIRE=".$_POST['t_prix'].", UNITE_STOCK=".$_POST['t_stock']." WHERE ID_PRODUIT=".$_POST['t_id'];

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    
    
    
    
    

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    header('Location: modifier_produit.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
    }
    ?>
