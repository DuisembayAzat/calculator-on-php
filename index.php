<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  
  <title>Document</title>
  </head>
  <body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <input type="number" name="num01" placeholder="Number one">
    <select name="operator" >
        <option value="add">+</option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="number" name="num02" placeholder="Number two">
    <button>Санау</button>

</form>
  <h3></h3>
    
  <p></p>
    
  
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //grab data
    $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
    $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
    $operator = htmlspecialchars($_POST["operator"]);
    //we need to sanitize data not use this


    //we nedd to think about error handler
    //reqired in front will not handle problem

    $errors = false;

    if (empty($num01) || empty($num02) || empty($operator)) {
        echo "<p > Fill in all fields! </p>";
        $errors = true;
    }

    if (!is_numeric($num01) || !is_numeric($num02)) {
        echo "<p > only write numbers! </p>";
        $errors = true;

    }

    // calculate the numbers if no errors
    if (!$errors) {
        //declare variable and cause error
        $value = 0;

        switch($operator) {
            case "add":
                $value = $num01 + $num02;
                break;
            case "subtract":
                $value = $num01 - $num02;
                break;
            case "multiply":
                $value = $num01 * $num02;
                break;
            case "divide":
                    $value = $num01 / $num02;
                    break;
            default:
                echo "<p > Something went Horribly wrong! </p>";
        }

        echo "<p > Result =" . $value . "</p>";

    }
}

?>


