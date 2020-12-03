@extends('admin.adminLayout.mainlayout')
@section('title', 'Fee')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Fee')
@section('content')
<div class="row">
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
                <div class="card-title">Add Fee</div>
            </div>
            <form method="POST" action="{{ route('admin.fee.update', $fee->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fee_head">Fee Head</label>
                            <select class="form-control @error('fee_head') is-invalid @enderror" id="fee_head" name="fee_head">
                                <option value="">-Select Fee Head-</option>
                                @foreach($feeHead as $f)
                                <option value="{{ $f->id }}" {{ ($f->id == $fee->fee_head) ? 'selected=selected' : '' }}>{{ $f->fee_head }}</option>
                                @endforeach
                            </select>
                            @error('fee_head')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select class="form-control @error('class') is-invalid @enderror" id="class" name="class">
                                <option value="">-Select Class-</option>
                                @foreach($standard as $s)
                                <option value="{{ $s->id }}" {{ ($s->id == $fee->class) ? 'selected=selected' : '' }}>{{ $s->standard }}</option>
                                @endforeach
                            </select>
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="academic_year">Academic Year</label>
                            <select class="form-control @error('academic_year') is-invalid @enderror" id="academic_year" name="academic_year">
                                <option value="">-Select Academic Year-</option>
                                @foreach($academicYear as $a)
                                <option value="{{ $a->id }}" {{ ($a->id == $fee->academic_year) ? 'selected=selected' : '' }}>({{ $a->from_academic_year }}) - ({{ $a->to_academic_year }})</option>
                                @endforeach
                            </select>
                            @error('academic_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="school_name">School Name</label>
                            <select class="form-control @error('school_name') is-invalid @enderror" id="school_name" name="school_name">
                                <option value="">-Select School Name-</option>
                                @foreach($schoolProfile as $s)
                                <option value="{{ $s->id }}" {{ ($s->id == $fee->school_name) ? 'selected=selected' : '' }}>{{ $s->school_name }}</option>
                                @endforeach
                            </select>
                            @error('school_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ $fee->amount }}">
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $fee->description }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
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
@endsection
