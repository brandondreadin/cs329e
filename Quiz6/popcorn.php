<html>
  <head>
    <title> Process the popcorn3.html form </title>
  </head>
  <body>
    <?php

// Get form data values

      $cheese = $_POST["cheese"];
      $caramel = $_POST["caramel"];
      $chocolate = $_POST["chocolate"];
      $peanutbutter = $_POST["peanutbutter"];
      $unflavored = $_POST["unflavored"];
      $name = $_POST["name"];
      $street = $_POST["street"];
      $city = $_POST["city"];
      $payment = $_POST["payment"];

// If any of the quantities are blank, set them to zero

      if ($cheese == "") $cheese = 0;
      if ($caramel == "") $caramel = 0;
      if ($chocolate == "") $chocolate = 0;
      if ($peanutbutter == "") $peanutbutter = 0;
      if ($unflavored == "") $unflavored = 0;

// Compute the item costs and total cost
      $file = fopen("popcorn_data.txt", "r");
      $numProducts = fgets($file);
      $products = []
      for ($i=0; $i<$numProducts; $i++){
        $name = fgets($file);
        $price = fgets($file);
        $products[$name]=$price;
      }
      
      $arr = array("Cheese Popcorn" => $cheese; "Caramel Popcorn" => $caramel; "Chocolate Popcorn" => $chocolate; "Peanut Butter Popcorn" => $peanutbutter; "Unflavored Popcorn" => $unflavored);

      $cheese_cost = $products["Cheese Popcorn"] * $cheese;
      $caramel_cost = $products["Caramel Popcorn"] * $caramel;
      $chocolate_cost = $products["Chocolate Popcorn"] * $chocolate;
      $peanutbutter_cost = $products["Peanut Butter Popcorn"] * $peanutbutter;
      $unflavored_cost = $products["Unflavored Popcorn"] * $unflavored;
      $total_price = $cheese_cost + $caramel_cost + 
                     $chocolate_cost + $peanutbutter_cost +
                     $unflavored_cost;
      $total_items = $cheese + $caramel + $chocolate + $peanutbutter + $unflavored;

      
      $cost = array("Cheese Popcorn" => $cheese_cost; "Caramel Popcorn" => $caramel_cost; "Chocolate Popcorn" => $chocolate_cost; "Peanut Butter Popcorn" => $peanutbutter_cost; "Unflavored Popcorn" => $unflavored_cost);

// Return the results to the browser in a table

    ?>
    <h4> Customer: </h4>
    <?php
      print ("$name <br /> $street <br /> $city <br />");
    ?>
    <p /> <p />
<table border = "border">
      <caption> Order Information </caption>
      <tr>
        <th> Product </th>
        <th> Unit Price </th>
        <th> Quantity Ordered </th>
        <th> Item Cost </th>
      </tr>

     <?php
       foreach ($products as $i => $value){
         echo "<tr align='center'>
                 <td> $i </td> 
                 <td> $value </td>
                 <td> $arr[$i] </td>";
	printf("$ %4.2f", $cost[$i]);
        echo "</tr>";
       }
     ?>
      <tr align = "center">
        <td> Unpopped Popcorn </td>
        <td> $3.00 </td>
        <td> <?php print ("$unpop"); ?> </td>
        <td> <?php printf ("$ %4.2f", $unpop_cost); ?>
        </td>
      </tr>
      <tr align = "center">
        <td> Caramel Popcorn </td>
        <td> $3.50 </td>
        <td> <?php print ("$caramel"); ?> </td>
        <td> <?php printf ("$ %4.2f", $caramel_cost); ?>
        </td>
        </tr>
      <tr align = "center">
        <td> Caramel Nut Popcorn </td>
        <td> $4.50 </td>
        <td> <?php print ("$caramelnut"); ?> </td>
        <td> <?php printf ("$ %4.2f", $caramelnut_cost); ?>
        </td>
      </tr>
      <tr align = "center">
        <td> Toffey Nut Popcorn </td>
        <td> $5.00 </td>
        <td> <?php print ("$toffeynut"); ?> </td>
        <td> <?php printf ("$ %4.2f", $toffeynut_cost); ?>
        </td>
      </tr>
    </table>
    <p /> <p />

    <?php
      print ("You ordered $total_items popcorn items <br />");
      printf ("Your total bill is: $ %5.2f <br />", $total_price);
      print ("Your chosen method of payment is: $payment <br />");
    ?>
  </body>
</html>
