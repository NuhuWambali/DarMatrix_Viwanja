<!DOCTYPE html><!--
    * CoreUI - Free Bootstrap Admin Template
    * @version v4.2.2
    * @link https://coreui.io/product/free-bootstrap-admin-template/
    * Copyright (c) 2023 creativeLabs Łukasz Holeczek
    * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
    --><!-- Breadcrumb-->
    <html lang="en">
      <head>
      @include('layouts._head')
      </head>
      <body>
        @include('layouts._sidebar')
        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
          @include('layouts._header')
          <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                @yield('content')
            </div>
          </div>
          @include('layouts._footer')
        </div>
        @include('layouts._scripts')
      </body>
    </html>
