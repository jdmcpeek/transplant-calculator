<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .form-control {
                width: 100%;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 60px;
                margin-top: -40px;
                padding-top: 15px;
                padding-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
             <div class="title">
                <div class="title">Pediatric Transplant Risk Assessment Tool</div>
            </div>
                <div class="title">log in here.</div>
                <form action="/login" method="post">
                    <input type="text" class="form-control" name="password" placeholder="password">
                    <input type="submit" class="btn btn-info get-results" value="submit">
                </form>
            </div>
        </div>
    </body>
</html>
