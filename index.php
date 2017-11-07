<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>Online Bartering System</title>
    </head>
    <body>
        <div class="container">
        <form method="POST" class="form-horizontal" action="handler.php">
<fieldset>

<!-- Form Name -->
<legend><h1>Online Bartering System</h1></legend>
Please Enter the Required details to start a conversation!!!   <br><br><br>



<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Customer's Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="customer" type="text" placeholder="Name of the Customer" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Producer's Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="producer" type="text" placeholder="Name of the Producer" class="form-control input-md">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Product's Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="prod_name" type="text" placeholder="Name of the Product" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Cost</label>  
  <div class="col-md-4">
  <input id="textinput" name="cost" type="text" placeholder="Cost of the Product" class="form-control input-md">
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Quantity</label>  
  <div class="col-md-4">
  <input id="textinput" name="qty" type="number" placeholder="Quantity" class="form-control input-md">
  
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Demand</label>
  <div class="col-md-4">
    <select id="selectbasic" name="demand" class="form-control">
      <option value="low">Low</option>
      <option value="med">Medium</option>
      <option value="high">High</option>
    </select>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Marketing Strategy</label>
  <div class="col-md-4">
    <select id="selectbasic" name="market" class="form-control">
      <option value="low">Low</option>
      <option value="med">Medium</option>
      <option value="high">High</option>
    </select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Price of the Competitive Product</label>  
  <div class="col-md-4">
  <input id="textinput" name="comp_cost" type="text" placeholder="Enter price per quantity" class="form-control input-md">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Purchasing Power of Customer</label>
  <div class="col-md-4">
    <select id="selectbasic" name="purch_power" class="form-control">
      <option value="low">Low</option>
      <option value="med">Medium</option>
      <option value="high">High</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Start Conversation</button>
  </div>
</div>

</fieldset>
</form>
            <hr>
            <q>The Project 'Online Bartering System' is a smart PHP-based automated chatbot system developed by Rayan Dasoriya and Rishabh Jamar as a part of mini project submission of the subject <i>Artificial Intelligence</i> under the guidance of Prof. Mahesh Mourya.</q>
            
</div>
    </body>
</html>
