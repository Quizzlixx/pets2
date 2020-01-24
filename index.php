<?php
/**
 * Kerrie Low
 * Rob Wood
 * 1.24.20
 * Full Stack Software Development
 */

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');

// instantiate F3
// :: means static method
$f3 = Base::instance();

// define a default route
// -> calls an instance method
$f3->route('GET /', function() {
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
//    $view = new Template();
//    echo $view->render('views/home.html');
});

$f3 -> route('GET /@item', function($f3, $params){
    // var_dump($params);
    $item = $params['item'];

    if($item == "dog" ){
        echo "<p>Woof</p>";
    }
    else if($item == "ostrich"){
        echo "<p>Bakaw</p>";
    }
    else if($item == "pig"){
        echo "<p>Oink</p>";
    }
    else if($item == "cat"){
        echo "<p>Meow</p>";
    }
    else if($item == "chicken"){
        echo "<p>Cluck</p>";
    }
    else{
        echo "<p>Whatever</p>";
    }

});


// run f3
$f3->run();