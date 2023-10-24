<!DOCTYPE html><!--
    * CoreUI - Free Bootstrap Admin Template
    * @version v4.2.2
    * @link https://coreui.io/product/free-bootstrap-admin-template/
    * Copyright (c) 2023 creativeLabs Łukasz Holeczek
    * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
    --><!-- Breadcrumb-->
    <html lang="en">
      <head>
                <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
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
        <!-- CoreUI and necessary plugins-->
      @Include('layouts._scripts')
    
      </body>
    </html>