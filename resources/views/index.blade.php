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

            .row {
                display: table-cell;
                vertical-align: middle; 
                text-align: center;
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
                width: 25%;
            }
            select, input {
                /*display: block;*/
            }
        </style>
    </head>
    <body>
        <!-- <div class="container"> -->
 <!--            <div class="content">
                <div class="title">home.</div>
            </div> -->
            <div class="row">
                    <div class="col-md-6">
                        <form action="#" method="get" class="input" onsubmit="getResults(); return false;">

                            <p><select class="form-control" name="organ" onchange="chooseTransplant()">
                                <option selected="selected" disabled="disabled">Organ</option>
                                <option value="heart">heart</option>
                                <option value="lung">lung</option>
                                <option value="heart_lung">heart+lung</option>
                            </select></p>

                            <p><input type="text" class="form-control" placeholder="age" name="age"></p>

                            <p><input type="text" class="form-control" placeholder="bmi" name="bmi"></p>                           

                             <p><select class="form-control" name="ethnicity">
                                <option selected="selected" disabled="disabled">Ethnicity</option>
                                <option value="1">White</option>
                                <option value="2">Black</option>
                                <option value="4">Hispanic</option>
                                <option value="5">Asian</option>
                                <option value="6">American Indian</option>
                                <option value="7">Native Hawaiian</option>
                                <option value="9">Multiracial</option>
                            </select></p>


                            <p><select class="form-control" name="diagnosis">
                                <option selected="selected" disabled="disabled">Diagnosis</option>
                            </select></p>

                            <p><select class="form-control" name="gender">
                                <option selected="selected" disabled="disabled">Gender</option>
                                <option value="1">male</option>
                                <option value="0">female</option>
                            </select></p>

                             <p><select class="form-control" name="survival">
                                <option selected="selected" disabled="disabled">Survival</option>
                                <option value="one_yr">1 year</option>
                                <option value="five_yr">5 year</option>
                                <option value="ten_yr">10 year</option>
                            </select></p>

                            <p><input type="submit" class="btn btn-info get-results" value="Calculate"></p>
                     
                        </form>    



                    </div>
                    <div class="col-md-6 results">

                        Results

                    </div>
            </div>
           



        <!-- </div> -->



        <script>
            function getResults() 
            {  
                var data = {}; 
                var fields = $(".input").serializeArray();
                fields.map(function(x){data[x.name] = x.value;}); 

                if (!data.hasOwnProperty("organ")) {
                    alert("Please specify the organ transplanted.");
                    return false;
                }
                else if (!data.hasOwnProperty("survival")) {
                    alert("Please specify the survival time");
                    return false; 
                }

                console.log(data);  
                $(".results").html("Results");

                $.getJSON("/query", data, function(results) {
                    var survival = data.survival.substring(0, data.survival.indexOf("_"));
                    $(".results").append("<p>" + results.matched + " similar patients were identified. </p>"); 
                    $(".results").append("<p>" + survival + "-year survival of similar patients: " + Math.ceil(results.similar_patients*1000)/10 + "%</p>");
                    $(".results").append("<p>Compared to " + survival + "-year survival of all patients: " + results.average + "%</p>")

                });
            }

            function chooseTransplant() 
            {
                var organ = $('[name="organ"]')[0].value;
                if (organ == "heart") {
                     var options = "<option selected='selected' disabled='disabled'>Diagnosis</option>" + 
                                    "<option value='1'>HRT- Cardiomyopathy</option>" +
                                    "<option value='6'>HRT- CHD</option>" +
                                    "<option value='3'>HRT- CAD</option>" +
                                    "<option value='5'>HRT- Valve</option>" +
                                    "<option value='7'>HRT- Other</option>";
                    $('[name="diagnosis"]').html(options);

                } else if (organ == "lung") {
                    var options =  "<option selected='selected' disabled='disabled'>Diagnosis</option>" + 
                                    "<option value='8'>LNG- CF</option>" +
                                    "<option value='9'>LNG- PPH</option>" +
                                    "<option value='10'>LNG- PF/IPF</option>" +
                                    "<option value='11'>LNG- OB</option>" +
                                    "<option value='12'>LNG- Other</option>";

                    $('[name="diagnosis"]').html(options);
                } else if (organ == "heart_lung") {
                    var options =  "<option selected='selected' disabled='disabled'>Diagnosis</option>" + 
                                    "<option value='13'>HRTLNG- CHD</option>" +
                                    "<option value='14'>HRTLNG- PPH</option>" + 
                                    "<option value='15'>HRTLNG- Other</option>"; 

                    $('[name="diagnosis"]').html(options);
                }

            }
              


              // 
        </script>


    </body>
</html>
