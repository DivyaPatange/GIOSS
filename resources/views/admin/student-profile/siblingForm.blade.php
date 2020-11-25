@extends('admin.adminLayout.mainlayout')
@section('title', 'Sibling Details')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Sibling Details')
@section('content')
<div class="row" id="message">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
		<div class="alert alert-success alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong><i class="fa fa-check text-white">&nbsp;</i>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('danger'))
		<div class="alert alert-danger alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
		</div>
		@endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Sibling Details</div>
            </div>
            <form>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" name="class" value="{{ old('class') }}">
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" class="form-control @error('section') is-invalid @enderror" id="section" name="section" value="{{ old('section') }}">
                            @error('section')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="admission_id" value="{{ $studentProfile->id }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Percentage</label>
                            <input type="text" class="form-control @error('percentage') is-invalid @enderror" id="percentage" name="percentage" value="{{ old('percentage') }}">
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="card-action">
                <button type="button" class="btn btn-success btn-submit">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $studentProfile->first_name }} Sibling List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Percentage</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($siblings as $key=>$s)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->class }}</td>
                                <td>{{ $s->section }}</td>
                                <td>{{ $s->percentage }}</td>
                                <td>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><button class="btn btn-icon btn-round btn-danger">
											<i class="fa fa-trash"></i>
										</button></a>
                                    <form action="{{ route('admin.sibling.destroy', $s->id) }}" method="post">
                                        @method('DELETE')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });
</script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(".btn-submit").click(function(e){

e.preventDefault();
var name = $("input[name=name]").val();
var classes = $("input[name=class]").val();
var section = $("input[name=section]").val();
var percentage = $("input[name=percentage]").val();
var admission_id = $("input[name=admission_id]").val();

var url = '{{ route('admin.sibling.submit') }}';

$.ajax({
   url:url,
   method:'POST',
   data:{ admission_id:admission_id, name:name, classes:classes, section:section, percentage:percentage },
   success:function(response){
      if(response.success){
        swal(response.message, {
            icon : "success",
            buttons: {        			
                confirm: {
                    className : 'btn btn-success'
                }
            },
        }); //Message come from controller
        setTimeout(() => {
            location.reload();
        }, 2000);
      }else{
          alert("Error")
      }
   },
   error:function(error){
      console.log(error)
   }
});
});
</script>

@endsection
