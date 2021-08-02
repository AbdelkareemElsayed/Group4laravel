<?php 

    foreach ($data as $key => $value) {
        # code...

        echo $key.' >>>'.$value.'<br>';
    }


?>




<?php 

   echo 'test message';

?>


{{ 'test message' }}



<?php  
   if(){

   }elseif (condition) {
       # code...
   }else{

   }

?>


@if ()

@elseif()
     
@else 

@endif





<?php 

  if(isset()){

  }

?>



@isset($record)
    
@endisset




<?php 

  if(empty()){

  }

?>


@empty($record)
    
@endempty



<?php 


for ($i=0; $i < ; $i++) { 
    # code...
}


?>




@for ( = ;  < ; ++)
    
@endfor




<?php 
 
 foreach ($variable as $key => $value) {
     # code...
 }

?>



@foreach ( as )
    
@endforeach