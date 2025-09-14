<x-bootstrap-theme title="เพิ่มข่าวยาเสพติด">
    <div class="container">
        <h2>เพิ่มข่าวยาเสพติด</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">หัวข้อข่าว</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">สรุปข่าว</label>
                <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
                @error('summary')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">เนื้อหาข่าว</label>
                <textarea class="form-control" id="content" name="content" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">หมวดหมู่</label>
                <select class="form-control" id="category" name="category">
                    <option value="">เลือกหมวดหมู่</option>
                    <option value="ยาเสพติด" {{ old('category') == 'ยาเสพติด' ? 'selected' : '' }}>ยาเสพติด</option>
                    <option value="การจับกุม" {{ old('category') == 'การจับกุม' ? 'selected' : '' }}>การจับกุม</option>
                    <option value="การป้องกัน" {{ old('category') == 'การป้องกัน' ? 'selected' : '' }}>การป้องกัน</option>
                    <option value="กฎหมาย" {{ old('category') == 'กฎหมาย' ? 'selected' : '' }}>กฎหมาย</option>
                </select>
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">ผู้เขียน</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
                @error('author')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="source_url" class="form-label">แหล่งที่มา (URL)</label>
                <input type="url" class="form-control" id="source_url" name="source_url" value="{{ old('source_url') }}">
                @error('source_url')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">รูปภาพข่าว</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png,image/jpg">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="published_at" class="form-label">วันที่เผยแพร่</label>
                <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                @error('published_at')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('news.index') }}" class="btn btn-secondary me-md-2">ยกเลิก</a>
                <button type="submit" class="btn btn-primary">บันทึกข่าว</button>
            </div>
        </form>
    </div>
</x-bootstrap-theme>
