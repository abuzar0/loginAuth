<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            //button click event capture
            $('#submit').on('click', function(e) {

                //so the page doesn't reload on submit
                e.preventDefault();

                //getting data from the DOM
                var email = $("#name").val();
                var password = $("#password").val();

                //flag
                var valid = true;

                //logging
                console.log(email);
                console.log(password);


                //email validation
                if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {} else valid = false;

                if (valid)
                    if (password.length >= 8)
                        if (password.match(/[A-Z]/i)) {} else valid = false;
                else valid = false;

                //if validated, send ajax request
                if (valid)
                //actual ajax request
                    $.ajax({
                    url: "backend.php",
                    method: "POST",
                    data: {
                        email: email,
                        password: password,
                        submitFlag: 1
                    },
                    success: function(data) {
                        if (data == 'OK') alert('Received OK');
                        location.replace("page.php");
                    }
                });

                      
                /*
                 *   ENDalert('Received OK');
                 */
            });
        });
    </script>
</head>

<body>

    <div class="container">
        <div style="display:flex; justify-content:center;align-items:center; height:100vh">
            <div class="card bg-white shadow border-danger" style="width: 80%;">
                <div class="card-header bg-grey text-center">
                    <h3>Enter Login Credentials</h3>
                </div>
                <div class="card-body">
                    <div class="group-row">
                        <!-- <form action="index.php" class="form" method="post"> -->
                        <div class=" group-row ">
                            <label for="name" class=" text-center md-cl-2">email</label>
                            <input type="name" id="name" name="name" placeholder="email" class="form-control col-md-6" style="border-radius:9px;" disable required />
                        </div>
                        <div class=" group-row ">
                            <label for="pasword" class=" text-center md-cl-2">password</label>
                            <input type="password" id="password" name="password" class="form-control col-md-6" placeholder="password" style="border-radius:9px;" disable required />
                        </div><br>
                        <div class=" group-row ">
                            <label for="btn" class=" text-center md-cl-2"></label>
                            <button class="btn btn-danger btn-sm" name="submit " id="submit">login</button>
                        </div>
                        <!-- </form>   -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>