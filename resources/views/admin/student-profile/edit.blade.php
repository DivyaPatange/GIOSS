@extends('admin.adminLayout.mainlayout')
@section('title', 'Student Profile')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Edit Student Profile')
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
<form method="POST" action="{{ route('admin.student-profile.update', $studentProfile->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Admission Form Info</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="form_no">Form No.</label>
                            <input type="number" class="form-control @error('form_no') is-invalid @enderror" id="form_no" name="form_no" value="{{ $studentProfile->form_no }}">
                            @error('form_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="serial_id">Serial ID</label>
                            <input type="number" class="form-control @error('serial_id') is-invalid @enderror" id="serial_id" name="serial_id" value="{{ $studentProfile->serial_id }}">
                            @error('serial_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="admission_number">Admission Number</label>
                            <input type="number" class="form-control @error('admission_number') is-invalid @enderror" id="admission_number" name="admission_number" value="{{ $studentProfile->admission_number }}">
                            @error('admission_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="academic_session">Academic Session</label>
                            <select class="form-control @error('academic_session') is-invalid @enderror" id="academic_session" name="academic_session">
                                <option value="">-Select Academic Session-</option>
                                @foreach($academicYear as $a)
                                <option value="{{ $a->id }}" {{ ($studentProfile->academic_session == $a->id) ? 'selected=selected' : '' }}>{{ $a->from_academic_year }} - {{ $a->to_academic_year }}</option>
                                @endforeach
                            </select>
                            @error('academic_session')
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
                                <option value="">-Select School-</option>
                                @foreach($schoolProfile as $s)
                                <option value="{{ $s->id }}" {{ ($studentProfile->school_name == $s->id) ? 'selected=selected' : '' }}>{{ $s->school_name }}</option>
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
                            <label for="class_teacher_name">Class Teacher Name</label>
                            <select class="form-control @error('class_teacher_name') is-invalid @enderror" id="class_teacher_name" name="class_teacher_name">
                                <option value="">-Select Class Teacher-</option>
                                @foreach($teacher as $t)
                                <option value="{{ $t->id }}" {{ ($studentProfile->class_teacher_name == $t->id) ? 'selected=selected' : '' }}>{{ $t->name }}</option>
                                @endforeach
                            </select>
                            @error('class_teacher_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Class Name</label>
                            <select class="form-control @error('class') is-invalid @enderror" id="class" name="class">
                                <option value="">-Select Class-</option>
                                @foreach($class as $c)
                                <?php
                                    $standard = DB::table('standards')->where('id', $c->standard)->first();
                                    $section = DB::table('sections')->where('id', $c->section)->first();
                                ?>
                                <option value="{{ $c->id }}" {{ ($studentProfile->class == $c->id) ? 'selected=selected' : '' }}>@if(!empty($standard)) {{ $standard->standard }} @endif @if(!empty($section)) {{ $section->section }} @endif </option>
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
                            <label>Admission Scheme</label>
                            <input type="text" class="form-control @error('admission_scheme') is-invalid @enderror" name="admission_scheme" value="{{ $studentProfile->admission_scheme }}">
                            @error('admission_scheme')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Admission Date</label>
                            <input type="date" class="form-control @error('admission_date') is-invalid @enderror" name="admission_date" value="{{ $studentProfile->admission_date }}">
                            @error('admission_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Personal Information</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $studentProfile->first_name }}">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name" value="{{ $studentProfile->middle_name }}">
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $studentProfile->last_name }}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion" value="{{ $studentProfile->religion }}">
                            @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ $studentProfile->category }}">
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="caste">Caste</label>
                            <input type="text" class="form-control @error('caste') is-invalid @enderror" id="caste" name="caste" value="{{ $studentProfile->caste }}">
                            @error('caste')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Place of Birth</label>
                            <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" name="place_of_birth" value="{{ $studentProfile->place_of_birth }}">
                            @error('place_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mother Tongue</label>
                            <input type="text" class="form-control @error('mother_tongue') is-invalid @enderror" name="mother_tongue" value="{{ $studentProfile->mother_tongue }}">
                            @error('mother_tongue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option value="">-Select Gender-</option>
                                <option value="Male" {{ ($studentProfile->gender == "Male") ? 'selected=selected' : '' }}>Male</option>
                                <option value="Female" {{ ($studentProfile->gender == "Female") ? 'selected=selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Student Photo</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @if($studentProfile->photo)
                    <input type="hidden" class="form-control-file" name="hidden_image" value="{{ $studentProfile->photo }}">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""></label>
                            <a href="{{  URL::asset('studentImg/' . $studentProfile->photo) }}" target="_blank">Click to View</a>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ $studentProfile->date_of_birth }}">
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Parents Information</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ $studentProfile->father_name }}">
                            @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="father_contact_no">Father Contact No.</label>
                            <input type="number" class="form-control @error('father_contact_no') is-invalid @enderror" id="father_contact_no" name="father_contact_no" value="{{ $studentProfile->father_contact_no }}">
                            @error('father_contact_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mother_name">Mother Name</label>
                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ $studentProfile->mother_name }}">
                            @error('mother_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mother_contact_no">Mother Contact No.</label>
                            <input type="number" class="form-control @error('mother_contact_no') is-invalid @enderror" id="mother_contact_no" name="mother_contact_no" value="{{ $studentProfile->mother_contact_no }}">
                            @error('mother_contact_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Residential Address</label>
                            <textarea class="form-control @error('residential_address') is-invalid @enderror" id="residential_address" name="residential_address" cols="30" rows="5">{{ $studentProfile->residential_address }}</textarea>
                            @error('residential_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Guardian Information</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="guardian_name">Guardian Name</label>
                            <input type="text" class="form-control @error('guardian_name') is-invalid @enderror" id="guardian_name" name="guardian_name" value="{{ $studentProfile->guardian_name }}">
                            @error('guardian_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="guardian_address">Guardian Address</label>
                            <input type="text" class="form-control @error('guardian_address') is-invalid @enderror" id="guardian_address" name="guardian_address" value="{{ $studentProfile->guardian_address }}">
                            @error('guardian_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Education Details</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="previous_school">Previous School</label>
                            <input type="text" class="form-control @error('previous_school') is-invalid @enderror" id="previous_school" name="previous_school" value="{{ $studentProfile->previous_school }}">
                            @error('previous_school')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="previous_school_address">Previous School Address</label>
                            <input type="text" class="form-control @error('previous_school_address') is-invalid @enderror" id="previous_school_address" name="previous_school_address" value="{{ $studentProfile->previous_school_address }}">
                            @error('previous_school_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="previous_class">Previous Class Name</label>
                            <input type="text" class="form-control @error('previous_class') is-invalid @enderror" id="previous_class" name="previous_class" value="{{ $studentProfile->previous_class }}">
                            @error('previous_class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="medium_of_instruction">Medium of Instruction</label>
                            <input type="text" class="form-control @error('medium_of_instruction') is-invalid @enderror" id="medium_of_instruction" name="medium_of_instruction" value="{{ $studentProfile->medium_of_instruction }}">
                            @error('medium_of_instruction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="extra_curricular_activity">Extra-Curricular Activity</label>
                            <input type="text" class="form-control @error('extra_curricular_activity') is-invalid @enderror" id="extra_curricular_activity" name="extra_curricular_activity" value="{{ $studentProfile->extra_curricular_activity }}">
                            @error('extra_curricular_activity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="health_problem">Health Problem</label>
                            <input type="text" class="form-control @error('health_problem') is-invalid @enderror" id="health_problem" name="health_problem" value="{{ $studentProfile->health_problem }}">
                            @error('health_problem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>School Recognised</label>
                            <select class="form-control @error('school_recognised') is-invalid @enderror" id="school_recognised" name="school_recognised">
                                <option value="">-Select School Recognised-</option>
                                <option value="yes" {{ ($studentProfile->school_recognised == "yes") ? 'selected=selected' : '' }}>Yes</option>
                                <option value="no" {{ ($studentProfile->school_recognised == "no") ? 'selected=selected' : '' }}>No</option>
                            </select>
                            @error('school_recognised')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_of_leaving">Date of Leaving</label>
                            <input type="date" class="form-control @error('date_of_leaving') is-invalid @enderror" id="date_of_leaving" name="date_of_leaving" value="{{ $studentProfile->date_of_leaving }}">
                            @error('date_of_leaving')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Documents</div>
            </div>
            <div class="card-body">        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Transfer Certificate</label>
                            <select class="form-control @error('transfer_certificate') is-invalid @enderror" id="transfer_certificate" name="transfer_certificate">
                                <option value="">-Select-</option>
                                <option value="yes" {{ ($studentProfile->transfer_certificate == "yes") ? 'selected=selected' : '' }}>Yes</option>
                                <option value="no" {{ ($studentProfile->transfer_certificate == "no") ? 'selected=selected' : '' }}>No</option>
                            </select>
                            @error('transfer_certificate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bonafide_certificate">Bonafide Certificate</label>
                            <select class="form-control @error('bonafide_certificate') is-invalid @enderror" id="bonafide_certificate" name="bonafide_certificate">
                                <option value="">-Select-</option>
                                <option value="yes" {{ ($studentProfile->bonafide_certificate == "yes") ? 'selected=selected' : '' }}>Yes</option>
                                <option value="no" {{ ($studentProfile->bonafide_certificate == "no") ? 'selected=selected' : '' }}>No</option>
                            </select>
                            @error('bonafide_certificate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">For Office Use</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="admission_fees_discount">Admission Fees Discount</label>
                            <input type="text" class="form-control @error('admission_fees_discount') is-invalid @enderror" id="admission_fees_discount" name="admission_fees_discount" value="{{ $studentProfile->admission_fees_discount }}">
                            @error('admission_fees_discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="term_fees_discount">Term Fees Discount</label>
                            <input type="text" class="form-control @error('term_fees_discount') is-invalid @enderror" id="term_fees_discount" name="term_fees_discount" value="{{ $studentProfile->term_fees_discount }}">
                            @error('term_fees_discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success btn-submit">Update</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
@section('customjs')
<script >
    $(document).ready(function() {

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <input type="checkbox" class="addSibling"></td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                action,
                $("#addName").val(),
                $("#addClass").val(),
                $("#addSection").val(),
                $("#addPercentage").val(),
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>
@endsection
