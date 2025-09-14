<x-bootstrap-theme title="แก้ไขข่าวยาเสพติด">
    <div class="container">
        <h2>แก้ไขข่าวยาเสพติด</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">หัวข้อข่าว</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">สรุปข่าว</label>
                <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary', $news->summary) }}</textarea>
                @error('summary')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">เนื้อหาข่าว</label>
                <textarea class="form-control" id="content" name="content" rows="10">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">หมวดหมู่</label>
                <select class="form-control" id="category" name="category">
                    <option value="">เลือกหมวดหมู่</option>
                    <option value="ยาเสพติด" {{ old('category', $news->category) == 'ยาเสพติด' ? 'selected' : '' }}>ยาเสพติด</option>
                    <option value="การจับกุม" {{ old('category', $news->category) == 'การจับกุม' ? 'selected' : '' }}>การจับกุม</option>
                    <option value="การป้องกัน" {{ old('category', $news->category) == 'การป้องกัน' ? 'selected' : '' }}>การป้องกัน</option>
                    <option value="กฎหมาย" {{ old('category', $news->category) == 'กฎหมาย' ? 'selected' : '' }}>กฎหมาย</option>
                </select>
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">ผู้เขียน</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $news->author) }}">
                @error('author')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="source_url" class="form-label">แหล่งที่มา (URL)</label>
                <input type="url" class="form-control" id="source_url" name="source_url" value="{{ old('source_url', $news->source_url) }}">
                @error('source_url')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">รูปภาพข่าว</label>
                @if($news->image_url)
                    <div class="mb-2">
                        <img src="{{ $news->image_url }}" alt="รูปภาพปัจจุบัน" class="img-thumbnail" style="max-width: 200px;">
                        <p class="text-muted small">รูปภาพปัจจุบัน</p>
                    </div>
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png,image/jpg">
                <div class="form-text">หากต้องการเปลี่ยนรูปภาพ ให้เลือกไฟล์ใหม่</div>
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="published_at" class="form-label">วันที่เผยแพร่</label>
                <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d\TH:i')) }}">
                @error('published_at')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('news.index') }}" class="btn btn-secondary me-md-2">ยกเลิก</a>
                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
            </div>
        </form>
    </div>
</x-bootstrap-theme>
