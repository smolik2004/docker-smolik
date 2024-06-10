<!-- put in ./www directory -->

<html>
 <head>
  <title>Hello...</title>

  <!-- <meta charset="utf-8">  -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Hi! I'm happy</h1>


    <?php
    
    $conn = mysqli_connect('db', 'user', 'test', 'myDb');

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    echo("hhh");

    $query = "SELECT * From Person";
    $result = mysqli_query($conn, $query);

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_array())
    {
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    $result->close();

    mysqli_close($conn);

    $pgsql_conn = pg_connect("host=postgres dbname=myDb user=user password=test");

    if (!$pgsql_conn) {
      echo "Failed to connect to PostgreSQL: " . pg_last_error();
      exit();
    }

    $pgsql_query = "SELECT * FROM Person";
    $pgsql_result = pg_query($pgsql_conn, $pgsql_query);

    if (!$pgsql_result) {
      exit();
    }
    echo '<table class="table table-striped">';
    echo '<thead><tr><th>id</th><th>name</th></tr></thead>';
    while ($row = pg_fetch_assoc($pgsql_result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    pg_free_result($pgsql_result);
    pg_close($pgsql_conn);

    ?>
    </div>
</body>
</html>
