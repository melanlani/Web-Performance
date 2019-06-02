<?php  

//index.php

include("database_connection.php");

$query = "SELECT day FROM chart_data GROUP BY DAYOFWEEK(date) DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <title>Web MPU Performance</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
        <style type="text/css">
            h2 {
                color: #331d1d;
                font-size: 24px;
                font-family:Regular;
                color:#3498db;
            }
            h5 {
                color:#db3452;
            }
            .tab {
              overflow: hidden;
              border: 1px solid #ccc;
              background-color: #f1f1f1;
            }

            /* Style the buttons that are used to open the tab content */
            .tab button {
              background-color: inherit;
              float: left;
              border: none;
              outline: none;
              cursor: pointer;
              padding: 14px 16px;
              transition: 0.3s;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
              background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
              background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
              display: none;
              padding: 6px 12px;
              border: 1px solid #ccc;
              border-top: none;

            }
            #watch {
              color: rgb(252, 150, 65);
              overflow: show;
              margin: auto;
              font-size: 2vw;
              -webkit-text-stroke: 3px rgb(34, 37, 109);
              text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
                           4px 4px 20px rgba(210, 45, 26, 0.4),
                           4px 4px 30px rgba(210, 25, 16, 0.4),
                           4px 4px 40px rgba(210, 15, 06, 0.4);
            }
        </style>
    </head>  
    <body> 
        
        <div class="container-fluid">

            <div class="row">
                <nav class="col-md d-none d-md-block bg-dark sidebar">   
                    <h2 class="typewrite" data-period="1500" data-type='[ "Assisting Your Bussiness From The Heart."]' align="center"></h2> 
                </nav>
            </div>

            <div class="row">
            <br />  
            <div class="col-md-2">
                    <div class="card" style="width: 20rem; background-color: #f5f5f5" align="center">
                    <img src="img/foto.jpg" style="width:120px" alt="...">
                        <div class="card-body" >
                            <h5 class="card-title">Melani Putri</h5>
                            <p class="card-text"><small>melanlani@hotmail.com</small></p>
                            <a href="#" class="btn btn-primary">Logout</a>
                      </div>
                    </div></div>
            <div class="col-md-4">
                <div class="tab">
                  <button class="tablinks" onclick="openCity(event, 'chart_pie')" >Pie</button>
                  <button class="tablinks" onclick="openCity(event, 'chart_area')" id="defaultOpen">Column</button>
                </div>
                <!-- Tab content -->
                <div  id="chart_pie" class="tabcontent" style="height: 550px; ">
                </div>

                <div id="chart_area" class="tabcontent" style=" height: 550px;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="panel-title">Daily Performance</h3>
                            </div>
                            <div class="col-md-4">
                                <select name="date" id="year" class="form-control" required="required">
                                    <option value="">Select Day</option>
                                    <option value="1">Sunday</option>
                                    <option value="2">Monday</option>
                                    <option value="3">Tuesday</option>
                                    <option value="4">Wednesday</option>
                                    <option value="5">Thrusday</option>
                                    <option value="6">Friday</option>
                                    <option value="7">Saturday</option>
                               </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" name="filter" id="filter"><span class="glyphicon glyphicon-search"></span> Filter</button>   
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="height: 542px; ">
                        <table class="table table-bordered-sm" id="datatable">
                            <thead class="alert-info">
                                <tr>
                                    <th>Day</th>
                                    <th>Target Time</th>
                                    <th>Work Time</th>
                                    <th>Achievement</th>
                                    <th>Over Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>   
            </div>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="panel-title">Year Summary Performance</h3>
                            </div>
                            <div class="col-md-2">
                                <h4>Start Day</h4>
                                <input type="date" name="startday" id="startday">
                            </div>
                            <div class="col-md-2">
                                <h4>End Day</h4>
                                <input type="date" name="endday" id="endday">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" name="filters" id="filters"><span class="glyphicon glyphicon-search"></span> Filter</button>   
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered-sm" id="datatable2">
                            <thead class="alert-info">
                                <tr>
                                    <th>Day</th>
                                    <th>Target Time</th>
                                    <th>Work Time</th>
                                    <th>Achievement</th>
                                    <th>Over Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>   
            </div>

            <div class="row">
                
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="panel-title">Column Chart</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div  id="year_column" style="height: 500px; "></div>
                    </div>
                </div>   
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="panel-title">Pie Chart</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div  id="year_pie" style="height: 500px; "></div>
                    </div>
                </div>   
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="panel-title">Area Chart</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <div  id="year_area" style="height: 500px; "></div>
                    </div>
                </div>   
            </div>
            </div>
        </div>  
        <main style="height:2000px;">
            <nav class="navbar navbar-default navbar-fixed-bottom" style="background-color:#f1f1f1; ">
            <div class="container-fluid">

            <!-- Brand/logo -->
                <div class="col-xs-5"></div>
                <div class="col-xs-6">
                    <div id="watch" class="navbar-brand" style="padding-left: 50px"></div>
                </div>

            </div>
            </nav>
        </main>
    </body>  
