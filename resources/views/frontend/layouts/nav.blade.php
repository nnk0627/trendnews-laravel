    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-light">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 bg-warning d-inline-flex align-items-center text-dark py-2 px-4">
                    <span class="me-2 fw-semi-bold"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                    <span>+012 345 6789</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0 sticky-top shadow">
        <div class="navbar nav navbar-expand-md py-2 bg-white px-4 px-lg-5">
            <a class="navbar-brand p-0" href="{{ url('/') }}">
                <img src="{{ asset('images/qse.png') }}" width="100" height="60" alt="logo" class="  py-1">
            </a>
            <p class="navbar-brand d-flex align-items-center">
            <h2 class="m-0"><b>TREND NEWS</b></h2></p>
                      
           
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <ul class="navbar-nav ml-5">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('blog') }}">NEWS <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('contact-us')}}">CONTACT<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    CATEGORY
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach($categories as $category)
                                        <a class="dropdown-item" href="{{route('family',$category->id)}}">
                                        {{$category->title}}</a>   
                                    @endforeach

                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
               
            </div>
        </div>
    </div>
