@extends('layouts.app')

@section('title', $news->title)
@section('description', $news->summary)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('news.index') }}" class="text-decoration-none">
                            <i class="fas fa-home me-1"></i>หน้าหลัก
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">รายละเอียดข่าว</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="card border-0 shadow-sm">
                @if($news->image_url)
                    <img src="{{ $news->image_url }}" class="card-img-top" alt="{{ $news->title }}" style="height: 400px; object-fit: cover;">
                @endif
                
                <div class="card-body p-4">
                    <!-- Category Badge -->
                    <div class="mb-3">
                        <span class="category-badge">{{ $news->category }}</span>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="h2 mb-3 text-dark">{{ $news->title }}</h1>
                    
                    <!-- Meta Information -->
                    <div class="d-flex flex-wrap align-items-center mb-4 text-muted">
                        <div class="me-4">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ $news->published_at->format('d F Y เวลา H:i น.') }}
                        </div>
                        @if($news->author)
                            <div class="me-4">
                                <i class="fas fa-user me-1"></i>
                                {{ $news->author }}
                            </div>
                        @endif
                        @if($news->source_url)
                            <div>
                                <i class="fas fa-external-link-alt me-1"></i>
                                <a href="{{ $news->source_url }}" target="_blank" class="text-decoration-none">
                                    แหล่งข่าว
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Summary -->
                    @if($news->summary)
                        <div class="alert alert-info border-0 mb-4">
                            <h6 class="alert-heading mb-2">
                                <i class="fas fa-info-circle me-1"></i>
                                สรุปข่าว
                            </h6>
                            <p class="mb-0">{{ $news->summary }}</p>
                        </div>
                    @endif
                    
                    <!-- Content -->
                    <div class="news-content">
                        {!! $news->content !!}
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="card-footer bg-light border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            กลับไปหน้ารวมข่าว
                        </a>
                        
                        <div class="d-flex gap-2">
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>
                                        แก้ไข
                                    </a>
                                    <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบข่าวนี้?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash me-1"></i>
                                            ลบ
                                        </button>
                                    </form>
                                @endif
                            @endauth
                            <button class="btn btn-outline-primary btn-sm" onclick="shareNews()">
                                <i class="fas fa-share-alt me-1"></i>
                                แชร์
                            </button>
                            <button class="btn btn-outline-danger btn-sm" onclick="printNews()">
                                <i class="fas fa-print me-1"></i>
                                พิมพ์
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

<style>
.news-content {
    line-height: 1.8;
    font-size: 1.1em;
    color: #2c3e50;
}

.news-content p {
    margin-bottom: 1.5rem;
}

.news-content h1, .news-content h2, .news-content h3, .news-content h4, .news-content h5, .news-content h6 {
    color: #2c3e50;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.news-content ul, .news-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.news-content li {
    margin-bottom: 0.5rem;
}
</style>

<script>
function shareNews() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $news->title }}',
            text: '{{ $news->summary }}',
            url: window.location.href
        });
    } else {
        // Fallback for browsers that don't support Web Share API
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('ลิงก์ข่าวถูกคัดลอกไปยังคลิปบอร์ดแล้ว');
        });
    }
}

function printNews() {
    window.print();
}
</script>
@endsection
