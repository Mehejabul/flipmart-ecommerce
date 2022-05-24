
@include('website.includes.website_header')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        @include('website.includes.top_navigation')

@yield('website_content')
@include('website.includes.website_footer')
