@php
 $admin = \App\Helper\MyFuncs::getUser();
if ($l_lang_type == 1) {
    $include_page_extends = 'temp_5.include.main';
    $include_page_section = 'temp_5.include.main.container';
}else{
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
    <h1 class="mb-2 mb-lg-0">Contact</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li class="current">Contact</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->
<!-- Contact 2 Section -->
   <section id="contact-2" class="contact-2 section">

    

     <div class="container" data-aos="fade-up" data-aos-delay="100">

       <!-- Contact Info -->
       

       <!-- Contact Form -->
       <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
         <div class="col-lg-10">
           <div class="contact-form-wrapper">
             <h2 class="text-center mb-4">Registration for Deen Dayal Jan Awas Yojna under the Housing Policy 2016, Government of Haryana</h2>

             <form action="{{ route('property.register') }}" method="POST" class="php-email-form no-reset">
             {{csrf_field()}}
             <div class="row g-3">
               <div class="col-md-6">
                 <div class="form-group">
                   <input type="text" class="form-control" name="applicant_name" placeholder="Your Name" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <input type="text" class="form-control" name="father_name_husband_name" placeholder="Father/Husband Name" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <input type="date" class="form-control" name="date_of_birth" placeholder="Date of Birth" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <input type="tel" class="form-control" name="phone_number" placeholder="Phone Number" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <input type="text" class="form-control" name="reference_code" placeholder="Reference Code" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <input type="text" class="form-control" name="aadhar_card_number" placeholder="Aadhar Card Number" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <input type="text" class="form-control" name="pan_card_number" placeholder="Pan Card Number" required="">
                 </div>
               </div>

               <div class="col-12">
                 <div class="form-group">
                   <input type="text" class="form-control" name="address" placeholder="Address" required="">
                 </div>
               </div>

               <div class="col-md-4">
                 <div class="form-group">
                   <input type="text" class="form-control" name="city" placeholder="City" required="">
                 </div>
               </div>

               <div class="col-md-4">
                 <div class="form-group">
                   <input type="text" class="form-control" name="state" placeholder="State" required="">
                 </div>
               </div>

               <div class="col-md-4">
                 <div class="form-group">
                   <input type="text" class="form-control" name="pincode" placeholder="Pincode" required="">
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <select name="quota" class="form-control" required="">
                     <option value="Select Quota">Select Quota</option>
                     <option value="Government Employee">Government Employee</option>
                     <option value="Female">Female</option>
                     <option value="General">General</option>
                     <option value="Management">Management</option>
                   </select>
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                   <select name="size" class="form-control" required="">
                     <option value="160.167">160.167</option>
                     <option value="140.562">140.562</option>
                     <option value="170.397">170.397</option>
                     <option value="173.306">173.306</option>
                     <option value="173.384">173.384</option>
                     <option value="164.309">164.309</option>
                     <option value="179.383">179.383</option>
                     <option value="177.521">177.521</option>
                   </select>
                 </div>
               </div>

               <div class="col-12">
                 <div class="form-group">
                   <label>
                     <input type="checkbox" name="terms_conditions" required> I agree to the terms and conditions
                   </label>
                 </div>
               </div>

               <div class="col-12 text-center">
                 <button type="submit" class="btn-submit">Submit &amp; Pay</button>
               </div>
             </div>
           </form>
           </div>
         </div>
       </div>

     </div>


   

   </section><!-- /Contact 2 Section -->

@endsection