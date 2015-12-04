  <?php
include("dbaseconnection.php");


 
$user=$_POST['id'];


$sql=mysql_query("select tname,rate,name,phone,address,counter,id from dashboard where username='$user' order by id DESC");

while($row=mysql_fetch_row($sql))
{
if($row[5]>=0){$rgb="#F4A460";}
else{$rgb="#FFE4B5";}
echo'
 
				    <tr style="background:'.$rgb.';">
                      <td >Name : <span style="color:green;">'.$row[2].'<span></td>
					  <td >Phone no. : <span style="color:green;">'.$row[3].'<span></td>
                      
                    </tr>
               
					<tr style="background:'.$rgb.';">
                      <td >Test : <span style="color:black;">'.$row[0].'<span></td>
					  <td >Rate : <span style="color:green;">Rs '.$row[1].'<span></td>
</tr>
<tr style="background:'.$rgb.';">
                      <td colspan="2">Address : <span style="color:black;">'.$row[4].'<span></td>
					  
</tr>';

$sql6=mysql_query("update dashboard set counter=counter+1 where id='$row[6]'");
}

				




?>