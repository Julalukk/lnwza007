@extends('layouts.app')

@section('title', 'Dashboard - เว็บข่าวยาเสพติด')
@section('description', 'หน้าจัดการระบบสำหรับผู้ดูแลระบบ')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2 mb-0">
                    <i class="fas fa-tachometer-alt me-2 text-primary"></i>
                    Dashboard
                </h1>
                <div class="text-muted">
                    <i class="fas fa-user me-1"></i>
                    ยินดีต้อนรับ, {{ Auth::user()->name }}
                    <span class="badge bg-{{ Auth::user()->role === 'admin' ? 'success' : 'info' }} ms-2">
                        {{ Auth::user()->role === 'admin' ? 'Admin' : 'Guest' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- สถิติข่าว -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ \App\Models\News::count() }}</h4>
                            <p class="card-text">จำนวนข่าวทั้งหมด</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-newspaper fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- สถิติผู้ใช้ -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ \App\Models\User::count() }}</h4>
                            <p class="card-text">จำนวนผู้ใช้ทั้งหมด</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- สถิติ Admin -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ \App\Models\User::where('role', 'admin')->count() }}</h4>
                            <p class="card-text">จำนวน Admin</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-user-shield fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- สถิติ Guest -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ \App\Models\User::where('role', 'guest')->count() }}</h4>
                            <p class="card-text">จำนวน Guest</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- การจัดการข่าว -->
    @if(Auth::user()->role === 'admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cogs me-2"></i>
                        การจัดการข่าว
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="{{ route('news.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>
                                เพิ่มข่าวใหม่
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="{{ route('news.index') }}" class="btn btn-primary w-100">
                                <i class="fas fa-list me-2"></i>
                                ดูรายการข่าว
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="{{ route('news.index') }}" class="btn btn-warning w-100">
                                <i class="fas fa-edit me-2"></i>
                                จัดการข่าว
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="{{ route('news.index') }}" class="btn btn-info w-100">
                                <i class="fas fa-chart-bar me-2"></i>
                                สถิติข่าว
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- ข่าวล่าสุด -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-clock me-2"></i>
                        ข่าวล่าสุด
                    </h5>
                </div>
                <div class="card-body">
                    @if(\App\Models\News::count() > 0)
                        <div class="row">
                            @foreach(\App\Models\News::latest()->take(3)->get() as $news)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($news->image_url)
                                            <img src="{{ $news->image_url }}" class="card-img-top" alt="{{ $news->title }}" style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">{{ Str::limit($news->title, 50) }}</h6>
                                            <p class="card-text text-muted small">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $news->published_at->format('d/m/Y H:i') }}
                                            </p>
                                            <a href="{{ route('news.show', $news->id) }}" class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-eye me-1"></i>
                                                อ่านต่อ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">ยังไม่มีข่าว</h5>
                            <p class="text-muted">เริ่มต้นด้วยการเพิ่มข่าวแรกของคุณ</p>
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('news.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>
                                    เพิ่มข่าวแรก
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
