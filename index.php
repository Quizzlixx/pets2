<?php
/**
 * Kerrie Low
 * Rob Wood
 * 1.24.20
 * Full Stack Software Development
 */
// start session
session_start();

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
        echo "<p>404 Error Pick a legit animal to eat!</p>";
    }

});

// define order route
$f3 -> route('GET /order', function(){
    $view = new Template();
    echo $view -> render('views/form1.html');
});

// order 2 route
$f3 -> route('POST /order2', function(){
    var_dump($_POST);
    $_SESSION['animal'] = $_POST['animal'];

    $view = new Template();
    echo $view -> render('views/form2.html');
});

// results route
$f3 -> route('POST /results', function(){
    var_dump($_POST);
    var_dump($_SESSION);
    $_SESSION['colors'] = $_POST['colors'];

    $view = new Template();
    echo $view -> render('views/results.html');
});


// run f3
$f3->run();