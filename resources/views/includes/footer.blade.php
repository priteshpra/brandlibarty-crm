<!-- Right bar overlay-->
<!-- Right Sidebar -->
<div class="right-bar">
     <div data-simplebar class="h-100">
          <div class="rightbar-title d-flex align-items-center p-3">

               <h5 class="m-0 me-2">Settings</h5>

               <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
               </a>
          </div>

          <!-- Settings -->
          <hr class="m-0" />
          <div class="p-4">
               <h6 class="mb-3">Layout Mode</h6>

               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light" onchange="changeLayoutMode('light')">
                    <label class="form-check-label" for="layout-mode-light">Light</label>
               </div>
               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark" onchange="changeLayoutMode('dark')">
                    <label class="form-check-label" for="layout-mode-dark">Dark</label>
               </div>

               <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fluid" value="fluid" onchange="changeLayoutWidth('fluid')">
                    <label class="form-check-label" for="layout-width-fluid">Fluid</label>
               </div>
               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed" onchange="changeLayoutWidth('boxed')">
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
               </div>

               <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light" onchange="changeTopbarColor('light')">
                    <label class="form-check-label" for="topbar-color-light">Light</label>
               </div>
               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark" onchange="changeTopbarColor('dark')">
                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
               </div>

               <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

               <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default" value="default" onchange="changeSidebarSize('lg')">
                    <label class="form-check-label" for="sidebar-size-default">Default</label>
               </div>
               <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact" value="compact" onchange="changeSidebarSize('small')">
                    <label class="form-check-label" for="sidebar-size-compact">Compact</label>
               </div>
               <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small" onchange="changeSidebarSize('sm')">
                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
               </div>

               <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

               <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light" onchange="changeSidebarColor('light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
               </div>
               <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark" onchange="changeSidebarColor('dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
               </div>
               <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-colored" value="colored" onchange="changeSidebarColor('colored')">
                    <label class="form-check-label" for="sidebar-color-colored">Colored</label>
               </div>
          </div>

     </div> <!-- end slimscroll-menu-->
</div>

<script>
     function changeLayoutMode(mode) {
          document.body.setAttribute('data-layout-mode', mode);
          // Log the current data-layout-mode attribute
          console.log("Current data-layout-mode: ", document.body.getAttribute('data-layout-mode'));
     }

     function changeLayoutWidth(width) {
          document.body.setAttribute('data-layout-size', width);
     }

     function changeTopbarColor(color) {
          document.body.setAttribute('data-topbar', color);
     }

     function changeSidebarSize(size) {
          document.body.setAttribute('data-sidebar-size', size);
     }

     function changeSidebarColor(color) {
          document.body.setAttribute('data-sidebar', color);
     }
</script>

</div> <!-- end slimscroll-menu-->


<!-- /Right-bar -->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('assets/admin/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>

<script>
     function changeLayoutMode(mode) {
          document.body.setAttribute('data-layout-mode', mode);
     }

     function changeLayoutWidth(width) {
          document.body.setAttribute('data-layout-size', width);
     }

     function changeTopbarColor(color) {
          document.body.setAttribute('data-topbar', color);
     }

     function changeSidebarSize(size) {
          document.body.setAttribute('data-sidebar-size', size);
     }

     function changeSidebarColor(color) {
          document.body.setAttribute('data-sidebar', color);
     }
</script>

<!-- ck editor script -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
     ClassicEditor
          .create(document.querySelector('#editor')).then(newEditor => {
               editor = newEditor;
          })
          .catch(error => {
               // console.error('CKEditor Error:', error);
          });

     $(".close").click(function() {
          $("#userModal").modal('toggle');
     })
</script>