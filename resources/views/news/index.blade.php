@extends('layouts.app')

@section('title', 'รวมข่าวยาเสพติด')
@section('description', 'รวมข่าวสารล่าสุดเกี่ยวกับยาเสพติด การจับกุม และการป้องกัน')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 mb-0">
                    <i class="fas fa-list me-2 text-primary"></i>
                    รวมข่าวยาเสพติด
                </h2>
                <span class="badge bg-primary fs-6">{{ $news->count() }} ข่าว</span>
            </div>
        </div>
    </div>

    @if($news->count() > 0)
        <div class="row">
            @foreach($news as $item)
                <div class="col-lg-6 col-xl-4 mb-4">
                    <div class="card news-card h-100">
                        @if($item->image_url)
                            <img src="{{ $item->image_url }}" class="card-img-top news-image" alt="{{ $item->title }}">
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="category-badge">{{ $item->category }}</span>
                            </div>
                            
                            <h5 class="card-title news-title">
                                <a href="{{ route('news.show', $item->id) }}" class="text-decoration-none">
                                    {{ $item->title }}
                                </a>
                            </h5>
                            
                            @if($item->summary)
                                <p class="card-text news-summary flex-grow-1">
                                    {{ Str::limit($item->summary, 120) }}
                                </p>
                            @endif
                            
                            <div class="mt-auto">
                                <div class="news-meta mb-2">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ $item->published_at->format('d/m/Y H:i') }}
                                    @if($item->author)
                                        <span class="ms-3">
                                            <i class="fas fa-user me-1"></i>
                                            {{ $item->author }}
                                        </span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>
                                    อ่านต่อ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">ยังไม่มีข่าว</h4>
                    <p class="text-muted">ข่าวสารจะปรากฏที่นี่เมื่อมีการเผยแพร่</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
