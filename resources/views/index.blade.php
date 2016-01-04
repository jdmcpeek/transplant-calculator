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

                    <select class="form-control" name="organ">
                        <option selected="selected" disabled="disabled">Organ</option>
                        <option value="heart">heart</option>
                        <option value="lung">lung</option>
                        <option value="heart_lung">heart+lung</option>
                    </select>

                    <input type="text" placeholder="age" name="age">

                    <select class="form-control" name="gender">
                        <option selected="selected" disabled="disabled">Gender</option>
                        <option value="1">male</option>
                        <option value="0">female</option>
                    </select>

                     <select class="form-control" name="survival">
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
            $("form").submit(function(event) {
                var data = {}; 
                var fields = $(".input").serializeArray();
                console.log(fields);
                fields.map(function(x){data[x.name] = x.value;}); 

                if (!data.hasOwnProperty("organ")) {
                    alert("Please specify the organ transplanted.");
                    return false;
                }
                else if (!data.hasOwnProperty("survival")) {
                    alert("Please specify the survival time");
                    return false; 
                }

                $.getJSON("/query", data, function(dat) {

                    console.log(dat);
                })
            });
        </script>


    </body>
</html>
