<?php

    if(isset($_POST["export"])) {
        $sql_query = "SELECT * FROM attendance";
        $query = mysqli_query($conn, $sql_query);
        $export .= '
 <table> 
 <tr> 
 <th> id </th>
 <th>firstname</th> 
 <th>lastname</th> 
 <th>dob</th> 
 
 </tr>
 ';
        while( $row=mysqli_fetch_assoc($query))
         {
           $export .= '
 <tr>
 <td>'.$row["id"].'</td> 
 <td>'.$row["userID"].'</td> 
 <td>'.$row["dep_id"].'</td> 
 <td>'.$row["attendanceTime"].'</td> 
 <td>'.$row["timeOfTheDay"].'</td> 
 <td>'.$row["att_Status"].'</td> 
 
 
 </tr>
 ';
}
 $export .= '</table>';
 header('Content-Type: application/xls');
 header('Content-Disposition: attachment; filename=info.xls');
 echo $export;
}

    ?>