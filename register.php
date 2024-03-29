<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.7.x-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.5/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
    <section class="hero is-info is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-White">Stock Inventory Register</h3>
                    <p class="subtitle has-text-grey">Please create an account to proceed.</p>
                    <div class="box">
                       <!-- <figure class="avatar">
                            <img src="https://placehold.it/128x128">
                        </figure>-->
                        <form>
                            <div class="field">
                                <div class="control">
                                    <label>First Name</label>

                                    <input class="input is-large" type="text" placeholder="first name" autofocus="">
                                </div>
                                 <div class="field">
                                <div class="control">
                                    <label>Last Name</label>

                                    <input class="input is-large" type="text" placeholder="last name" autofocus="">
                                </div>
                            <div class="field">
                                <div class="control">
                                    <label>Email</label>

                                    <input class="input is-large" type="email" placeholder="last name" >
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label>Password</label>
                                    <input class="input is-large" type="password" placeholder="Your Password">
                                </div>
                            </div>
                            <div class="field">
                                <div class="field">
                                <div class="control">
                                    <label>Confirm Password</label>
                                    <input class="input is-large" type="password" placeholder="Confirm password">
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox">
                  <input type="checkbox">
                  Remember me
                </label>
                            </div>
                            <button class="button is-block is-info is-large is-fullwidth">Register</button>
                        </form>
                    </div>
                    <p class="has-text-grey">
                        <a href="login.php">Sign In</a> &nbsp;·&nbsp;
                       <!-- <a href="../">Forgot Password</a> -->&nbsp;·&nbsp;
                        <a href="../">Need Help?</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>
