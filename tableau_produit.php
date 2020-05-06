

<?php
echo "<table id='tablau' style='border: solid 1px black;'>";
echo "<tr>
        <th>Id_produit</th>
        <th>Nom_produit</th>
        <th>Prix_unitaire</th>
        <th>Quantite en stok</th>
    </tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gest_stock";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
   

    $stmt = $conn->prepare("SELECT ID_PRODUIT, NOM_PRODUIT, PRIX_UNITAIRE,UNITE_STOCK  FROM produits");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

<script>
    var table=document.getElementById('tablau'),rIndex;
    for(var i=0;i<table.rows.length;i++){
        table.rows[i].onclick=function(){
            //document.getElementById('vale').value=this.cells[0].innerHTML;
            for(var s=0;s<table.rows.length;s++){
                table.rows[s].style.background='white';
            }
             
            this.style.background='green';
            rIndex=this.rowIndex;
            document.getElementById('t_id').value=this.cells[0].innerHTML;
         
            document.getElementById('t_nom').value=this.cells[1].innerHTML;
            document.getElementById('t_prix').value=this.cells[2].innerHTML;
            document.getElementById('t_stock').value=this.cells[3].innerHTML;
           
            
        }
    }
    
</script>
<?php
if(isset($_POST['supprimer'])){

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM produits WHERE ID_PRODUIT=2";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>
