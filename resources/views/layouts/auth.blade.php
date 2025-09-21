<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title', 'เข้าสู่ระบบ')</title>
    <meta name="description" content="@yield('description', 'ระบบเข้าสู่ระบบ')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
        }
        
        .auth-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .auth-body {
            padding: 40px;
        }
        
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-link {
            color: #667eea;
            text-decoration: none;
        }
        
        .btn-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        .invalid-feedback {
            display: block;
            margin-top: 5px;
        }
        
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
        
        .back-to-home {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .back-to-home:hover {
            color: #f8f9fa;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <a href="{{ route('news.index') }}" class="back-to-home">
        <i class="fas fa-arrow-left"></i> กลับหน้าหลัก
    </a>
    
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2 class="mb-0">
                    <i class="fas fa-user-circle me-2"></i>
                    @yield('auth-title', 'เข้าสู่ระบบ')
                </h2>
                <p class="mb-0 mt-2 opacity-75">@yield('auth-subtitle', 'กรุณาเข้าสู่ระบบเพื่อใช้งาน')</p>
            </div>
            
            <div class="auth-body">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
