<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fairus | Admin Page</title>
  @vite('resources/css/app.css')
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-5 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
    <form method="POST">
      <div class="mb-4">
        <label for="username" class="block text-gray-700 mb-2">Username</label>
        <input type="text" id="username" name="username" class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your email">
      </div>
      <div class="mb-6">
        <label for="password" class="block text-gray-700 mb-2">Password</label>
        <input type="password" id="password" name="password" class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your password">
      </div>
      <button type="submit" class="w-full bg-blue-500 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-200">Login</button>
    </form>
  </div>
</body>
</html>