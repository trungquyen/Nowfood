<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to Nowfood</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<header class="fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 px-0">
                    <nav class="navbar navbar-light py-0">
                        <div class="navbar-header w-100 px-0">
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="jionFrom__header d-block text-center">
        <h4>First time here?</h4>
                        </div>
     <div class="jionFrom__subheader d-block text-center">
        <p>Sign up for Nowfood</p>  
                        </div>
    <div class="container ">
        <div class="card">
            <div class="card-header text-center">
                <img src="images/now3.png" alt="" width="30" height="30">
                 Welcome to Nowfood
            </div>
            <div class="card-body">
            <form action="qmk.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="gmail" name="gmail" class="form-control" readonly id="gmail" aria-describedby="emailHelp"
                            required="" value="<?php echo $_GET['key']; ?>">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your gmail with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword" required="">
                    </div>
                    
                    <input  type="submit" name="btnRegister" class="btn btn-danger " >
                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>