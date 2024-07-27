
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QuizApp</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="/custom/custom.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" >
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       
</head>

    <body style="background-color: #2d2d2d;" >
        <nav class="navbar navbar-expand-md navbar-light  ">
            <div class="container">
                <a class="navbar-brand mx-auto">
                    QuizApp
                </a>
            </div>
        </nav>


        <div class="container">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
			<div class="cardhome py-3 px-2">
				<div class="division">
					<div class="row">
						<div class="col-3"><div class="line l"></div></div>
						<div class="col-6"><span>HOŞGELDİN</span></div>
						<div class="col-3"><div class="line r"></div></div>
					</div>
				</div>

                <div class="mt-4">
                    @if (Route::has('login'))  
                        <div class="card-body authbutton">
                              @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn"><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i> Giriş Yap </a>
                    @endif
                    @endauth
                        </div>
                </div>

                <div class="mt-4">
                    <div class="card-body authbutton">
                          @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn"> <i class="fa fa-user-plus fa-1x" aria-hidden="true"></i> Üye Ol </a>
                        @endif 
                    </div>
                </div>


				
			</div>
		</div>
	</div>
</div>
        



        










    </body>
</html>

