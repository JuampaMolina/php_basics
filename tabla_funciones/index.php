<html>
 <head>
  <title>Prueba de PHP</title>
  <link rel="stylesheet" href="styles.css">
 </head>
 <body>
      <?php 
      
        $functions = [
          'f_gettype' => function (mixed $var) {
            return gettype($var);
          },
          'f_isset' => function (mixed $var) {
            return isset($var) ? 'true' : 'false';
          },
          'f_empty' => function (mixed $var) {
            return empty($var) ? 'true' : 'false';
          },
          'f_is_null' => function (mixed $var) {
            return is_null($var) ? 'true' : 'false';
          }
        ];

        $expressions = [
          'null' => null,
          'false' => false,
          'true' => true,
          '0' => 0,
          '1' => 1,
          '"0"' => '0',
          '"1"' => '1',
          '""' => "",
          '"foo"' => "foo",
          'array()' => array(),
          
        ];
      ?>
    <table>
      <?php 

        echo "<tr>";
        echo "<th>Expresión</th>";
        foreach($functions as $fkey => $fvalue) {
          echo "<th>$fkey</th>";
        }
        echo "</tr>";

        foreach ($expressions as $key => $value) {
          echo "<tr>";
            echo "<td> $key";
              foreach($functions as $f) {
                echo "<td>";
                echo $f($value);
                echo "</td>";
              }
            echo "</td>";
          echo "</tr>";
        }

      ?>
    </table>
 </body>
</html>