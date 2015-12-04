 <?php
include("dbaseconnection.php");
require_once("auth.php");

 $id=$_SESSION['SESS_MEMBER_ID'];
						 $sql=mysql_query("select labname from lablist where id='$id'");
						 $row=mysql_fetch_row($sql);
						 $lname=$row[0];
$tname=$_POST['tname'];

$tname = strtoupper($tname);

$sql=mysql_query("SELECT id,tname,rate from testnames where tname LIKE '%" . $tname . "%' And labname='$lname' ");
echo'<div class="table-wrapper">
								<table>
									<thead>
		
										<tr style="background:rgba(200, 244, 200, 0.95);">
											<th style="text-align:center;">Test Name</th>
											<th style="text-align:center;">Rate</th>
											<th style="text-align:center;">Click and change</th>
										</tr>
									</thead>
									<tbody>';

while($row = mysql_fetch_row($sql))
	{echo'<tr style="border-bottom:3px dashed white;">
		<td style="text-align:center;">'.$row[1].'</td>
		<td style="text-align:center;">Rs '.$row[2].'</td>
		<td style="text-align:center;"><a class="button small" href="changerate.php?id='.$row[0].'">Select</a></td>
	</tr >';}
									 										
								echo'	</tbody>
									
								</table>
							</div>';
		
		
		
		
	





?>