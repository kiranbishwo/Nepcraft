<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/product.css">
    <style>
        table{
            font-weight: bolder;
            padding: 20px;
        }
        .edit{
            text-decoration: none;
            font-weight: bold;
        }
        table{
            width: 70%;
        }
        canvas{
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                 <h2>Charts</h2>
            </div>
            <hr>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="myChart1" width="400" height="400"></canvas>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <canvas id="myChart2" width="400" height="200"></canvas>
            </div>
            
        </div>


    </div>
    

 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/chart.js"></script>
<script src="js/pie.js"></script>
<script src="js/bar.js"></script>
<script src="js/line.js"></script>
</body>
</html>