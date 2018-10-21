<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>Online Bartering System</title>
    </head>
    <body>
        <div class="container">
            <div class ="jumbotron">
                <center>
            <h1>Welcome to Bartering System</h1>
            <h3>Here is the conversation</h3><br>
            </center>
    </div>
    <div class ="jumbotron">
<?php

//sleep(5);
$prod_name=$_POST['prod_name'];
$cost=$_POST['cost'];
$qty=$_POST['qty'];
$demand = $_POST['demand'];
$market = $_POST['market'];
$customer=$_POST['customer'];
$producer=$_POST['producer'];
$comp_cost=$_POST['comp_cost'];
$purch_pow=$_POST['purch_power'];


function cost_diff($comp_cost,$cost)
{
    $five=$cost-(5*$cost/100);
    $ten=$cost-(10*$cost/100);
    if($comp_cost>=$cost)
        return 1;
    else if($comp_cost>=$five)
        return 2;   //my cost after reducing 5% is lower than prod cost
    else if($comp_cost>=$ten)
        return 3;   //my cost after reducing 10% is lower than prod cost
    else
        return 4;
}
$five_per=$cost-(5*$cost/100);
$ten_per=$cost-(10*$cost/100);

$cost_cal=cost_diff($comp_cost, $cost);

$greet = array("Morning", "afternoon", "evening");
$greet= $greet[array_rand($greet)];


echo '<br>';

echo '<b>'.$producer.'</b>' ." : ". 'Good '.$greet.'. How may I help you?'.'<br>';
echo '<b>'.$customer.'</b>' ." : ". 'Good '.$greet.'. I want a '.$prod_name. '<br>';
echo '<b>'.$producer.'</b>' ." : ". 'Yes. It\'s available at a cost of $ '.$cost.'<br>';


if(($purch_pow=="med" || $purch_pow=="high") && ($cost_cal==1||$cost_cal==2) && ($demand =="med" || $demand=="high") && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment. Thank You.'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
}    

if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==3 && ($demand =="med" || $demand=="high") && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'The quality of this product is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more product. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". ' It costs $'. $five_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Fine. That would work. I\'ll make the payment. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $five_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Fine. That would work. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==4 && ($demand =="med" || $demand=="high") && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'The quality of this product is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more product. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be costly for me.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further alternatives.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry sir. That would not work for me.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will look at some other products in the market. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="low") && ($cost_cal==1||$cost_cal==2) && ($demand =="med" || $demand=="high") && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'The price is already so high. We can settle for something less.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I don\'t mind. But I can give you discount only if you buy it in quantity.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
       $m=rand(10,20);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want'.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I can give you five percent discount then.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment of '. $five_per*$m.'Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    $m=rand(0,5);
    echo '<b>'.$customer.'</b>' ." : ". 'No I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t provide you any discount then. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please try if you can. t will be very helpful. <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t help you this time. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
}    

if(($purch_pow=="low") && $cost_cal==3 && ($demand =="med" || $demand=="high") && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I can give you discount only if you buy it in quantity. Like more than 30 would work.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
       $m=rand(30,50);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want'.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I can give you ten percent discount then.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment of '. ($ten_per *$m).'Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    $m=rand(8,20);
    echo '<b>'.$customer.'</b>' ." : ". 'No I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t provide you any discount then. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please try if you can. It will be very helpful. <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t help you this time. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="low") && $cost_cal==4 && ($demand =="med" || $demand=="high") && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'The quality of this product is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more product. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be costly for me.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further alternatives.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry sir. That would not work for me.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will look at some other products in the market. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="med" || $purch_pow=="high") && ($cost_cal==1||$cost_cal==2) && $demand=="low" && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
}    

if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==3 && $demand=="low" && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'The quality of this product is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more product. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs $'. $five_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. It will be costly for me. Let it be. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
}    

if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==4 && $demand=="low" && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'The quality of this product is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more product. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be costly for me.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further alternatives.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry sir. That would not work for me.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will look at some other products in the market. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="low") && ($cost_cal==1||$cost_cal==2) && $demand=="low" && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'The price is already so high. We can settle for something less.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I don\'t mind. But I can give you discount only if you buy it in quantity.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
    $m=rand(10,20);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want'.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I can give you four percent discount then.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please meke a discount of 5 percent. I\'ll make the payment of '. $five_per*$m.'Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    $m=rand(0,5);
    echo '<b>'.$customer.'</b>' ." : ". 'No I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t provide you any discount then. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please try if you can. t will be very helpful. <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t help you this time. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
}    

if(($purch_pow=="low") && $cost_cal==3 && $demand=="low" && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I can give you discount only if you buy it in quantity. Like more than 30 would work.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
       $m=rand(30,50);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want'.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I can give you seven percent discount then.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. Please give me at least 10 percent iscount since I am buing in bulk. I\'ll make the payment of '. ($ten_per *$m).'Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    $m=rand(8,20);
    echo '<b>'.$customer.'</b>' ." : ". 'No I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t provide you any discount then. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please try if you can. It will be very helpful. <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t help you this time. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="low") && $cost_cal==4 && $demand=="low" && ($market =="med" || $market=="high"))
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'The quality of this product is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have another product available. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its cost? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be costly for me. It\'ll not work'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further alternatives.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry sir. That would not work for me.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will look at some other products in the market. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}   













if(($purch_pow=="med" || $purch_pow=="high") && ($cost_cal==1||$cost_cal==2) && ($demand =="med" || $demand=="high") && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the cash payment. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
}    

