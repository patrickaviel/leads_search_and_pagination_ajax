<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads Ajax Sample</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        function changeValue(value) {
            document.getElementById('page_no_select').value = value;
        }
        $( function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker2" ).datepicker();
        } );
        $(document).ready(function(){
            $.get('/Leads/index_html', function(res) {
            $('#leads').html(res);
            });

            $('form').submit(function(){
            
            $.post($(this).attr('action'), $(this).serialize(), function(res) {
                $('#leads').html(res);
            });
            return false;
            });

            $('#my_form').change(function(){
            $.post($(this).attr('action'), $(this).serialize(), function(res) {
                $('#leads').html(res);
            });
            return false;
            });
        });

        
  </script>
    <style>
        .extend{
            padding: 0;
        }
        a{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-fluid border">
        <h1 class="display-6 p-2 w-75 mx-auto">Leads Search And Pagination</h1>
        <form action="/Leads/search" method="post" class="p-2 w-75 mx-auto" id="my_form">
            <div class="row d-flex justify-content-center bd-highlight mb-3">
                <div class="col">
                    <input type="text" name="name" placeholder="Name" aria-label="Name">
                </div>
                <div class="col">
                    <label for="datepicker">From:</label>
                    <input type="datetime-local" name="from"></p>
                </div>
                <div class="col">
                    <label for="datepicker2">Date:</label>
                    <input type="datetime-local" name="date"></p>
                </div>
            </div>
            <div class="row">
                <nav aria-label="..." class=" d-flex justify-content-end extend mx-auto">
                <ul class="pagination pagination-sm ">
                    <?php $total = count($counts)/10; ?>
<?php           for($i=1;$i<=$total;$i++){  ?>
                    <li class="page-item"><a class="page-link" id="page_no" onclick="changeValue(<?=$i?>)" ><?=$i?></a></li>
<?php           }                           ?>
                    <input type="hidden" id="page_no_select" name="page_number" value=''></p>
                </ul>
                </nav>
            </div>
            <!-- <input type="submit" value="Search"> -->
        </form>

        <table class="table w-75 mx-auto table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Leads Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Registered Datetime</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody id="leads">
                
            </tbody>
        </table>


    </div>
</body>
</html>