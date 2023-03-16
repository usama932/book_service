@extends('layouts.frontend')

@section('content')
        @php
            use App\Models\Setting;
            $setting = Setting::where('name','banner_image')->first();
        @endphp 
          
        <div class="section-top" style="background-image:url(' {{asset("uploads")}}/{{$setting->value ?? ""}}');">
            <div class="section-top-content d-flex flex-column align-items-center justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="mb-3">Gallery</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" class="mb-3" viewBox="0 0 100 100" data-icon-name="general_spray_bottle"><path d="M49.42,87.45c-2.94,0-6.33-.12-9-.21-1.6-.06-2.86-.1-3.52-.1a9.09,9.09,0,0,1-8.37-6c-.07-.2-6.8-20.52,4.74-39.7a2.92,2.92,0,0,1,1.16-.91h9.7a1,1,0,0,1,.45.1c.18.09,4.46,2.25,4.46,6.38a16,16,0,0,1-.51,3.55c-.49,2.2-.69,3.41.57,4.67,2.47,2.48,9.44,9.12,9.51,9.19l.1.12a18.69,18.69,0,0,1,3.42,8.54c.6,6-1.52,9.66-1.73,10a8.9,8.9,0,0,1-5.27,4A32,32,0,0,1,49.42,87.45ZM35,42.57a46.26,46.26,0,0,0-6.4,24.89,48.46,48.46,0,0,0,1.88,13,7.11,7.11,0,0,0,6.46,4.62c.69,0,2,0,3.59.1,4.51.16,12.06.42,14.2-.08a7,7,0,0,0,4-3l0,0a15.05,15.05,0,0,0,1.44-8.75,16.86,16.86,0,0,0-3-7.46c-.71-.67-7.13-6.79-9.49-9.17-2.1-2.11-1.59-4.36-1.11-6.54A14.21,14.21,0,0,0,47,47c0-2.46-2.44-4.06-3.15-4.47Z"></path><path d="M28,64.37a1,1,0,0,1,0-2l27.74-.3a1,1,0,0,1,0,2L28,64.37Z"></path><path d="M44.88,38.29H41.75a1,1,0,0,1,0-2h2.11A13.6,13.6,0,0,1,47.55,27c2.9-2.88,7.26-4.11,13-3.65.39-.47.84-1.36.84-3.39a2.54,2.54,0,0,0-1-2.1H32.82c-3.1,0-3.93,1.91-4.92,5-.2.62-.4,1.25-.63,1.85,6.25,2.94,7.39,9,7.6,11.48h3.86a1,1,0,1,1,0,2H33.9a1,1,0,0,1-1-1c0-.33.18-8.1-7.34-11A1,1,0,0,1,25,24.84a14.89,14.89,0,0,0,.94-2.5c.86-2.72,2-6.45,6.84-6.45H60.59A1,1,0,0,1,61,16a4.54,4.54,0,0,1,2.32,4c0,3.06-.89,4.33-1.77,5.17a1,1,0,0,1-.79.28c-5.31-.5-9.29.51-11.82,3-3.49,3.45-3.1,8.68-3.1,8.73a1,1,0,0,1-1,1.09Z"></path><path d="M47.52,79.71a1,1,0,0,1-.69-.27c-.12-.11-2.94-2.8-5.32-8.87C39.35,65,37.14,55.5,38.9,41.38a1,1,0,0,1,2,.25C37.64,67.74,48.1,77.87,48.21,78a1,1,0,0,1-.69,1.74Z"></path><path d="M57.61,24.7a1,1,0,0,1-1-1v-6.8a1,1,0,0,1,2,0v6.8A1,1,0,0,1,57.61,24.7Z"></path><path d="M60.63,42.79A10.87,10.87,0,0,1,50.1,35.26l-3.23-1a1,1,0,0,1,.58-1.93l3.74,1.12a1,1,0,0,1,.69.73,9,9,0,0,0,5.71,6.11c-4.74-5.41-5.42-13.06-5.45-13.43a1,1,0,1,1,2-.16c0,.09.86,9.59,7.08,14.24a1,1,0,0,1-.6,1.81Z"></path><path d="M34.12,42.51a1,1,0,0,1-1-1L33,37.17a1,1,0,1,1,2-.05l.12,4.36a1,1,0,0,1-1,1Z"></path><path d="M44.74,42.51a1,1,0,0,1-1-1l-.12-4.65a1,1,0,1,1,2-.05l.12,4.65a1,1,0,0,1-1,1Z"></path><path d="M65.51,17.93A1,1,0,0,1,65,16l6.32-3.37a1,1,0,0,1,.95,1.78L66,17.81A1,1,0,0,1,65.51,17.93Z"></path><path d="M65.81,21.9a1,1,0,0,1,0-2l8.27-.07a1,1,0,1,1,0,2l-8.27.07Z"></path><path d="M72,29.08a1,1,0,0,1-.43-.1l-6.69-3.16A1,1,0,1,1,65.74,24l6.69,3.16A1,1,0,0,1,72,29.08Z"></path><path d="M54.24,82.15a1,1,0,0,1-.51-1.87c1.15-.68,3-5,1.6-9a1,1,0,0,1,1.9-.68c1.69,4.7-.33,10.19-2.47,11.46A1,1,0,0,1,54.24,82.15Z"></path><path d="M54.36,68.72a1,1,0,0,1-.75-.33c-.2-.22-.41-.44-.64-.64a1,1,0,0,1,1.36-1.49c.27.25.53.51.77.78a1,1,0,0,1-.75,1.68Z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-content">
            
            <div class="filters_btns_wrapper pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 m-auto">
                            <ul class="filters_btns d-flex flex-wrap align-items-center justify-content-center">
                                <li class="is-checked" data-filter="*">
                                    <h3>ALL</h3>
                                </li>
                                <li data-filter=".work">
                                    <h3>WORK</h3>
                                </li>
                                <li data-filter=".other">
                                    <h3>OTHER</h3>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="section_space">
                <div class="container">
                    <div class="row mb-5 justify-content-center">
                        <div class="col-md-10 section-title text-center">
                            <p class="text-uppercase">We believe in providing exceptional service each and every time we clean. Your satisfaction is our #1 goal.</p>
                            <h3 class="text-uppercase mb-3">Some of our work pictures </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 filters_items">
                            @foreach($galleries as $gallery)
                                <div class="filters_item work">
                                    <a href="#" data-lightbox="work">
                                        <img class="gallery-thumb" alt="" src="{{asset('uploads')}}/{{$gallery->image}}"/>
                                    </a> 
                                    <p class="filters_item_title">{{$gallery->title}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
@endsection
@section('')
@endsection