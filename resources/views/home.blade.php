<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Custom Auth</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">


    <nav class="p-6 bg-white flex justify-between">

    <ul class="flex items-center">
        
        <li>
            <a href="{{ route(name: 'home') }}" class="p-3">Home</a>
        </li>
        <!-- <li>
            <a href="" class="p-3">Dashboard</a>
        </li> -->
    </ul>

        <ul class="flex items-center">

            
            @guest

                <li><a href="{{ route(name: 'login') }}" class="p-3">Login</a></li>
                <li><a href="{{url('/userRegistration')}}" class="p-3">Register</a></li>
            @endguest    
        
            
        </ul>

    </nav>


    <div class="container mx-auto mt-6 px-6">
        <h3>Welcome New Project</h3>
        <h4>Please Login Enter Dashboard</h4>
    </div>
    
</body>
</html>