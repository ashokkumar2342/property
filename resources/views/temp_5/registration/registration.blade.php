@php
$admin = \App\Helper\MyFuncs::getUser();
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_5.include.main';
    $include_page_section = 'temp_5.include.main.container';
} else {
    $include_page_extends = 'temp_5.include_hindi.main';
    $include_page_section = 'temp_5.include_hindi.main.container';
}
$rs_school_detail = App\Helper\WebHelper::getSchoolDetail();
@endphp

@extends($include_page_extends)
@section($include_page_section)

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Registration</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Registration</li>
            </ol>
        </nav>
    </div>
</div>

<section id="contact-2" class="contact-2 section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="row bg-white rounded-4 shadow-lg overflow-hidden">

                    {{-- Left: Form --}}
                    <div class="col-md-7 p-5">
                        <h4 class="text-center text-success fw-bold mb-4 border-bottom pb-3">
                            Registration for Deen Dayal Jan Awas Yojna <br>
                            <small class="text-muted">under Housing Policy 2016, Govt. of Haryana</small>
                        </h4>

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 shadow-sm">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('template.registration.submit') }}" method="post" button-click="btn_close"  enctype="multipart/form-data">
                         {{ csrf_field() }}
                            <input type="hidden" name="project_id" value="{{$project_id}}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Applicant Name</label>
                                    <input type="text" name="applicant_name" class="form-control rounded-pill" value="{{ old('applicant_name') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Father / Husband Name</label>
                                    <input type="text" name="father_name_husband_name" class="form-control rounded-pill" value="{{ old('father_name_husband_name') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control rounded-pill" value="{{ old('date_of_birth') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" name="phone_number" class="form-control rounded-pill" value="{{ old('phone_number') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control rounded-pill" value="{{ old('email') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Reference By</label>
                                    <input type="text" name="reference_code" class="form-control rounded-pill" value="{{ old('reference_code') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Aadhar Card Number</label>
                                    <input type="text" name="aadhar_card_number" class="form-control rounded-pill" value="{{ old('aadhar_card_number') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">PAN Card Number</label>
                                    <input type="text" name="pan_card_number" class="form-control rounded-pill" value="{{ old('pan_card_number') }}" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control rounded-3" rows="2" required>{{ old('address') }}</textarea>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" class="form-control rounded-pill" value="{{ old('city') }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">State</label>
                                    <input type="text" name="state" class="form-control rounded-pill" value="{{ old('state') }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" name="pincode" class="form-control rounded-pill" value="{{ old('pincode') }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Quota</label>
                                    <select name="quota" class="form-select rounded-pill" required>
                                        <option value="" disabled {{ old('quota') ? '' : 'selected' }}>Select Quota</option>
                                        <option value="Government Employee" {{ old('quota') == 'Government Employee' ? 'selected' : '' }}>Government Employee</option>
                                        <option value="Female" {{ old('quota') == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="General" {{ old('quota') == 'General' ? 'selected' : '' }}>General</option>
                                        <option value="Management" {{ old('quota') == 'Management' ? 'selected' : '' }}>Management</option>
                                    </select>
                                </div>

                             {{--    <div class="col-md-6">
                                    <label class="form-label">Plot Size</label>
                                    <select name="size" class="form-select rounded-pill" required>
                                        <option value="" disabled {{ old('size') ? '' : 'selected' }}>Select Size</option>
                                        <option value="89.221 Sq Yd" {{ old('size') == '89.221 Sq Yd' ? 'selected' : '' }}>89.221 Sq Yd</option>
                                        <option value="160.167" {{ old('size') == '160.167' ? 'selected' : '' }}>160.167</option>
                                        <option value="140.562" {{ old('size') == '140.562' ? 'selected' : '' }}>140.562</option>
                                    </select>
                                </div> --}}

                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" name="terms_conditions" id="terms" class="form-check-input" required {{ old('terms_conditions') ? 'checked' : '' }}>
                                        <label for="terms" class="form-check-label">
                                            I agree to the <a href="#" class="text-decoration-underline">terms & conditions</a>.
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success w-100 rounded-pill py-2 fw-bold shadow-sm">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Right: QR & Bank Info --}}
                    <div class="col-md-5 bg-light p-4 d-flex flex-column justify-content-center text-center">
                        <div class="mb-3">
                            <img src="{{ asset('temp_5/assets/img/qrcode.jpeg') }}" alt="QR Code" class="img-fluid shadow-sm rounded-3" style="max-width: 220px;">
                            <p class="mt-3 mb-1 fw-bold fs-5">DILIP KUMAR CHAUHAN</p>
                            <p class="mb-2">UPI ID: <strong>8210228581@ybl</strong></p>
                            <p class="text-muted small">Scan &amp; Pay instantly</p>
                        </div>

                        <div class="text-start bg-white p-3 rounded-3 shadow-sm small">
                            <p><strong>Account Name:</strong> DILIP KUMAR CHAUHAN</p>
                            <p><strong>Bank:</strong> HDFC Bank</p>
                            <p><strong>Account No:</strong> 50100296980832</p>
                            <p><strong>IFSC Code:</strong> HDFC0002059</p>
                            <p><strong>Branch:</strong> Rajgir, Nalanda (Bihar)</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
