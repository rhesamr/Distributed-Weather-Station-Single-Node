<?php 
    // Start MySQL Connection
    include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
* {
  box-sizing: border-box;
}

body {
  font-family: Trebuchet MS, Helvetica, sans-serif;
}

/* Header/Blog Title */
.header {
  background-image: url("https://upload.wikimedia.org/wikipedia/en/thumb/f/f5/KIT_symbol_logo.jpg/220px-KIT_symbol_logo.jpg");
  background-repeat: no-repeat;
  background-position: left top;
  background-attachment: scroll;
  background-size: contain;
  text-align: center;
  font-size: 35px;
  padding: 20px;
  color: black;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: black;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  background-color: #2222;
  padding: 10px;
  text-align: center;
  color: black;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
  
  .table_titles, .table_cells_odd, .table_cells_even {
    padding-right: 20px;
    padding-left: 20px;
    color: #000;
  }
  .table_titles {
     color: #FFF;
     background-color: #666;
  }
  
  .table_cells {
      background-color: #CCC;
  }
}
</style>
</head>
<body>

<div class="header">
  <h1>Weather Station</h1>
<p id="time"></p>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
var timestamp = '<?=time();?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
</div>

<div class="topnav">
  <a href="history.php">History</a>
</div>

<div class="row">
  <h2>Last Weather Update</h2>
</div>

<table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td class="table_titles">Date and Time</td>
            <td class="table_titles">Rain Status</td>
            <td class="table_titles">Temperature</td>
            <td class="table_titles">Humidity</td>
            <td class="table_titles">Pressure</td>
          </tr>
<?php


    // Retrieve all records and display them
    $result = mysqli_query($con, "SELECT * FROM data ORDER BY id DESC LIMIT 1");

    // process every record
    while( $row = mysqli_fetch_array($result) )
    {
            $css_class=' class="table_cells"'; 

        echo '<tr>';
        echo '   <td'.$css_class.'>'.$row["date"].'</td>';
        echo '   <td'.$css_class.'>'.$row["rainstatus"].'</td>';
        echo '   <td'.$css_class.'>'.$row["temperature"].'</td>';
        echo '   <td'.$css_class.'>'.$row["humidity"].'</td>';
        echo '   <td'.$css_class.'>'.$row["pressure"].'</td>';
        echo '</tr>';
    }
?>
    </table>

<div class="footer">
  <p>Copyright &copy; 2020 by the Elixir Team</p>
  <p>Contact information: <a href="mailto:someone@example.com">
  rhesamr@gmail.com</a>, <a href="mailto:someone@example.com">
  johannesfelix@outlook.com</a>, <a href="mailto:someone@example.com">
  eeds020799@yahoo.com</a>.</p>
</div>

</body>
</html>
