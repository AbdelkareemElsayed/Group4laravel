
<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Subjects  </h1> <br>

            <?php // auth()->user()->name.'|||'.auth()->user()->id  ?>

            {{ session()->get('Message') }}
  
            <?php 
                
               // session()->forget(['Message','name','email']);
            
                // session()->flush();
            ?>
<a href="{{ url('/LogOut') }}"> Logout</a>

        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Added By</th>
                <th>CreatedAt</th>
                <th>Action</th>
            </tr>

    

    @foreach ($data as $fetchedData )
        



           <tr>
                <td>{{ $fetchedData->id }}</td>
                <td>{{ $fetchedData->title }}</td>
                <td>{{ $fetchedData->add_by->name }}</td>
                <td>{{ $fetchedData->created_at }}</td>

                 <td>       
                    <a href='' data-toggle="modal" data-target="#modal_single_del{{ $fetchedData->id  }}" class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='{{ url('Subject/'.$fetchedData->id.'/edit') }}' class='btn btn-primary m-r-1em'>Edit</a>       
                </td>

           </tr>  
           


           <div class="modal" id="modal_single_del{{ $fetchedData->id  }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">delete confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
                   </button>
                    </div>
        
                    <div class="modal-body">
                            
                        {{ $fetchedData->title }}
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('Subject/'.$fetchedData->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                             
                            <div class="not-empty-record">
                                <button type="submit" class="btn btn-primary">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    @endforeach

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>










