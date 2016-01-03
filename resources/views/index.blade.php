<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
                display: table-cell;
                vertical-align: middle;
                column-count: 2;
                -webkit-column-count: 2;
                -moz-column-count: 3;
                text-align: center;

            }
            .input {
                -webkit-column-span: 1; /* Chrome, Safari, Opera */
                column-span: 1;
            }
            .results {
                -webkit-column-span: 1; /* Chrome, Safari, Opera */
                column-span: 1;
            }
            .content {
                text-align: center;
                display: inline-block;
            }
            .title {
                font-size: 60px;
            }
            .form-control
            {
                /* center form controls */
                display: inline-block;

                /* override Bootstrap's 100% width for form controls */
                width: auto;
            }


        </style>
    </head>
    <body>
        <div class="container">
 <!--            <div class="content">
                <div class="title">home.</div>
            </div> -->

            <form action="#" method="get" class="input">

                    <select class="form-control">
                        <option selected="selected" disabled="disabled">Organ</option>
                        <option value="heart">heart</option>
                        <option value="lung">lung</option>
                        <option value="heart_lung">heart+lung</option>
                    </select>

                    <input type="text" placeholder="age">

                    <select class="form-control">
                        <option selected="selected" disabled="disabled">Gender</option>
                        <option value="1">male</option>
                        <option value="0">female</option>
                    </select>

                     <select class="form-control">
                        <option selected="selected" disabled="disabled">Survival</option>
                        <option value="one_yr">1 year</option>
                        <option value="five_yr">5 year</option>
                        <option value="ten_yr">10 year</option>
                    </select>

                    <input type="submit" class="btn btn-info get-results" value="Submit Button">
                 
            </form>

            <div class="results">
                These are the results.
            </div>


        </div>



        <script>
            $(".input").submit(function() {
                var inputs = $('.input :input');
                console.log(inputs);

                var values = {};
                $.each($('.input').serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });

                console.log(values);

                $.getJSON("/query", {"survival":"one_yr", "organ":"heart"}, function(data) {
                    console.log(data);
                })
            });
        </script>


    </body>
</html>
