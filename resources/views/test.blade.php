<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon-light.png') }}" type="image/x-icon" sizes="180x180">
        <link rel="icon" href="{{ asset('assets/img/favicon-light.png') }}" type="image/x-icon" sizes="32x32">
        <link rel="icon" href="{{ asset('assets/img/favicon-light.png') }}" type="image/x-icon" sizes="16x16">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/material-dashboard.min.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-green-200">
            <div class="" style="width:90%">
            <Nav />
          <div class=" w-full flex-col ">
                    
             <!-- hero -->
             <div class="flex justify-between py-2 px-1 text-black w-full">
                 <div class=" w-full md:flex  justify-between p-4">
        
                <!-- left -->
             <div class="flex-col  justify-center p-2 rounded-3xl shadow-2xl default-color ml-4">
                 
                <div class="welcome-note px-1 mx-auto text-center">
                  <div class="p-4 flex justify-center items-center mx-auto ">
                      
                    <img src="assets/img/rename.jpg" width="150" class="" alt="" srcset="">
        
                    </div>
                    <h2 class="text-2xl md:text-4xl lg:text-5xl text-gray-800 mb-6 ">Welcome to HuntLogs</h2>
                    <p class="text-gray-800 mb-6">Buy transfer addresses online
                        <br>and pay with crypto</p>
        
                    <a href="#" class="btn-intro btn btn-default py-3 px-6  bg-indigo-200 hover:bg-indigo-400 mr-2 text-lg rounded">Learn More</a>
                    <a href="#" class="btn-intro  btn btn-default py-3 px-6 bg-yellow-300 text-yellow-700 hover:bg-yellow-400  text-lg rounded">Get Started</a>
                </div>
                     <div class="recent-transfer p-4 flex-col items-center ">
                        <p class="flex justify-center items-center text-2xl font-bold  mx-auto"> Recent Transfers</p>
                        <div class="flex-col items-center rounded-2xl shadow-xl p-4 bg-green-300">
                            <span class="flex justify-between items-center p-1">Bank : Backlys</span>
                            
                            <span class="flex justify-between items-center p-1"> Account No : 0000003777</span>
                            <span class="flex justify-between items-center p-1"> Amount :  0.00001 btc / $4.70</span>
                            <span class="flex justify-between items-center p-1"> From : Michael Jox Fox </span>
                            <span class="flex justify-between items-center p-1"> Date : Jan 06 2022 5: 43pm </span>
                            
                            
        
        
                        </div>
        
                    </div>
            </div>
        
            <!-- middle -->
                <div class="m-3 p-2 rounded-3xl shadow-2xl default-color w-full ">
             
                    <div class="hero-image rounded-3xl">
                    <div class="hero-text text-green-800">
                    </div>
                    </div>
        
                    <div class="flex justify-between items-center mx-auto p-2 w-full">
                        <div class="flex-col">
                        <div class="flex text-lg p-2"> <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime dignissimos labore recusandae. Voluptatum rem ea, quo repellat, excepturi consequatur deserunt magnam perferendis vero nostrum vel quod alias facilis voluptatem tenetur.</span> 
                        </div>
                        <div class="flex text-lg p-2"> <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime dignissimos labore recusandae. Voluptatum rem ea, quo repellat, excepturi consequatur deserunt magnam perferendis vero nostrum vel quod alias facilis voluptatem tenetur.</span> 
                        </div>
                        </div>
                        <div class=" flex-col p-2 m-2">
                            <a href="#" onclick="testApi()"  class="btn btn-default bg-red-600 hover:bg-green-500 py-2 px-4 rounded shadow-xl "> button </a>
                        </div>
                    </div>
                      <div class=" md:flex py-16 px-10 rounded-2xl shadow-2xl  text-black text-center bg-red-100" style="height: 20vh;">
                          <div class="flex justify-between items-center py-4 px-2 decoration-fuchsia-600">
                          <span class="flex justify-center p-2 text-lg ">Lorem, ipsum.</span>
                          <span class="flex justify-center p-2 text-lg ">Lorem, ipsum.</span>
                          <span class="flex justify-center p-2 text-lg ">Lorem, ipsum.</span>
                          <span class="flex justify-center p-2 text-lg ">Lorem, ipsum.</span>
                          <span class="flex justify-center p-2 text-lg ">Lorem, ipsum.</span>
                          <span class="flex justify-center p-2 text-lg ">Lorem, ipsum.</span>
                     
        
                          </div>
                      </div>
         
                   </div>
            
                 </div>
        
          
            </div>
            
        
            </div>
          
            </div>
            <!-- <Footer /> -->
        
            <Style />
        
        </div>
        
        <style>
            .bg-gray-100 {
                background-color: #f7fafc;
                background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
            }
            .border-gray-200 {
                border-color: #edf2f7;
                border-color: rgba(237, 242, 247, var(--tw-border-opacity));
            }
        .hero-image {

          background-image:url('assets/img/rename.jpg');
            
          height: 500px;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          position: relative;
        }
        .hero-text {
          text-align: center;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
        }
        </style>
    </body>
    
    

        <script src="{{ asset('js/jquery-3.1.1.min.js') }}" ></script>
        <script src="{{ asset('js/popper.min.js') }}" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
        {{-- <script src="{{ asset('js/chartjs.min.js') }}" ></script> --}}
        {{-- <script src="{{ asset('js/material-dashboard.js') }}" ></script> --}}
        <script>
            function testApi(){

                alert('testing api')
                const url = 'http://localhost:4000/api/test';
                $.ajax({
                    type: "post",
                    url: url,
                    data: {url: 'this is the url'},
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });

                // fetch(url,{
                //     method: POST,
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'Accept': 'application/json'
                //     },
                //     body: JSON.stringify({
                //         'url': 'michael'
                //     })
                // })
                // .then(response => response.json())
                // .then(json => console.log(json))
                

                
            }
        </script>
        
    </body>
</html>
