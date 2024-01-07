<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css');
    </style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
  


    <!-- ========== HEADER ========== -->

<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 sm:py-0 dark:bg-gray-800 dark:border-gray-700">
    <nav class="relative max-w-[85rem] flex flex-wrap basis-full items-center w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Global">
      <div class="flex items-center justify-between">
        <a class="flex-none text-xl font-semibold dark:text-white" href="{{route('home')}}" aria-label="Brand">Fileshare</a>
      </div>
  
      <div class="flex items-center ms-auto sm:ms-0 sm:order-3">
        <div class="sm:hidden">
          <button type="button" class="p-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#navbar-offcanvas-example" aria-controls="navbar-offcanvas-example" aria-label="Toggle navigation">
            Menu
            <svg class="hs-overlay-open:hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
          </button>
        </div>
        
            
       @auth
       <div class="ps-3 sm:ps-6 sm:ms-6 sm:border-s sm:border-gray-300 dark:border-gray-700 flex items-center">
        <button type="button" class="w-9 h-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#navbar-secondary-content" aria-controls="navbar-secondary-content" aria-label="Toggle navigation">
          <svg class="hs-collapse-open:hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        @if (Auth::user()->roles->where('id', 2)->count())
            <p class='text-red-500 font-bold dark:text-white mr-0'>  
              {{ Auth::user()->name  }} (admin)
            </p>
        @else
            <p class="font-bold text-gray-800 dark:text-white mr-0">
              {{ Auth::user()->name }}
            </p>
        @endif

      </div>
       @endauth
       
      </div>
      
      
      <div id="navbar-offcanvas-example" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs w-full z-[60] bg-white border-e basis-full grow sm:order-2 sm:static sm:block sm:h-auto sm:max-w-none sm:w-auto sm:border-r-transparent sm:transition-none sm:translate-x-0 sm:z-40 sm:basis-auto dark:bg-gray-800 dark:border-r-gray-700 sm:dark:border-r-transparent hidden" tabindex="-1" data-hs-overlay-close-on-resize>
        <div class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
          @auth
          <a class="font-medium text-gray-500 hover:text-gray-400 px-6 sm:py-6 sm:px-0 dark:text-gray-400 dark:hover:text-gray-500" href="{{route('admin_index')}}">be admin</a>
          <a class="font-medium text-gray-500 hover:text-gray-400 px-6 sm:py-6 sm:px-0 dark:text-gray-400 dark:hover:text-gray-500" href="{{route('list_file')}}">your files</a>    
          @endauth
          @guest
          <a class="flex items-center gap-x-2 font-medium text-gray-500 hover:text-blue-600 md:border-s md:border-gray-300 md:my-6 md:ps-6 dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500" href="{{route("register_form")}}">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Log in/Register
          </a>
          @endguest        
        </div>
        
      </div>
    </nav>
  </header>
  <!-- ========== END HEADER ========== -->
  
  <!-- Offcanvas -->
  <div id="navbar-secondary-content" class="hs-overlay hs-overlay-open:translate-x-0 hidden -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs w-full z-[60] bg-white border-e dark:bg-gray-800 dark:border-gray-700" tabindex="-1">
    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
      <h3 class="font-bold text-gray-800 dark:text-white">
        @if (Auth::check())
        <p>{{ Auth::user()->name }}</p>
        <!-- Other user information can be accessed similarly, e.g., Auth::user()->email -->
        @endif
      </h3>

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="inline-flex items-center gap-x-2 py-3 px-4 text-sm text-start font-medium border border-gray-200 text-gray-800 hover:text-blue-600 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg focus:z-10 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-white dark:hover:text-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Logout
        </button>
    </form>
    </div>
    <a href={{route('form')}}>
      <button type="button" class="w-full inline-flex items-center gap-x-2 py-3 px-4 text-sm text-start font-medium border border-gray-200 text-gray-800 hover:text-blue-600 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg focus:z-10 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-white dark:hover:text-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m8 17 4 4 4-4"/></svg>
        add new file
      </button>
    </a>
    
  </div>
  <!-- End Offcanvas -->
  @if(session('success'))
  <div class=" msg bg-green-500 text-white p-4 mb-4">
      {{ session('success') }}

      
  </div>
@endif

@if(session('error')||$errors->any())
  <div class="msg bg-red-500 text-white p-4 mb-4">
      {{ session('error') }} 
  
  @if ($errors)
      <ul class="msg  text-white p-4 mb-4 flex gap-4">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
      @endif
    </div>
  @endif
  
    @yield('main')


    
<script>
    $(document).ready(function () {
        $(".msg").fadeOut(5000); // Delay 5000 milliseconds (5 seconds) and then fade out over 1000 milliseconds (1 second)
    });
</script>
   
</body>
</html>