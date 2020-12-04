@extends('admin.adminLayout.mainlayout')
@section('title', 'Pay Fee')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
<style>
.block{
    width:100%;
    margin:10px;
    padding:15px;
    color : white;
}
.blue{
    background-color : blue;
    color : white;
}
.orange{
    background-color : orange;
    color : white;
}
.red{
    background-color : red;
    color : white;
}
.green{
    background-color : green;
    color : white;
}
</style>
@endsection
@section('page_title', 'Pay Fee')
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
                <div class="card-title">Student Information</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fee_head">Admission ID</label>
                            <input type="number" class="form-control" readonly value="{{ $studentID->id }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="class">Student Name</label>
                            <input type="text" class="form-control" readonly value="{{ $studentID->first_name }} {{ $studentID->middle_name }} {{ $studentID->last_name }}">
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <?php
                        $academicYear = DB::table('academic_years')->where('id', $studentID->academic_session)->first();
                        $schoolName = DB::table('school_profiles')->where('id', $studentID->school_name)->first();
                        $class = DB::table('classes')->where('id', $studentID->class)->first();
                        if(!empty($class))
                        {
                            $standard = DB::table('standards')->where('id', $class->standard)->first();
                            // dd($standard);
                            if(!empty($standard))
                            {
                                $fees = DB::table('fees')->where('class', $standard->id)->where('academic_year', $studentID->academic_session)
                                ->where('school_name', $studentID->school_name)->get();
                                $totalFees = DB::table('fees')->where('class', $standard->id)->where('academic_year', $studentID->academic_session)
                                ->where('school_name', $studentID->school_name)->get()->sum('amount');
                                // dd($totalFees);
                            }
                        }
                    ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="academic_year">Academic Year</label>
                            <input type="text" class="form-control" value="@if(isset($academicYear) && !empty($academicYear)) ({{ $academicYear->from_academic_year }}) - ({{ $academicYear->to_academic_year }}) @endif" readonly>
                            @error('academic_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="amount">Class</label>
                            <input type="text" class="form-control" value="@if(!empty($class)) @if(!empty($standard)) {{ $standard->standard }}  @endif @endif" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="description">Admission Date</label>
                            <input type="date" class="form-control" value="{{ $studentID->admission_date }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="school_name">School Name</label>
                            <input type="text" class="form-control" value="@if(isset($schoolName) && !empty($schoolName)) {{ $schoolName->school_name }} @endif" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <label class="ml-2"><i class="fa fa-inr">&nbsp;</i>Total Fees</label>
                        <div class="bg-secondary block">
                        <i class="fa fa-inr">&nbsp;</i>{{ $totalFees - $studentID->admission_fees_discount - $studentID->term_fees_discount }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="ml-2"><i class="fa fa-inr">&nbsp;</i>Discount</label>
                        <div class="bg-info block">
                        <i class="fa fa-inr">&nbsp;</i>{{ $studentID->admission_fees_discount + $studentID->term_fees_discount }}
                        </div>
                    </div>
                    <?php
                        $paidFees = DB::table('pays')->where('admission_id', $studentID->id)->get()->sum('pay_amount');
                        // dd($paidFees);
                    ?>
                    <div class="col-md-3">
                        <label class="ml-2"><i class="fa fa-inr">&nbsp;</i>Paid Fees</label>
                        <div class="bg-success block">
                        <i class="fa fa-inr">&nbsp;</i>{{ $paidFees }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="ml-2"><i class="fa fa-inr">&nbsp;</i>Balance</label>
                        <div class="bg-danger block">
                        <i class="fa fa-inr">&nbsp;</i>{{ $totalFees - $studentID->admission_fees_discount - $studentID->term_fees_discount - $paidFees }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-left">Pay Fees</h4>
                <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">View Pay Fees</button>
                <div class="clearfix"></div>
            </div>
            <form action="{{ route('admin.pay.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fee_head">Amount</label>
                                <input type="number" class="form-control @error('pay_amount') is-invalid @enderror" name="pay_amount" value="{{ old('pay_amount') }}">
                                @error('pay_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="class">Payment Date</label>
                                <input type="date" class="form-control @error('payment_date') is-invalid @enderror" name="payment_date" value="{{ old('payment_date') }}">
                                @error('payment_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            @foreach($fees as $key=>$f)
                            <?php
                                $feeHead = DB::table('fees_heads')->where('id', $f->fee_head)->first();
                            ?>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input @error('fee_head') is-invalid @enderror" type="checkbox" name="fee_head" value="{{ $f->id }}">
                                    <span class="form-check-sign">@if(isset($feeHead) && !empty($feeHead)) {{ $feeHead->fee_head }} @endif</span>
                                </label>
                                @error('fee_head')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="admission_id" value="{{ $studentID->id }}">
                <div class="card-action">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paid Fees List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Payment Amount</th>
                        <th>Payment Date</th>
                        <th>Paid For</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Payment Amount</th>
                        <th>Payment Date</th>
                        <th>Paid For</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($payDetails as $key=>$s)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $s->pay_amount }}</td>
                        <?php
                            $fee = DB::table('fees')->where('id', $s->fee_id)->first();
                            if(!empty($fee))
                            {
                                $feeHead = DB::table('fees_heads')->where('id', $fee->fee_head)->first();
                            }
                        ?>
                        <td>
                        {{ $s->payment_date }}
                        </td>
                        <td> @if(isset($fee) && !empty($fee)) @if(isset($feeHead) && !empty($feeHead)) {{ $feeHead->fee_head }} @endif @endif</td>
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
