
<div class="panel-body">
       <table class="table table-border-striped" id="document-table">
           <thead>
               <tr>
                   <td> S.No </td>
                   <td> Document </td>
                   <td> Action </td>
               </tr>
           </thead>
           <tbody>
               @foreach ($files as $file)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <a href='#print-view-modal-div' data-document_type="{{pathinfo($file, PATHINFO_EXTENSION)}}" data-path="{{$file}}" onclick="printDocument(this)" class="document">{{explode('$$',$file)[1]}}</a>
                    </td>
                    <td>
                        <a href='#print-view-modal-div' class='btn btn-info btn-sm' data-document_type="{{pathinfo($file, PATHINFO_EXTENSION)}}" data-path="{{$file}}" onclick="printDocument(this)" class="document">view</a>
                        <a href="#" class='btn btn-danger btn-sm delete-document' data-document="{{$file}}">delete</a>
                    </td>
                </tr>
               @endforeach
             
           </tbody>
       </table>
</div>

      