<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title', 'เว็บข่าวยาเสพติด')</title>
    <meta name="description" content="@yield('description', 'เว็บข่าวสารเกี่ยวกับยาเสพติดและการป้องกัน')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Base styles for consistent layout */
        * {
            box-sizing: border-box;
        }
        
        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-size: 16px;
        }
        
        body {
            font-size: 14px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        
        @media (min-width: 1200px) {
            .container {
                max-width: 1200px;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }
            
            body {
                font-size: 13px;
            }
        }
        
        /* News card styles */
        .news-card {
            transition: transform 0.3s ease;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: 100%;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .news-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .news-title {
            color: #2c3e50;
            font-weight: 600;
            line-height: 1.4;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .news-title:hover {
            color: #e74c3c;
        }
        .news-summary {
            color: #7f8c8d;
            line-height: 1.6;
            font-size: 14px;
        }
        .news-meta {
            color: #95a5a6;
            font-size: 12px;
        }
        .header-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .category-badge {
            background: #e74c3c;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
        .content-area {
            min-height: 70vh;
        }
        
        /* Card grid consistency */
        .row {
            margin-left: -15px;
            margin-right: -15px;
        }
        
        .col-lg-4, .col-md-6, .col-sm-12 {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        /* Button consistency */
        .btn {
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 4px;
        }
        
        .btn-sm {
            font-size: 12px;
            padding: 6px 12px;
        }
        
        /* Floating button */
        .floating-btn {
            position: fixed !important;
            bottom: 20px !important;
            right: 20px !important;
            z-index: 9999 !important;
            width: 60px !important;
            height: 60px !important;
            border-radius: 50% !important;
            background-color: #007bff !important;
            color: white !important;
            font-size: 24px !important;
            font-weight: bold !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 4px 12px rgba(0,123,255,0.3) !important;
            transition: all 0.3s ease !important;
            text-decoration: none !important;
        }
        
        .floating-btn:hover {
            background-color: #0056b3 !important;
            transform: scale(1.1) !important;
            color: white !important;
            text-decoration: none !important;
        }
        
        /* Ensure consistent spacing */
        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }
        
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        
        /* Fix any zoom issues */
        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        /* Ensure consistent font rendering */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header-bg text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="h2 mb-0">
                        <i class="fas fa-newspaper me-2"></i>
                        เว็บข่าวยาเสพติด
                    </h1>
                    <p class="mb-0 mt-2 opacity-75">ข่าวสารล่าสุดเกี่ยวกับยาเสพติดและการป้องกัน</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('news.index') }}" class="btn btn-light btn-sm me-2">
                            <i class="fas fa-home me-1"></i> หน้าหลัก
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="content-area">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>เว็บข่าวยาเสพติด</h5>
                    <p class="mb-0">แหล่งข่าวสารที่เชื่อถือได้เกี่ยวกับยาเสพติดและการป้องกัน</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0">&copy; {{ date('Y') }} เว็บข่าวยาเสพติด. สงวนลิขสิทธิ์.</p>
                </div>
            </div>
            
            <!-- Disclaimer -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="alert alert-warning border-0 mb-0" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <div>
                                <strong>ข้อสำคัญ:</strong> เว็บไซต์นี้สร้างขึ้นมาสำหรับการศึกษาของนักศึกษา 
                                วิทยาการคอมพิวเตอร์เท่านั้น ไม่ได้มีเจตนานำไปหาผลประโยชน์ 
                                ข้อมูลทั้งหมดเป็นเพียงตัวอย่างเพื่อการศึกษาเท่านั้น
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for consistent layout -->
    <script>
        // Ensure consistent viewport behavior
        document.addEventListener('DOMContentLoaded', function() {
            // Fix viewport scaling issues
            const viewport = document.querySelector('meta[name="viewport"]');
            if (viewport) {
                viewport.setAttribute('content', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
            }
            
            // Fix container width - let CSS handle it
            const containers = document.querySelectorAll('.container');
            containers.forEach(container => {
                // Remove any inline styles that might override CSS
                container.style.maxWidth = '';
                container.style.paddingLeft = '';
                container.style.paddingRight = '';
            });
            
            // Ensure cards have consistent height
            const cards = document.querySelectorAll('.card, .news-card');
            cards.forEach(card => {
                card.style.minHeight = '400px';
            });
            
            // Fix floating button positioning
            const floatingBtn = document.querySelector('.floating-btn');
            if (floatingBtn) {
                floatingBtn.style.position = 'fixed';
                floatingBtn.style.bottom = '20px';
                floatingBtn.style.right = '20px';
                floatingBtn.style.zIndex = '9999';
            }
        });
        
        // Run on window resize
        window.addEventListener('resize', function() {
            // Let CSS handle container sizing
            const containers = document.querySelectorAll('.container');
            containers.forEach(container => {
                container.style.maxWidth = '';
                container.style.paddingLeft = '';
                container.style.paddingRight = '';
            });
        });
        
        // Run on orientation change
        window.addEventListener('orientationchange', function() {
            setTimeout(function() {
                const viewport = document.querySelector('meta[name="viewport"]');
                if (viewport) {
                    viewport.setAttribute('content', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
                }
            }, 100);
        });
    </script>
</body>
</html>
