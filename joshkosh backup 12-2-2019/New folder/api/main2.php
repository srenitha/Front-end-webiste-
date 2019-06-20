<html>
<head>

<script type="text/javascript">
function AjaxFunction()

{
var httpxml;
try
  {
  Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myarray = JSON.parse(httpxml.responseText);
// Remove the options from 2nd dropdown list 
for(j=document.testform.subcat.options.length-1;j>=0;j--)
{
document.testform.subcat.remove(j);
}


for (i=0;i<myarray.data.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myarray.data[i].subcategory;
optn.value = myarray.data[i].subvenue;  // You can change this to subcategory 
document.testform.subcat.options.add(optn);

} 
      }
    } // end of function stateck
	var url="http://joshtalks.com/joshkosh/api/dd.php";
var cat_id=document.getElementById('s1').value;
url=url+"?cat_id="+cat_id;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
//alert(url);
httpxml.open("GET",url,true);
httpxml.send(null);
  }
</script>
<style>
#s1 {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

#s1 {
  position: relative;
  left:160px;
  top:2%;
  display: inline-block;
}

#s1 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

#s1 {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

#s2 {
  background-color: #4CAF50;
  color: white;
  padding: px;
  font-size: 16px;
  border: none;
}

#s2 {
  position: relative;
   left:160px;
  top:30%;
  display: inline-block;
}

#s2 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

#s2 {
  color: black;
  padding: 16px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}


.button {
  display: inline-block;
  padding: 15px 25px;
  left:116%;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #1c92ff;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
</head>
<body>
<form name="testform" method='POST' >
<!--Name:<input type=text name=fname> -->
<?Php
//require "config.php";// connection to database 

/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 

$database = "joshkosh-final-2018";       // Your database name
$username = "547bf2d76c50";            // Your login userid 
$password = "f02cc545307b5abe";            // Your password 

try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {

}

echo "<br>Select State <select name=cat  id='s1' class='dropdown' onchange=AjaxFunction();>
<option value=''class='dropdown-content'>Select One</option>";

$sql="select * from category "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[cat_id]>$row[category]</option>";
}
?>
</div>
</select>
<br><br/>
<br/><br/>
Select District 
<select name=subcat id='s2'><br/>
<br/>
<option value=''>Select One</option>"<br/>
</select><br><br/>
<br/>

<br/><input type=submit value=submit class=button>
<br/><br/>


<?Php

while (list ($key,$val) = each ($_POST)) {
echo "venue=$val";

} 

?>


</form>



</body>
</html>