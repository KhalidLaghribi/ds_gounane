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
            <span class="text-blue-500">upload and downloads files</span>
          </h1>
        </div>
        <!-- End Title -->
  
        
  
        <!-- Form -->
        <form method="POST" action="{{route('upload_file')}}" enctype="multipart/form-data">
            @csrf
          <div class="mx-auto max-w-5xl sm:flex sm:space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-900 dark:border-gray-700 dark:shadow-gray-900/[.2]">
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