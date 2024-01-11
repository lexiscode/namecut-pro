@extends('frontend.layouts.master')

@section('main-content')


<!-- slider section -->
        <section class="slider_section long_section">
        <div id="customCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-innerr">

                <div>
                    <!--<img src="https://bit.ly/47qFPkD" alt="image">-->
                    <img src="{{ asset('frontend/images/about-img.png') }}" alt="image">
                    <br>
                    <p><b style="color:red">Note:</b> Please if you had registered under our company and are still
                        yet to be verified in 48 hours upon application, kindly reach out to us via our contact for
                        inquiries!
                    </p>
                </div>

                <div class="table-container">
                    <h2>All Published Names</h2>
                    <p>To check if the document is valid and verified by us, simply use the filter to search by either #ID number or name!</p>

                    <div class="table--search">
                        <div class="table--search--wrapper">
                            <select class="table--search--select" name="" id="">
                                <option value="">Filter</option>
                            </select>
                        </div>
                        <div class="relative">
                            <i class="table--search--input--icon fas fa-search"></i>
                            <input class="table--search--input" type="text" placeholder="Filter by ID or name">
                        </div>
                    </div>

                    <table class="table table-warning table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Old Name</th>
                                <th scope="col">New Name</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark John</td>
                                <td>Otto Steve</td>
                                <td>verified</td>
                            </tr>
                            <tr>
                                <td>Jacob Stone</td>
                                <td>Thornton Young</td>
                                <td>processing</td>
                            </tr>
                            <tr>
                                <td>Larry Bird</td>
                                <td>Randy Gate</td>
                                <td>verified</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        </section>


@endsection
