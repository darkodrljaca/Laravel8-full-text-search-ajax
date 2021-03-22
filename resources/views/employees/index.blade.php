<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employees</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </head>
</html>
<body>
    <div class="container">    
    <br />
    <h3 align="center">Search with Laravel 8 and Ajax</h3>
    <br />
    <div class="row">
        <div class="col-md-10">
            <input type="text" name="full_text_search" id="full_text_search" class="form-control" placeholder="Search" value="">
        </div>
            <div class="col-md-2">
            @csrf
            <button type="button" name="search" id="search" class="btn btn-success">Search</button>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Employee Name</th>                    
                    <th>Address</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                </tr>
            </thead>
        <tbody></tbody>
        </table>
    </div>
    
    </div>
</body>
</html>

<script>
$(document).ready(function(){

 load_data('');

 function load_data(search_text = '')
 {
  var _token = $("input[name=_token]").val();
  $.ajax({
   url:"{{ route('search-employee.action') }}",
   method:"POST",
   data:{
       search_text:search_text, 
       _token:_token
   },
   dataType:"json",
   success:function(data)
   {
    var output = '';
    if(data.length > 0)
    {
     for(var x = 0; x < data.length; x++)
     {
      output += '<tr>';
      output += '<td>'+data[x].name+'</td>';      
      output += '<td>'+data[x].address+'</td>';
      output += '<td>'+data[x].city+'</td>';
      output += '<td>'+data[x].postal_code+'</td>';
      output += '<td>'+data[x].country+'</td>';
      output += '</tr>';
     }
    }
    else
    {
     output += '<tr>';
     output += '<td colspan="6">There is no data</td>';
     output += '</tr>';
    }
    $('tbody').html(output);
   }
  });
 }

 $('#search').click(function(){
  var search_text = $('#full_text_search').val();
  load_data(search_text);
 });

});
</script>
