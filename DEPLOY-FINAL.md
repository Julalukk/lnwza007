# คำสั่ง Deploy ขึ้น Domain - Final

## 1. อัปโหลดไฟล์ขึ้น Server
```bash
# อัปโหลดไฟล์ทั้งหมด (ยกเว้น node_modules, vendor, .git)
# หรือใช้ Git
git pull origin main
```

## 2. รันคำสั่งบน Server

### ติดตั้ง Dependencies
```bash
composer install --optimize-autoloader --no-dev
```

### ตั้งค่า Environment
```bash
cp .env.example .env
# แก้ไข .env ให้ตรงกับ Server
```

### ตั้งค่า Database
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### สร้าง Symbolic Link
```bash
php artisan storage:link
```

### Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### Rebuild Cache
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### ตั้งค่า Permission (ถ้าใช้ Linux)
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public/storage
```

## 3. คำสั่งรวมสำหรับ Deploy ครั้งแรก
```bash
composer install --optimize-autoloader --no-dev
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
chmod -R 755 storage bootstrap/cache public/storage
```

## 4. คำสั่งสำหรับอัปเดท Code ใหม่
```bash
git pull origin main
composer install --optimize-autoloader --no-dev
php artisan migrate
php artisan storage:link
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
chmod -R 755 storage bootstrap/cache public/storage
```

## 5. ตรวจสอบหลัง Deploy

### ตรวจสอบ URL รูปภาพ
- เปิด `https://yourdomain.com/storage/news/`
- ควรเห็นไฟล์รูปภาพ

### ตรวจสอบ Layout
- เปิด `https://yourdomain.com/`
- ควรเห็น layout เหมือน local

### ตรวจสอบ Console
- เปิด Developer Tools (F12)
- ดู Console tab ว่ามี error หรือไม่

## 6. ไฟล์ที่สำคัญที่แก้ไขแล้ว

### layouts/app.blade.php
- เพิ่ม CSS สำหรับ layout สม่ำเสมอ
- เพิ่ม JavaScript สำหรับแก้ไข viewport
- ตั้งค่า container max-width = 1200px

### ไฟล์ที่ต้องอัปโหลด
- resources/views/layouts/app.blade.php
- resources/views/news/index.blade.php
- public/css/custom.css (ถ้ามี)

## 7. การทดสอบ

### ทดสอบ Local
```bash
php artisan serve --port=8000
# เปิด http://localhost:8000
```

### ทดสอบ Domain
- เปิด https://songkran.csbootstrap.com/
- เปรียบเทียบกับ local

## 8. หากยังมีปัญหา

### ตรวจสอบ CSS
- เปิด Developer Tools (F12)
- ดู Elements tab ว่า CSS โหลดครบหรือไม่

### ตรวจสอบ JavaScript
- ดู Console tab ว่ามี error หรือไม่

### ตรวจสอบ Network
- ดู Network tab ว่าไฟล์โหลดครบหรือไม่
