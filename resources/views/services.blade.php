<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="row mt-5">
        <div class="col-lg-2"></div>
        @foreach (getServices() as $service)
        <div class="col-lg-4 col-md-4 col-sm-6 ">
         <div class="card mb-1 text-center select-user" data-user="client" style="cursor: pointer">
             <div class="card-body">
                 <span style="font-size: 40px;"><i class="fa fa-user"></i></span>
             </div>
             <p type="button" class="mt-3 pb-3"><a href="{{ route('service-items',$service->id) }}">Continue as {{ $service->name }}</a></p>
         </div>
             
       
     </div>
     
         @endforeach

    </div>
</body>
</html>