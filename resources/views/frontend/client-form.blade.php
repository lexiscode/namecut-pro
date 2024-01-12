@extends('frontend.layouts.master')

@section('main-content')

    <!-- Specially below is for PC and Tablet devices -->
    <section class="slider_section_client_form long_section">
        <input type="checkbox" id="one" />
        <input type="checkbox" id="two" />
        <input type="checkbox" id="three" />
        <div class="containerr">
          <h1>Upload Data</h1>
          <div class="indicator">
            <div class="step step1">
              <div>1</div>
              <span>Basic</span>
            </div>
            <div class="line line1"></div>
            <div class="step step2">
              <div>2</div>
              <span>Contact</span>
            </div>
            <div class="line line2"></div>
            <div class="step step3">
              <div>3</div>
              <span>Personal</span>
            </div>

          </div>

          <div class="panel">
            <div class="page1">
              <div class="form">
                <h2>Basic Information</h2>
                <div class="form-group">
                  <input type="text" required />
                  <label for="">First Name</label>
                </div>
                <div class="form-group">
                  <input type="text" required />
                  <label for="">Surname</label>
                </div>
                <div class="btn-groupp">
                  <label for="one" class="btn btn-f">Next</label>
                </div>
              </div>
            </div>

            <div class="page2">
              <div class="form">
                <h2>Contact Information</h2>
                <div class="form-group">
                  <input type="text" required value="{{ auth()->user()->email }}" disabled />
                </div>
                <div class="form-group">
                  <input type="number" required />
                  <label for="">Phone Number</label>
                </div>
                <div class="btn-groupp">
                  <label for="one" class="btn">Previous</label>
                  <label for="two" class="btn">Next</label>
                </div>
              </div>
            </div>

            <div class="page3">
              <div class="form">
                <h2>Affidavit & Certificate</h2>
                <div class="form-group">

                    <input type="file" required />

                </div>
                <div class="form-group">

                    <input type="file" required />

                </div>
                <div class="btn-groupp">
                  <label for="two" class="btn">Previous</label>
                  <label onclick="openCustomModal()" class="btn">Submit</label>
                </div>
              </div>
              <!-- Modal -->
              <div id="customModal" class="custom-modal">
                <span class="custom-close" onclick="closeCustomModal()">&times;</span>
                <p>Before you click confirm, kindly ensure you filled in the correct data
                  and keep your login details safe because you will need it to access your
                  published name. Thank you!
                </p>
                <div class="custom-btn-container">
                  <button onclick="closeCustomModal()" class="btn-secondary">Close</button>
                  <button onclick="confirmCustomAction()" class="btn-warning" type="submit">Confirm</button>
                </div>
              </div>
            </div>

          </div>
        </div>

    </section>
    <br>

    <!-- Specially below is for mobile devices -->
    <section class="section_demarcate long_section">
      <div class="sub_section">
        <h2>Upload Data</h2> <br>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter your first name">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter your surname">
        </div>

        <hr>
        <div class="mb-3">
          <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <input type="number" class="form-control" placeholder="Enter your phone number">
        </div>
        <hr>
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Affidavit</label>
          <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Certificate</label>
          <input class="form-control" type="file" id="formFile">
        </div>
        <hr>
        <div style="text-align: center">
          <button type="button" onclick="openCustomModal2()" class="btn btn-warning">Submit</button>
        </div>
      </div>
      <!-- Modal -->
        <div id="customModal2" class="custom-modal2">
          <span class="custom-close2" onclick="closeCustomModal2()">&times;</span>
          <p>Before you click confirm, kindly ensure you filled in the correct data
            and keep your login details safe because you will need it to access your
            published name. Thank you!
          </p>
          <div class="custom-btn-container2">
            <button onclick="closeCustomModal2()" class="btn-secondary">Close</button>
            <button onclick="confirmCustomAction2()" class="btn-warning" type="submit">Confirm</button>
          </div>
        </div>
    </section>
    <br/><br/>

@endsection

