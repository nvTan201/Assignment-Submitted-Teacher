@extends('student/layout.app')
@section('content')
    
<div class="content">
    <h1>HELLO</h1>
 
       
          <body>
              <form>
                <input type="file">
                <button type="button">clear</button>
              </form>
          </body>

          <script>
            var es = document.forms[0].elements;
            
            es[1].onclick = function(){
              clearInputFile(es[0]);
            };
            
                function clearInputFile(f){
                    if(f.value){
                        try{
                            f.value = ''; //for IE11, latest Chrome/Firefox/Opera...
                        }catch(err){
                        }
                        if(f.value){ //for IE5 ~ IE10
                            var form = document.createElement('form'), ref = f.nextSibling;
                            form.appendChild(f);
                            form.reset();
                            ref.parentNode.insertBefore(f,ref);
                        }
                    }
                }
            </script>
</div>
@endsection

            