# การวิเคราะห์ระบบ MVC News - Case Diagram

## ภาพรวมระบบ
ระบบข่าวยาเสพติดที่พัฒนาด้วย Laravel Framework ใช้รูปแบบ MVC (Model-View-Controller) Architecture

## Case Diagram - ระบบข่าวยาเสพติด

```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                                ผู้ใช้ (User)                                    │
└─────────────────────────────────────────────────────────────────────────────────┘
                                        │
                                        │
┌─────────────────────────────────────────────────────────────────────────────────┐
│                              ระบบข่าวยาเสพติด                                   │
│                                                                                 │
│  ┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐            │
│  │   Controller    │    │      Model      │    │      View       │            │
│  │                 │    │                 │    │                 │            │
│  │ NewsController  │◄──►│     News        │◄──►│  news/index     │            │
│  │                 │    │                 │    │  news/show      │            │
│  │ - index()       │    │ - fillable      │    │  layouts/app    │            │
│  │ - show()        │    │ - casts         │    │                 │            │
│  │                 │    │ - scopePublished│    │                 │            │
│  └─────────────────┘    └─────────────────┘    └─────────────────┘            │
│           │                       │                       │                   │
│           │                       │                       │                   │
│           ▼                       ▼                       ▼                   │
│  ┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐            │
│  │     Routes      │    │   Database      │    │   Frontend      │            │
│  │                 │    │                 │    │                 │            │
│  │ / (index)       │    │ news table      │    │ Bootstrap 5     │            │
│  │ /news (list)    │    │ - id            │    │ Font Awesome    │            │
│  │ /news/{id}      │    │ - title         │    │ Responsive      │            │
│  │                 │    │ - content       │    │                 │            │
│  └─────────────────┘    │ - summary       │    └─────────────────┘            │
│                         │ - image_url     │                                   │
│                         │ - published_at  │                                   │
│                         │ - status        │                                   │
│                         │ - category      │                                   │
│                         │ - source_url    │                                   │
│                         │ - author        │                                   │
│                         └─────────────────┘                                   │
└─────────────────────────────────────────────────────────────────────────────────┘
```

## รายละเอียดการทำงานของแต่ละส่วน

### 1. Model (News.php)
**หน้าที่:** จัดการข้อมูลและตรรกะทางธุรกิจ
- **Attributes:** title, content, summary, image_url, published_at, status, category, source_url, author
- **Methods:** 
  - `scopePublished()` - กรองข่าวที่เผยแพร่แล้ว
  - `casts` - แปลง published_at เป็น datetime

### 2. Controller (NewsController.php)
**หน้าที่:** รับคำขอและประมวลผล
- **index()** - แสดงรายการข่าวทั้งหมด
- **show($id)** - แสดงรายละเอียดข่าวตาม ID

### 3. View (Blade Templates)
**หน้าที่:** แสดงผลข้อมูลให้ผู้ใช้
- **news/index.blade.php** - หน้ารายการข่าว
- **news/show.blade.php** - หน้ารายละเอียดข่าว
- **layouts/app.blade.php** - Layout หลัก

### 4. Routes (web.php)
**หน้าที่:** กำหนดเส้นทาง URL
- `GET /` → NewsController@index
- `GET /news` → NewsController@index  
- `GET /news/{id}` → NewsController@show

### 5. Database
**หน้าที่:** เก็บข้อมูลข่าว
- **Table:** news
- **Fields:** id, title, content, summary, image_url, published_at, status, category, source_url, author, timestamps

## การไหลของข้อมูล (Data Flow)

```
1. ผู้ใช้เข้าถึง URL
   ↓
2. Routes กำหนด Controller และ Method
   ↓
3. Controller เรียกใช้ Model เพื่อดึงข้อมูล
   ↓
4. Model ส่งคำสั่ง SQL ไปยัง Database
   ↓
5. Database ส่งข้อมูลกลับไปยัง Model
   ↓
6. Model ส่งข้อมูลไปยัง Controller
   ↓
7. Controller ส่งข้อมูลไปยัง View
   ↓
8. View แสดงผลข้อมูลให้ผู้ใช้
```

## คุณสมบัติพิเศษของระบบ

### 1. การกรองข้อมูล
- ใช้ `scopePublished()` เพื่อแสดงเฉพาะข่าวที่เผยแพร่แล้ว
- เรียงลำดับตาม `published_at` ล่าสุด

### 2. การแสดงผล
- ใช้ Bootstrap 5 สำหรับ Responsive Design
- มี Font Awesome Icons
- แสดงรูปภาพ, หมวดหมู่, ผู้เขียน, วันที่เผยแพร่

### 3. การจัดการข้อมูล
- รองรับ HTML Content
- มี Summary สำหรับแสดงย่อหน้า
- มี Source URL และ Author
- ระบบ Status (draft/published)

### 4. การออกแบบ UI/UX
- Card Layout สำหรับแสดงข่าว
- Hover Effects
- Breadcrumb Navigation
- Share และ Print Functions
- Responsive Design

## ข้อดีของ Architecture นี้

1. **แยกส่วนชัดเจน** - Model, View, Controller ทำงานแยกกัน
2. **ง่ายต่อการบำรุงรักษา** - แก้ไขส่วนใดส่วนหนึ่งได้โดยไม่กระทบส่วนอื่น
3. **สามารถขยายได้** - เพิ่มฟีเจอร์ใหม่ได้ง่าย
4. **ใช้มาตรฐาน Laravel** - ตาม Best Practices ของ Laravel Framework
5. **รองรับการทดสอบ** - สามารถเขียน Unit Test ได้ง่าย

## ข้อเสนอแนะการพัฒนาต่อ

1. **เพิ่มระบบ Authentication** - สำหรับผู้ดูแลระบบ
2. **เพิ่มระบบ CRUD** - สร้าง, แก้ไข, ลบข่าว
3. **เพิ่มระบบ Search** - ค้นหาข่าว
4. **เพิ่มระบบ Category** - จัดหมวดหมู่ข่าว
5. **เพิ่มระบบ Comment** - ให้ผู้ใช้แสดงความคิดเห็น
6. **เพิ่มระบบ API** - สำหรับ Mobile App
