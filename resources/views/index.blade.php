<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

@include('home.partials.head')

<body>

    @include('home.partials.nav')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @yield('content')

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                @include('home.partials.searchbar')

                @include('home.partials.category')

                @include('home.partials.wedgit')

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('home.partials.footer')

</body>

</html>
