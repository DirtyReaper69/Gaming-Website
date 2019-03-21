<?php
  $SELECT = "SELECT username,score FROM scoreregister ORDER BY score DESC";
 $conn = new mysqli("localhost", "root", "", "mywt");
  if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }else {
    $result=mysqli_query($conn,$SELECT);

  echo '<html>
        <head>
        <style type="text/css">
        table{
   background: #fff;
}
table,thead,tbody,tfoot,tr, td,th{
  text-align: center;
  margin: auto;
  border:1px solid #dedede;
  padding: 1rem;
  width: 50%;
}
.table    { display: table; width: 50%; }
.tr       { display: table-row;  }
.thead    { display: table-header-group }
.tbody    { display: table-row-group }
.tfoot    { display: table-footer-group }
.col      { display: table-column }
.colgroup { display: table-column-group }
.td, .th   { display: table-cell; width: 50%; }
.caption  { display: table-caption }

.table,
.thead,
.tbody,
.tfoot,
.tr,
.td,
.th{
  text-align: center;
  margin: auto;
  padding: 1rem;
}
.table{
  background: #fff;
  margin: auto;
  border:none;
  padding: 0;
  margin-bottom: 5rem;
}

.th{
  font-weight: 700;
  border:1px solid #dedede;
  &:nth-child(odd){
    border-right:none;
  }
}
.td{
  font-weight: 300;
  border:1px solid #dedede;
  border-top:none;
  &:nth-child(odd){
    border-right:none;
  }
}
body{
  display: table;
  width: 100%;
  background: #dedede;
  text-align: center;
}
*{ 
  -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
  -moz-box-sizing: border-box;    /* Firefox, other Gecko */
  box-sizing: border-box;         /* Opera/IE 8+ */
}

.aa_h2{
  font:100 5rem/1 Roboto;
  text-transform: uppercase;
}
.aa_htmlTable{
  background: tomato;
  padding: 5rem;
  display: table;
  width: 100%;
  height: 100vh;
  vertical-align: middle;
}
</style>
<body>
<div class="aa_htmlTable">
  <h2 class="aa_h2">LEADERBOARD</h2>
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>';
     while ($row=mysqli_fetch_assoc($result))
    {
        print "<tr> <td>";
        echo $row["username"];
        print "</td> <td>";
        echo $row["score"]; 
        print "</td> </tr>";
    }
echo '</tbody>
</table>
</div>
</body>
</html>';
echo '<meta http-equiv = "refresh" content = "7; url= main.html"/>';
}
?>