<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
    <style>
       
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('your-blurred-background-image.jpg'); 
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

       
        .form-container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(10px); 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        
        .message-box {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        
        .success-message {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        
        .error-message {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        
        label {
            display: block;
            margin-bottom: 10px;
        }

        
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        
        .error {
            color: #721c24;
            font-size: 12px;
            margin-top: 2px;
            display: block;
        }

        
        button {
            background-color: #28a745; 
            color: #fff;
            cursor: pointer;
            border: none;
        }

       
        button:hover {
            background-color: #218838; 
        }

      
        a {
            text-decoration: none;
            color: #007bff;
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <!-- Display success & error message  -->
        @if(session('success'))
            <div class="message-box success-message">{{ session('success') }}</div>
        @endif

        
        @if(session('error'))
            <div class="message-box error-message">{{ session('error') }}</div>
        @endif

        <!-- Form for user input -->
        <form action="{{ route('save.form') }}" method="post">
            @csrf

            
            <label for="name">Name:
                <input type="text" id="name" name="name" required>
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </label>

            
            <label for="email">Email:
                <input type="email" id="email" name="email" required>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </label>

            
            <label for="password">Password:
                <input type="password" id="password" name="password" required>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </label>

            
            <label for="gender">Gender:
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender') <span class="error">{{ $message }}</span> @enderror
            </label>

            
            <label for="birthday">Birthday:
                <input type="date" id="birthday" name="birthday" required>
                @error('birthday') <span class="error">{{ $message }}</span> @enderror
            </label>

            
            <label for="status">Status (Active):
                <input type="checkbox" id="status" name="status" value="1">
            </label>

            <!-- Submit button -->
            <button type="submit">Save Data</button>
        </form>

        <!-- Link to Table Page -->
        <a href="/table">Go to Table Page</a>
    </div>
</body>
</html>
