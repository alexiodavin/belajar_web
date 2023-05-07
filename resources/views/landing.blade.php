<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('page-title')</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset("adminlte")}}/plugins/summernote/summernote-bs4.min.css">
        
        <link href="resources\css\style.css" rel="stylesheet" />
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
          <div class="container">
              <div class="text-center my-5">
                  <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                  <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
              </div>
          </div>
      </header>
      <!-- Page content-->
      <div class="container">
          <div class="row">
              <!-- Blog entries-->
              <div class="col-lg-8">
                  <!-- Featured blog post-->
                  <div class="card mb-4">
                      <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                      <div class="card-body">
                          <div class="small text-muted">January 1, 2023</div>
                          <h2 class="card-title">Featured Post Title</h2>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                          <a class="btn btn-primary" href="#!">Read more →</a>
                      </div>
                  </div>
                  <!-- Nested row for non-featured blog posts-->
                  <div class="row">
                    @foreach ($posts as $post)
                      <div class="col-lg-6">
                          <!-- Blog post-->
                          <div class="card mb-4">
                              <a href="#!"><img class="card-img-top" src="{{ $post->coverImageUrl()}}" alt="..." style="height:250px; object-fit:cover"/></a>
                              <div class="card-body">
                                  <div class="small text-muted">January 1, 2023</div>
                                  <h2 class="card-title h4">{{ $post->title  }}</h2>
                                  <p class="card-text">{{ Str::limit($post->strip_description, 100, '...') }}</p>
                                  <a class="btn btn-primary" href="{{  url('article/'.$post->id) }}">Read more →</a>
                              </div>
                          </div>
                  </div>
                  @endforeach
                  </div>
                  <!-- Pagination-->
                  <nav aria-label="Pagination">
                      <hr class="my-0" />
                      <ul class="pagination justify-content-center my-4">
                          <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                          <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                          <li class="page-item"><a class="page-link" href="#!">2</a></li>
                          <li class="page-item"><a class="page-link" href="#!">3</a></li>
                          <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                          <li class="page-item"><a class="page-link" href="#!">15</a></li>
                          <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                      </ul>
                   </nav>
                 </div>
              <!-- Side widgets-->
              <div class="col-lg-4">
                <div class="row">
                  <div class="col-md-4">
                    <img src="{{ $post->coverImageUrl()}}" class="img-fluid" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="d-flex w-100 justify-content-between">
                      <h6 class="mb-1">{{ Str::limit($post->title,15,'...') }}</h6>
                          <small>10 mins ago</small>
                        </div>
                        <small class="mb-1">{{ Str::limit($post->strip_description, 50, '...') }}</small>
                    </div>
                  </div>
<br></br>
                  <!-- Search widget-->
                  <div class="card mb-4">
                      <div class="card-header">Search</div>
                      <div class="card-body">
                          <div class="input-group">
                              <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                              <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                          </div>
                      </div>
                  </div>
                  <!-- Categories widget-->
                  <div class="card mb-4">
                      <div class="card-header">Categories</div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-6">
                                  <ul class="list-unstyled mb-0">
                                      <li><a href="#!">Web Design</a></li>
                                      <li><a href="#!">HTML</a></li>
                                      <li><a href="#!">Freebies</a></li>
                                  </ul>
                              </div>
                              <div class="col-sm-6">
                                  <ul class="list-unstyled mb-0">
                                      <li><a href="#!">JavaScript</a></li>
                                      <li><a href="#!">CSS</a></li>
                                      <li><a href="#!">Tutorials</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Side widget-->
                  <div class="card mb-4">
                      <div class="card-header">Side Widget</div>
                      <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                  </div>
              </div>
          </div>
      </div>

          <!--footer-->
          <footer class="bg-dark text-white">
            <div class="container py-5">
              <div class="row">
                <div class="col-md-4">
                  <h5>About Us</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ultricies elit. Nulla facilisi. Nam sodales est ut nisi lobortis bibendum.</p>
                </div>
                <div class="col-md-4">
                  <h5>Recent Posts</h5>
                  <ul class="list-unstyled">
                    <li><a href="#">Post 1</a></li>
                    <li><a href="#">Post 2</a></li>
                    <li><a href="#">Post 3</a></li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <h5>Contact Us</h5>
                  <p>1234 Main St, Springfield, USA</p>
                  <p>Phone: (123) 456-7890</p>
                  <p>Email: info@example.com</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <p>&copy; 2023 Company Name. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-right">
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
          
          
               
        <!-- jQuery -->
        <script src="{{asset("adminlte")}}/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset("adminlte")}}/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{asset("adminlte")}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="{{asset("adminlte")}}/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="{{asset("adminlte")}}/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="{{asset("adminlte")}}/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="{{asset("adminlte")}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset("adminlte")}}/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="{{asset("adminlte")}}/plugins/moment/moment.min.js"></script>
        <script src="{{asset("adminlte")}}/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset("adminlte")}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="{{asset("adminlte")}}/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset("adminlte")}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset("adminlte")}}/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset("adminlte")}}/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset("adminlte")}}/dist/js/pages/dashboard.js"></script>
        <script src="resources\js\bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/10a10362ef.js" crossorigin="anonymous"></script>
    </body>
</html>
