<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'เว็บข่าวยาเสพติด')</title>
    <meta name="description" content="@yield('description', 'เว็บข่าวสารเกี่ยวกับยาเสพติดและการป้องกัน')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .news-card {
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .news-image {
            height: 200px;
            object-fit: cover;
        }
        .news-title {
            color: #2c3e50;
            font-weight: 600;
            line-height: 1.4;
        }
        .news-title:hover {
            color: #e74c3c;
        }
        .news-summary {
            color: #7f8c8d;
            line-height: 1.6;
        }
        .news-meta {
            color: #95a5a6;
            font-size: 0.9em;
        }
        .header-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .category-badge {
            background: #e74c3c;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 500;
        }
        .content-area {
            min-height: 70vh;
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
</body>
</html>
