@extends('layouts.app')

@section('content')
    <button type="button" class="btn btn-primary add-btn" data-remote="{{ $addForm }}">
      Add
    </button>    
    <table id="myTable">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Products</th>
            <th>Action</th>
        </thead>
           <tfoot>
              <tr> 
                  <th>Name</th>
                  <th>Status</th>
                  <th>Products</th>
                  <th>Action</th>                            
              </tr>
          </tfoot>
          <tbody>
              
          </tbody>
    </table>
@endsection
    


@section('modal')
<!-- Modal -->
<div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTitle">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      </div>
    
    </div>
  </div>
</div>

<!-- Button trigger modal -->

@endsection

@section('script')
<div id="scriptContainer"></div>
<script>
    $(document).ready(function() {
        // var table = $('#table').DataTable({
        //     processing: true,
        //     serverside: true,
        //     ajax: {
        //         url: "{{ route('category.index') }}",
        //         type: 'GET',
        //     },
        //     columns:[
        //         { data: 'name' },
        //         { data: 'status' },
        //         { data: 'products' },
        //         { data: 'action' },
        //     ]
        // });

        var table = $('#myTable').DataTable({
            processing: true,
            serverside: true,
            ajax: {
                url: "{{ route('category.index')  }}",
                type: 'GET',
            },
            columns: [
                { data: 'name' },
                { data: 'status' },
                { data: 'products' },
                { data: 'action' }
            ]
        });

        $(document).on('click', '.add-btn,.edit-btn', function(e){
            e.preventDefault();
            var url = $(this).attr('data-remote');
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response){
                    $('#FormModal').find('#modalTitle').text(response.title);
                    $('#FormModal').find('.modal-body').html(response.html);
                    $('#scriptContainer').html(response.validation);
                    $('#FormModal').modal('show');
                }
            });
        });

        $(document).on('submit', '#addForm', function(e){
            e.preventDefault();
            var url = $(this).attr('action');
            var method = new URL(url).searchParams.get('type') === 'update' ? 'PUT' : 'POST'; 
            $.ajax({
                url: url,
                type: method,
                data: $(this).serializeArray(),
                success: function(response){
                  table.ajax.reload(null, false);
                  $('#FormModal').modal('hide');
                },
                error: function(jqXHR, textStatus, errorThrown){
                  var errorMessages = [];
                  var errorMsg = '';
                  if(xhr.responseJSON && xhr.responseJSON.errors){
                    $.each(xhr.responseJSON.errors,function(field,errors){
                        errorMessages.push(errors[0]);
                    });
                    errorMsg = errorMessages.join('\n');
                  }else{
                    errorMsg = 'Somthing went wrong';
                  }
                  Swal.fire({
                    'icon': 'error',
                    'title': 'Error',
                    'text': errorMsg
                  });
                }
            });
        });

        $(document).on('click', '.delete-btn', function(){
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {

                var url = $(this).attr('data-remote');
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                      'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                      table.ajax.reload(null, false);
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      );
                    }
                  });
              }
            })
        });

    });
</script>
    
@endsection