</html>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="js/running.js"></script>
<script src="js/tab.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback();

function load_monthwise_data(year)
{
    var temp_title = year+'';
    $.ajax({
        url:"fetch2.php",
        method:"POST",
        data:{year:year},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data);
        }
    });
}

function drawMonthwiseChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Day');
    data.addColumn('number', 'Achievement');
    $.each(jsonData, function(i, jsonData){
        var day = jsonData.day;
        var achieve = jsonData.achieve;
        data.addRows([[day, achieve]]);
    });
    var columncharts_options = {
        title:'Column Chart: Daily Performance',
        height:500,
        hAxis: {
            title: "Day"
        },
        vAxis: {
            title: 'Achievement'
        }
    };

    var columncharts = new google.visualization.ColumnChart(document.getElementById('chart_area'));
    columncharts.draw(data, columncharts_options);

     var piecharts_options = {
        title:'Pie Chart: Daily Performance',
        width:400,
        height:500
    };

    var piecharts = new google.visualization.PieChart(document.getElementById('chart_pie'));
    piecharts.draw(data, piecharts_options);
}

function load_yearwise_data(startday, endday)
{
    var temp_title = startday+'';
    $.ajax({
        url:"fetch4.php",
        method:"POST",
        data:{startday:startday, endday:endday},
        dataType:"JSON",
        success:function(data)
        {
            drawYearwiseChart(data);
        }
    });
}

function drawYearwiseChart(chartyear_data, chart_main_title)
{
    var jsonData = chartyear_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Day');
    data.addColumn('number', 'Achievement');
    $.each(jsonData, function(i, jsonData){
        var day = jsonData.day;
        var achieve = jsonData.achieve;
        data.addRows([[day, achieve]]);
    });
    var columnyear_options = {
        title:'Column Chart: Year Performance',
        height:500,
        hAxis: {
            title: "Day"
        },
        vAxis: {
            title: 'Achievement'
        }
    };

    var columnyear = new google.visualization.ColumnChart(document.getElementById('year_column'));
    columnyear.draw(data, columnyear_options);

    var pieyear_options = {
        title:'Pie Chart: Year Performance',
        width:400,
        height:500
    };

    var pieyear = new google.visualization.PieChart(document.getElementById('year_pie'));
    pieyear.draw(data, pieyear_options);

    var areayear_options = {
        title:'Area Chart: Year Performance',
        width:400,
        height:500
    };

    var areayear = new google.visualization.AreaChart(document.getElementById('year_area'));
    areayear.draw(data, areayear_options);
}


</script>

<script>
    
$(document).ready(function(){

    $('#filter').click(function(){
        var year = $('#year').val();
        if(year != '')
        {
            load_monthwise_data(year, 'Month Wise Profit Data For');
        }
    });

    $('#filters').click(function(){
        var startday = $('#startday').val();
        var endday = $('#endday').val();
        if(startday != '' && endday !='' )
        {
            load_yearwise_data(startday, endday, 'Year Wise Profit Data For');
        }
    });

});

document.getElementById("defaultOpen").click();

$(document).ready(function(){
  
      fill_datatable();
      fill_datatable2();
      
      function fill_datatable(year = '')
      {
       var dataTable = $('#datatable').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "searching" : false,
        "ajax" : {
         url:"fetch.php",
         type:"POST",
         data:{
          year:year
         }
        }
       });
      }
      
      $('#filter').click(function(){
       var year = $('#year').val();
       if(year != '')
       {
        $('#datatable').DataTable().destroy();
        fill_datatable(year);
       }
       else
       {
        alert('Select Both filter option');
        $('#datatable').DataTable().destroy();
        fill_datatable();
       }
      });

      function fill_datatable2(startday = '', endday= '')
      {
       var dataTable = $('#datatable2').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "searching" : false,
        "ajax" : {
         url:"fetch3.php",
         type:"POST",
         data:{
          startday:startday, endday:endday
         }
        }
       });
      }
      
      $('#filters').click(function(){
       var startday = $('#startday').val();
       var endday = $('#endday').val();
       if(startday != '' && endday != '' )
       {
        $('#datatable2').DataTable().destroy();
        fill_datatable2(startday, endday);
       }
       else
       {
        alert('Select Both filter option');
        $('#datatable2').DataTable().destroy();
        fill_datatable2();
       }
      });
      
      
     });
$(document).ready(function(){
        function clock() {
          var now = new Date();
          var secs = ('0' + now.getSeconds()).slice(-2);
          var mins = ('0' + now.getMinutes()).slice(-2);
          var hr = now.getHours();
          var Time = hr + ":" + mins + ":" + secs;
          document.getElementById("watch").innerHTML = Time;
          requestAnimationFrame(clock);
        }

        requestAnimationFrame(clock);
    });
</script>