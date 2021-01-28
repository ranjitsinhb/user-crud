@include('user::layout/header')

    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('user') }}">Users</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('user') }}">View All users</a></li>
            </ul>
        </nav>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h2 class="h3 mb-4 page-title">User Profile</h2>
                <div class="my-4">                    
                        <div class="mt-5 align-items-center">                            
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <h4 class="mb-1">{{$data->name}}</h4>
                                        <p class="small mb-3"><span class="font-italic">{{$data->email}}</span></p>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-7">
                                        <p class="text-muted">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst. Cras urna quam, malesuada vitae risus at,
                                            pretium blandit sapien.
                                        </p>
                                    </div>
                                    {{-- <div class="col">
                                        <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
                                        <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
                                        <p class="small mb-0 text-muted">(537) 315-1481</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>                       
                </div>
                <button type="button" class="btn btn-danger" onclick="location.href='{{ URL::to('user') }}'">Back</button>

            </div>
        </div>
        
        </div>
           
@include('user::layout/footer')
