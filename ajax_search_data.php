<?php 

include_once("database_class.php");

$orderData = "";

if(isset($_POST["from_date"], $_POST["to_date"])) {
            
    $query = "SELECT * FROM data WHERE time_stamp BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ORDER BY id desc";
    
    $result = $database->connection->query($query);

    $orderData .='
    <table class="table table-bordered table-striped table-responsive-stack" id="tableOne" >
    <thead class="alert-info">
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>    
    <th>TIME</th>
    </tr></thead>';

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))  
        {
            $orderData .='
            <tr>  
            <td>'.$row["name"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["address"].'</td>  
            <td>'.$row["time_stamp"].'</td>  
            </tr>';  
        }
    }
    else  
    {  
        $orderData .= '  
        <tr>  
        <td colspan="5">No Data Found</td>  
        </tr>';  
    }  
    $orderData .= '</table>';  
    echo $orderData;  

    $_SESSION['from_date'] = $_POST['from_date'];
    $_SESSION['to_date'] = $_POST['to_date'];
}
?>
