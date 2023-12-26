@extends('base');
@section('main')
    <!-- Hero -->
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="overflow-hidden">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-20">
      <div class="relative mx-auto max-w-4xl grid space-y-5 sm:space-y-10">
        <!-- Title -->
        <div class="text-center">
          
          <h1 class="text-3xl text-gray-800 font-bold sm:text-5xl lg:text-6xl lg:leading-tight dark:text-gray-200">
            the best website to  <span class="text-blue-500">upload and downloads files</span>
          </h1>
        </div>
        <!-- End Title -->
  
        <!-- Avatar Group -->
        <div class="sm:flex sm:justify-center sm:items-center text-center sm:text-start">
          <div class="flex-shrink-0 pb-5 sm:flex sm:pb-0 sm:pe-5">
            <!-- Avatar Group -->
            <div class="flex justify-center -space-x-3">
              <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-gray-800" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
              <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-gray-800" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
              <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-gray-800" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80" alt="Image Description">
              <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-gray-800" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
              <span class="inline-flex items-center justify-center h-8 w-8 rounded-full ring-2 ring-white bg-gray-800 dark:bg-gray-900 dark:ring-gray-800">
                <span class="text-xs font-medium leading-none text-white uppercase">7k+</span>
              </span>
            </div>
            <!-- End Avatar Group -->
          </div>
  
          <div class="border-t sm:border-t-0 sm:border-s border-gray-200 w-32 h-px sm:w-auto sm:h-full mx-auto sm:mx-0"></div>
  
          <div class="pt-5 sm:pt-0 sm:ps-5">
            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">Trust pilot</div>
            <div class="text-sm text-gray-500">Rated best over 37k reviews</div>
          </div>
        </div>
        <!-- End Avatar Group -->
  
        <!-- Form -->
        <form method="POST" action="{{route('upload_file')}}" enctype="multipart/form-data">
            @csrf
          <div class="mx-auto max-w-2xl sm:flex sm:space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-900 dark:border-gray-700 dark:shadow-gray-900/[.2]">
            <div class="pb-2 sm:pb-0 sm:flex-[1_0_0%]">
              <label for="hs-hero-name-1" class="block text-sm font-medium dark:text-white"><span class="sr-only">Your file title</span></label>
              <input type="text" name="titre" id="hs-hero-titre-1" class="py-3 px-4 block w-full border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600" placeholder="titre">
            </div>
            
            <div class="pb-2 sm:pb-0 sm:flex-[1_0_0%]">
                <label for="hs-hero-name-1" class="block text-sm font-medium dark:text-white"><span class="sr-only">description</span></label>
                <input type="text" name="description" id="hs-hero-description-1" class="py-3 px-4 block w-full border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600" placeholder="description">
            </div>
            <div class="pt-2 sm:pt-0 sm:ps-3 border-t border-gray-200 sm:border-t-0 sm:border-s sm:flex-[1_0_0%] dark:border-gray-700">
                <label for="hs-hero-email-1" class="block text-sm font-medium dark:text-white"><span class="sr-only">file</span></label>
                <input type="file" name="fichier" id="hs-hero-file-1" class="py-3 px-4 block w-full border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">
            </div>
            <div class="pt-2 sm:pt-0 grid sm:block sm:flex-[0_0_auto]">
              <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                upload
              </button>
            </div>

          </div>
        </form>
       
      </div>
    </div>
  </div>
  
@endsection