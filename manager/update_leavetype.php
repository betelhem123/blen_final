<form action="../includes/update_leavetype.inc.php?lupd=<?php echo $_GET['lupd'];?>", method="POST">

<?php 
require_once '../includes/db.inc.php';

$upd=intval($_GET['lupd']);
$sql = "SELECT * FROM  leave_types WHERE lt_id=".$upd;

$stmt = $conn -> query($sql);
$rowCount = $stmt->num_rows;

echo($rowCount);

if($rowCount > 0)
{
while($rows=$stmt->fetch_assoc())
{               
?> 

<div>
            <label for="leavetype">Department Name:</label>
            <input type="text" name="leavetype" id="leavetype" value="<?php echo $rows['category'];?>">
        </div>
        <div>
            <label for="description">Code:</label>
            <input type="text" name="description" id="description" value="<?php echo $rows['description'];?>">
        </div>
     
</select>
 <?php }
    }?>
        <button type="submit" name="submit">Update</button>
             </form>