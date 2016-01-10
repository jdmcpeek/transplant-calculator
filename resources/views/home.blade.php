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
                font-size: 30px;
                font-weight: bold;
                color: black;
                font-family: 'Lato';
            }

            .fa-btn {
                font-size: 20px;
            }

            .results p {
                vertical-align: middle;
            }
            .btn {
                width: 20%;
                margin-top: 45px;
            }
            .row {
                /*display: table-cell;*/    
                vertical-align: middle; 
                text-align: center;
            }

            .content {
                text-align: center;
                display: inline-block;
            }
            .title {
                /*font-size: 100px;*/
                display: inline-block;
                text-align: center;
                margin: auto;
                width: 100%;
                font-size: 45px;
                padding-top: 25px;
                padding-bottom: 40px; 
                padding-left: 100px;
                padding-right: 100px;

            }


            .input-select p {
                padding: 0px;
            }

            .left-select, .right-select {
                text-align: center;
            }



            /* Extra small devices (phones, less than 768px) */
            /* No media query since this is the default in Bootstrap */


            /* Medium devices (desktops, 992px and up) */
            @media (min-width: 992px) { 
                .left-select {
                    text-align: right;
                }
                .right-select {
                    text-align: left;
                }

                .input-select p {
                    padding: 10px;
                }
                .btn {
                    width: 50%;
                }

            }

            .title.footer {
                font-size: 25px;
            }
            /*.divider { 
                width: 10px;
                height: 100px;
                color: black;
            }*/
            .form-control
            {
                /* center form controls */
                display: inline-block;

                /* override Bootstrap's 100% width for form controls */
                width: 75%;
            }
            select, input {
                /*display: block;*/
            }
        </style>
    </head>

    <body>
        <!-- <div class="container"> -->
            <div class="title">
                <div class="banner">Pediatric Transplant Risk Assessment Tool </div>
            </div>

            <form action="#" method="get" class="input" onsubmit="getResults(); return false;">
                <div class="row">
                    
                        <div class="col-md-3 input-select left-select">
                            <p><select class="form-control" name="organ" onchange="chooseTransplant()">
                                <option selected="selected" disabled="disabled">Organ (required)</option>
                                <option value="heart">heart</option>
                                <option value="lung">lung</option>
                                <option value="heart_lung">heart+lung</option>
                            </select></p>

                            <p><select class="form-control" name="survival">
                                <option selected="selected" disabled="disabled">Survival (required)</option>
                                <option value="one_yr">1 year</option>
                                <option value="five_yr">5 year</option>
                                <option value="ten_yr">10 year</option>
                            </select></p>


                               <p><select class="form-control" name="age">
                                <option selected="selected" value="">Age</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select></p>

                            <p><select class="form-control" name="gender">
                                <option selected="selected" value="">Gender</option>
                                <option value="1">male</option>
                                <option value="0">female</option>
                            </select></p>

                            <p><select class="form-control" name="ethnicity">
                                <option selected="selected" value="">Ethnicity</option>
                                <option value="1">White</option>
                                <option value="2">Black</option>
                                <option value="4">Hispanic</option>
                                <option value="5">Asian</option>
                                <option value="6">American Indian</option>
                                <option value="7">Native Hawaiian</option>
                                <option value="9">Multiracial</option>
                            </select></p>
                        </div>

                        <div class="col-md-3 input-select right-select">

                            <p><select class="form-control" name="diagnosis">
                                <option selected="selected" value="">Diagnosis</option>
                            </select></p>


                            <p><select class="form-control" name="bmi">
                                <option selected="selected" value="">BMI</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                            </select></p>                         

                            <p><select class="form-control" name="ecmo">
                                <option selected="selected" value="">ECMO</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select></p>

                            <p><select class="form-control" name="inotropes">
                                <option selected="selected" value="">Inotropes</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select></p>

                            <p><select class="form-control" name="ventilator">
                                <option selected="selected" value="">Ventilator</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select></p>


             
                       
 
                        </div>

                        

                        <!-- <div class="divider"></div> -->

                    
                    <div class="col-md-6 results">

                        <p>Results</p>

                    </div>
                </div>

                <div class="row">
                    
                     <div class="col-md-6">
                            <p><input type="submit" class="btn btn-info get-results" value="CALCULATE"></p>

                            

                    </div>
                </div>


            </form>   

            <div class="title footer">
                <p><a href="{{ url('/logout') }}" class="logout">Logout here.</a></p>
                <p>   
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, sapiente! Sint architecto odio, eos cupiditate nesciunt, impedit libero ipsum porro eius aspernatur necessitatibus provident repellendus.
                </p>
            </div>
           
        <!-- </div> -->

    <!-- main javascript -->
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
                $(".results").html("<p>Results</p>");

                $.getJSON("/query", data, function(results) {
                    if (results == 0) {
                        $(".results").append("<p> Sorry, no matches for this query. </p>"); 
                        return;
                    }
                    var survival = data.survival.substring(0, data.survival.indexOf("_"));
                    $(".results").append("<p style='padding-bottom: 25px; padding-top: 20px; font-size: 20px;'>" + results.matched + " similar patients were identified. </p>"); 
                    $(".results").append("<p style='font-size: 20px;'>" + survival + "-year survival of similar patients: </p><p style='padding-bottom: 25px;'>" + Math.ceil(results.similar_patients*1000)/10 + "%</p>");
                    $(".results").append("<p style='font-size: 20px;'>Compared to " + survival + "-year survival of all patients: </p><p style='padding-bottom: 25px;'>" + results.average + "%</p>")

                });
            }

            function chooseTransplant() 
            {
                var organ = $('[name="organ"]')[0].value;
                if (organ == "heart") {
                     var options = "<option selected='selected' value=''>Diagnosis</option>" + 
                                    "<option value='1'>Cardiomyopathy</option>" +
                                    "<option value='6'>Congenital heart disease</option>" +
                                    "<option value='3'>Coronary artery disease</option>" +
                                    "<option value='5'>Valvular disease</option>" +
                                    "<option value='7'>Other (heart)</option>";
                    $('[name="diagnosis"]').html(options);

                } else if (organ == "lung") {
                    var options =  "<option selected='selected' value=''>Diagnosis</option>" + 
                                    "<option value='8'>Cystic fibrosis</option>" +
                                    "<option value='9'>Primary pulmonary HTN</option>" +
                                    "<option value='10'>Pulmonary fibrosis</option>" +
                                    "<option value='11'>Obliterative bronchiolitis</option>" +
                                    "<option value='12'>Other (lung)</option>";

                    $('[name="diagnosis"]').html(options);
                } else if (organ == "heart_lung") {
                    var options =  "<option selected='selected' value=''>Diagnosis</option>" + 
                                    "<option value='13'>Congenital heart disease (hrt-lng)</option>" +
                                    "<option value='14'>Primary pulmonary HTN (hrt-lng)</option>" + 
                                    "<option value='15'>Other (hrt-lng)</option>"; 

                    $('[name="diagnosis"]').html(options);
                }

            }
              // 
        </script>


    </body>
</html>
