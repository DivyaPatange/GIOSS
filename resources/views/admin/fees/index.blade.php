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
                <div class="card-title">Edit Fee</div>
            </div>
            <form method="POST" action="{{ route('admin.fee.store') }}">
            @csrf
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fee_head">Fee Head</label>
                            <select class="form-control @error('fee_head') is-invalid @enderror" id="fee_head" name="fee_head">
                                <option value="">-Select Fee Head-</option>
                                @foreach($feeHead as $f)
                                <option value="{{ $f->id }}">{{ $f->fee_head }}</option>
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
                                <option value="{{ $s->id }}">{{ $s->standard }}</option>
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
                                <option value="{{ $a->id }}">({{ $a->from_academic_year }}) - ({{ $a->to_academic_year }})</option>
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
                                <option value="{{ $s->id }}">{{ $s->school_name }}</option>
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
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}">
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
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
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
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Fees List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Fee Head</th>
                                <th>Class</th>
                                <th>Academic Year</th>
                                <th>School Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Fee Head</th>
                                <th>Class</th>
                                <th>Academic Year</th>
                                <th>School Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($fees as $key=>$f)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <?php
                                    $feeHeads = DB::table('fees_heads')->where('id', $f->fee_head)->first();
                                    $standards = DB::table('standards')->where('id', $f->class)->first();
                                    $academicYears = DB::table('academic_years')->where('id', $f->academic_year)->first();
                                    $schoolName = DB::table('school_profiles')->where('id', $f->school_name)->first();
                                ?>
                                <td>@if(isset($feeHeads) && !empty($feeHeads)) {{ $feeHeads->fee_head }} @endif</td>
                                <td>@if(isset($standards) && !empty($standards)) {{ $standards->standard }} @endif</td>
                                <td>@if(isset($academicYears) && !empty($academicYears)) ({{ $academicYears->from_academic_year }}) - ({{ $academicYears->to_academic_year }}) @endif</td>
                                <td>@if(isset($schoolName) && !empty($schoolName)) {{ $schoolName->school_name }} @endif</td>
                                <td>{{ $f->amount }}</td>
                                <td>{{ $f->description }}</td>
                                <td><a href="{{ route('admin.fee.edit', $f->id) }}"><button class="btn btn-icon btn-round btn-secondary">
										<i class="fa fa-pencil"></i>
									</button></a>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><button class="btn btn-icon btn-round btn-danger">
											<i class="fa fa-trash"></i>
										</button></a>
                                    <form action="{{ route('admin.fee.destroy', $f->id) }}" method="post">
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
@endsection
