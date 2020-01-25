<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- HTML HEAD -->
    @include('layouts.partials.htmlhead')
    <!-- end HTML HEAD -->

    <div class="container">
        <body>
            <!-- HEADER -->
            @include('layouts.partials.header1')
            <!-- end HEADER -->
            
            <!-- SCRIPTS -->
            @include('layouts.partials.scripts')
            <!-- end SCRIPTS -->
        </body>
        
    </div>

</html>


