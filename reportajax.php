 <?php
 include("dbaseconnection.php");
 
$phone=$_POST['phone'];
$email=$_POST['email'];


 $sql=mysql_query("select pdf1,pdf2,pdf3,tname,username from dashboard where phone='$phone' and email='$email'order by id DESC");
		$row=mysql_fetch_row($sql);
		$mql=mysql_query("select labname from lablist where username='$row[4]'");
	    $data=mysql_fetch_row($mql);
	for($i=0;$i<3;$i++)
	{		if(!($row[$i]))
		     {$check[$i]="false";
              $row[$i]="#";
              $w[$i]="Empty"; }
			  
		 else{$check[$i]="true";
		 $w[$i]="Open Report";}
		
	}	
	
	if($row[0]!="#"){
 echo'<br />
 <table class="alt">
									
									<tr  style="background:#FFFACD;">
											
											<th style="text-align:center;">Test    :   &nbsp;&nbsp;&nbsp;&nbsp; <span style="color:green;font-size:17px;">'.$row[3].'</span></th>
											<th style="text-align:center;"colspan="2">Lab    :  &nbsp;&nbsp;&nbsp;&nbsp;  <span style="color:green;font-size:17px;">'.$data[0].'</span></th>
										</tr>
										
										<tr >
											<th style="text-align:center;">Report 1</th>
											<th style="text-align:center;">Report 2</th>
											<th style="text-align:center;">Report 3</th>
										</tr>
									
									<tbody>
										<tr>
											<td style="text-align:center;"><img height="20" width="20"src="images/'.$check[0].'.png"></img></td>
											<td style="text-align:center;"><img height="20" width="20"src="images/'.$check[1].'.png"></img></td>
											<td style="text-align:center;"><img height="20" width="20"src="images/'.$check[2].'.png"></img></td>
										</tr>
										<tr>
											<td style="text-align:center;"><a href="'.$row[0].'" class="small button">'.$w[0].'</a></td>
											<td style="text-align:center;"><a href="'.$row[1].'" class="small button">'.$w[1].'</a></td>
											<td style="text-align:center;"><a href="'.$row[2].'" class="small button">'.$w[2].'</a></td>
										</tr>
									</tbody>
									
								</table>
	';}
	
	else{echo'<br /><h3 style="color:green;">Sorry! reports are not ready. <br/>Please try again later.</h3>';}
 
 
 ?>