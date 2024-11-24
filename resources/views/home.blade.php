<!DOCTYPE html>
<html dir="ltr" lang="en">
 @include('includes.head')

  <body>

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >

     @include('includes.header')
     @include('includes.sidebar')
      <div class="page-wrapper">
        <!-- Container fluid -->
        <div class="container-fluid">
          <!-- Start Page Content -->
          <h1 style="text-align: center; margin:10% "  > Welcome, admin</h1>
        
          <!-- End Page Content -->

        </div>
        <!-- End Container fluid -->

        <!-- footer -->
      @include('includes.footer')
        <!-- End footer -->
        
      </div>
      <!-- End Page wrapper -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('includes.scripts')
  </body>
</html>
