# แก้ไขปัญหา Layout และรูปภาพ

## ปัญหาที่พบ:
1. Layout ระหว่าง Local และ Domain ไม่เท่ากัน
2. รูปภาพไม่แสดงบน Domain
3. การ์ดข่าวมีขนาดไม่เท่ากัน

## การแก้ไขที่ทำแล้ว:

### 1. แก้ไข Grid Layout
- เปลี่ยนจาก `col-lg-6 col-xl-4` เป็น `col-lg-4 col-md-6`
- ให้แสดง 3 คอลัมน์บนหน้าจอใหญ่

### 2. แก้ไข CSS Container
- ตั้งค่า `max-width: 100%` โดย default
- ใช้ `@media (min-width: 1200px)` สำหรับ 1200px
- ให้ CSS จัดการ container width แทน JavaScript

### 3. แก้ไข JavaScript
- ลบการ override container width
- ให้ CSS จัดการ sizing ทั้งหมด

## คำสั่ง Deploy:

### 1. อัปโหลดไฟล์ที่แก้ไขแล้ว:
- `resources/views/layouts/app.blade.php`
- `resources/views/news/index.blade.php`

### 2. รันคำสั่งบน Server:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. ตรวจสอบ Symbolic Link:
```bash
php artisan storage:link
ls -la public/storage
```

### 4. ตรวจสอบ Permission:
```bash
chmod -R 755 storage
chmod -R 755 public/storage
```

## การทดสอบ:

### Local:
```bash
php artisan serve --port=8000
# เปิด http://localhost:8000
```

### Domain:
- เปิด https://songkran.csbootstrap.com/
- เปรียบเทียบกับ local

## ตรวจสอบปัญหา:

### 1. ตรวจสอบ Console (F12):
- ดู error ใน Console tab
- ตรวจสอบ Network tab ว่าไฟล์โหลดครบ

### 2. ตรวจสอบรูปภาพ:
- เปิด https://songkran.csbootstrap.com/storage/news/
- ควรเห็นไฟล์รูปภาพ

### 3. ตรวจสอบ CSS:
- ดู Elements tab ว่า CSS ถูกโหลด
- ตรวจสอบ computed styles

## หากยังมีปัญหา:

### 1. Clear Cache ทั้งหมด:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. ตรวจสอบ .env:
```bash
APP_URL=https://songkran.csbootstrap.com
```

### 3. ตรวจสอบ Storage URL:
```bash
php artisan tinker
>>> Storage::url('news/test.jpg')
```

