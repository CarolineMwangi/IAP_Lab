<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make Your Order</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="order.js"></script>
</head>
<body>
    <div id="order">
            <br>
            <h1>MAKE YOUR ORDER</h1>

            <form action="" method="post">

                <p>Item:</p>
                <input type="text" name="item" placeholder="Enter name of item" id="name" required>

                <p>Quantity: </p>
                <input type="number" name="quantity" placeholder="Enter number of items" id="quantity" required>            
                
                <br>
                <br>

                <button id="btn">MAKE ORDER</button>
            </form>
    </div>
    
    
</body>
</html>