if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==3 && ($demand =="med" || $demand=="high") && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I assure you about the product\'s quality. It is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. Different products are available. Let me show you one of them. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". ' It costs $'. $five_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Fine. That would work. I\'ll make the payment. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. Only this product is available right now. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $five_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Ummmm... Fine. That would work. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome.<br>';
    
    }
}    

if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==4 && ($demand =="med" || $demand=="high") && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high as compared to other available products'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'The quality of this product is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'It would be great if you can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more alternative. But it\'s quality is not that great.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be costly for me.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further alternatives.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thanks.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry sir. That would not work for me.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will look at some other products in the market. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="low") && ($cost_cal==1||$cost_cal==2) && ($demand =="med" || $demand=="high") && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'The price is already so high. We can settle for something less.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I don\'t mind. But I can give you discount only if you are willing to buy it in quantity.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
       $m=rand(10,20);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want'.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Then I can give you a discount of five percent on MRP.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment of '. $five_per*$m.'Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    $m=rand(0,5);
    echo '<b>'.$customer.'</b>' ." : ". 'No I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t avail you any discount then. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please try if you can. It will be very helpful. <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t help you this time. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Please visit again.<br>';
    
    }
    
}    

if(($purch_pow=="low") && $cost_cal==3 && ($demand =="med" || $demand=="high") && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I can give you discount only if you buy it in quantity. Buying more than 30 would work.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
       $m=rand(30,50);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want'.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I can give you ten percent discount then.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment of '. ($ten_per *$m).'Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    $m=rand(8,20);
    echo '<b>'.$customer.'</b>' ." : ". 'No. I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. No discount then. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please try if you can.<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry to disappoint you but I can\'t. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'You\'re Welcome. Please visit again.<br>';
    
    }
}    

if(($purch_pow=="low") && $cost_cal==4 && ($demand =="med" || $demand=="high") && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I assure you about the quality though. It is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Let me look. Yes. We have one more product. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be expensive for me.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further options available.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok.'.'<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry sir. That\'ll not work for me.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will search it somewhere else. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. If you need any help, feel free to visit.<br>';
    
    }
}    

if(($purch_pow=="med" || $purch_pow=="high") && ($cost_cal==1||$cost_cal==2) && $demand=="low" && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. I\'ll make the payment then. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
}    

if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==3 && $demand=="low" && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the cost is too high. Can you show me some alternative'.'<br>';
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more product. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. How much is the cost? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs $'. $five_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. It will be costly for me. Let it be. Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
}    


if(($purch_pow=="med" || $purch_pow=="high") && $cost_cal==4 && $demand=="low" && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I you show you an alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be costly for me.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further alternatives.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    
    echo '<b>'.$customer.'</b>' ." : ". 'What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. That would not work for me.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will look at some other products in the market. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}    


if(($purch_pow=="low") && ($cost_cal==1||$cost_cal==2) && $demand=="low" && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'The price is already so high. Let\'s settle for something less.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I don\'t mind. But I can give you discount only if you buy it in quantity.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
    $m=rand(10,20);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want'.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I can give you 3.5 percent discount then.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please make a discount of 5 percent. I\'ll make the payment of '. $five_per*$m.'Thank You'.'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Thanks.<br>';
    
    }
    
    else
    {
    $m=rand(0,5);
    echo '<b>'.$customer.'</b>' ." : ". 'No I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t provide you any discount then. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please check if you can.<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem.<br>';
    
    }
    
}    

if(($purch_pow=="low") && $cost_cal==3 && $demand=="low" && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'I can give you discount only if you buy it in quantity. Like more than 30 would work.<br>';
    
    
    $i=rand(0,1);
    if($i==0)
    {
       $m=rand(30,50);
    echo '<b>'.$customer.'</b>' ." : ". 'Yaa. Actually I want '.$m.' entities.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'I can give you seven percent discount then.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No.Seeing the quantity please provide me at least 10 percent discount. I\'ll make the payment of $'. ($ten_per *$m).'<br>';
    echo '<i>'.'(makes payment)'.'</i><br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    $m=rand(8,20);
    echo '<b>'.$customer.'</b>' ." : ". 'No. I only need  '. $m.' pieces<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. No discount is available right now.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Please try if you can. It will be very helpful. <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I can\'t help you this time. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok.'.'<br>';
    
    }
}    

if(($purch_pow=="low") && $cost_cal==4 && $demand=="low" && $market=="low")
{
    echo '<b>'.$customer.'</b>' ." : ". 'But the rates are too high'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It\'s quality is better than other products available at the same price.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Can you show me some alternative'.'<br>';
    
    $i=rand(0,1);
    if($i==0)
    {
    echo '<b>'.$producer.'</b>' ." : ". 'Yes. We have one more product. But you can compare the quality.<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Actually it will work. What is its rate? <br>';
    echo '<b>'.$producer.'</b>' ." : ". 'It costs '. $ten_per. '<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'No. That would be costly for me.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'Sorry . We don\'t have further alternatives.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. No problem. Thank You.'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
    
    else
    {
    echo '<b>'.$producer.'</b>' ." : ". 'No. We have this product only. <br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. What about making a deal at '. $ten_per.'<br>';
    echo '<b>'.$producer.'</b>' ." : ". 'Sorry. I\'ll be helpless in that case.'.'<br>';
    echo '<b>'.$customer.'</b>' ." : ". 'Ok. Then I will look at some other products in the market. Thank You'.'<br>';
    echo '<b>'.$producer.'</b>' ." : ".  'You\'re Welcome. Please visit again.<br>';
    
    }
}   


echo '<br><br><br><i><center>THE END</center></i>'
?>
        </div>
        </div>
    </body>
</html>
