<?php
// display products
$pizzas = [
    ['name' => 'Margherita', 'price' => 8],
    ['name' => 'Hawaï', 'price' => 8.5],
    ['name' => 'Salami pepper', 'price' => 10],
    ['name' => 'Prosciutto', 'price' => 9],
    ['name' => 'Parmiggiana', 'price' => 9],
    ['name' => 'Vegetarian', 'price' => 8.5],
    ['name' => 'Four cheeses', 'price' => 10],
    ['name' => 'Four seasons', 'price' => 10.5],
    ['name' => 'Scampi', 'price' => 11.5]
];

$drinks = [
    ['name' => 'Water', 'price' => 1.8],
    ['name' => 'Sparkling water', 'price' => 1.8],
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 2.2],
];

$products = $pizzas;
if(isset($_GET['food'])){
    if ($_GET['food'] == false) {
        $products = $drinks;
    }
}

function displayProducts($products){
   foreach($products as $i => $product){
       echo '<label><input class="form-control" type="number" value="0" name="products['. $i .']"/> ' . $product['name'] . ' - &euro; ' . number_format($product['price'], 2) . '</label><br />';
    }
}

// display order
function displayOrder($checkedProducts, $products, $email, $street, $streetnumber, $city, $zipcode){
    if (!empty($_POST)) {
        if (array_sum($_POST['products']) > 0 && $email && $street && $streetnumber && $city && $city) {
            $ul = "";
            foreach ($checkedProducts as $i => $checkedProduct) {
                if ($checkedProduct > 0) {
                    $ul .= '<li>'. $checkedProduct . 'x ' . $products[$i]['name'] . ' - ' . $products[$i]['price'] .'&euro;</li>';
                }
                
            }
            $message = ' <div class="alert alert-success"> <h4>Congratulations, </h3> <p>Your order has been successfully completed !</p> <ul>' . $ul . '</ul> <p>You payed <b>'. getPrice($checkedProducts, $products) .' &euro;</b></p> <p>The order will be delivered at <b>'. deliveryTime() .'</b> to :</p> <p>' . $_SESSION['street'] . $_SESSION['streetnumber'] . ', '. $_SESSION['zipcode'] .' '. $_SESSION['city'] . '</p></div>';
    
            return $message;
    
        }else {
            return '';
        } 
    }
      
}


// display error
function displayError($inputNames, $email, $street, $streetnumber, $city, $zipcode){
    if (!empty($_POST)) {
        if (!array_sum($_POST['products']) > 0 || !$email || !$street || !$streetnumber || !$city || !$city ){
            $ul = '';
            foreach ($inputNames as $i => $inputName) {
                if ( $_SESSION[$inputName] == false) {
                    $ul .= '<li>'. $inputName .' : is false</li>';
                }
            }
            if (!array_sum($_POST['products']) > 0) {
                $ul .= '<li>Nothing has been ordered</li>';
            }
            $message = '<div class="alert alert-danger"><h4>Some errors occured :</h4> <ul>'. $ul .'</ul> </div>';
            return $message;
        }
        else {
            return '';
        }
    }
    else {
        return '';
    }    
}