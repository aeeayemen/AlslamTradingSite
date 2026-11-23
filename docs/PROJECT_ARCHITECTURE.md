# دليل معمارية وتشغيل نظام TechCMS
## System Architecture & Operations Guide

> هذا الملف مخصص كمرجع دائم للمساعد الذكي والمطورين لفهم بنية المشروع وتدفق البيانات دون الحاجة لإعادة فحص كل الملفات يدوياً في كل جلسة عمل.

---

### 1. هيكل المجلدات الرئيسي (Directory Structure)

```text
C:\Users\anas\Desktop\code\
│
├── index.php                      # الصفحة الرئيسية للواجهة الأمامية
├── about.php, contact.php...      # صفحات الواجهة الأمامية الفرعية
│
├── Modals/                        # قوالب وأجزاء الواجهة الأمامية
│   ├── app_part/                  # المعالجات التأسيسية، اللغة، والتحقق
│   │   ├── getdatainitial.php     # نقطة انطلاق قراءة بيانات الشركة والسيو واللغة
│   │   ├── language.php           # كلاس اللغات والمصفوفة النصية
│   │   ├── vistorTracking.php     # كود تتبع الزوار وإحصائيات التصفح
│   │   └── header.php, footer.php
│   ├── app_view/                  # عروض الأقسام (about, services, clients, counter...)
│   └── indexModals/               # مكونات مخصصة للصفحة الرئيسية
│
├── techcms/                       # لوحة التحكم وإدارة المحتوى الخلفية
│   ├── admin/                     # صفحات إدارة الجداول وعرض البيانات
│   │   ├── Pages/                 # شاشات إدارة كل جدول عبر مكتبة jqGrid (28+ صفحة)
│   │   └── index.php              # الصفحة الرئيسية للوحة التحكم
│   ├── App/
│   │   └── App_constant.php       # إعدادات الاتصال بقاعدة البيانات، المسارات، والثوابت
│   ├── Models/
│   │   ├── App_Classes/
│   │   │   ├── Logins.php         # كلاس المصادقة وإدارة الجلسات والأمان
│   │   │   ├── App_Funcations.php # الكلاس الرئيسي لجلب وتحديث بيانات الجداول
│   │   │   └── DB.php             # طبقة الاتصال بقاعدة البيانات
│   │   └── App_Parts/             # ترويسة اللوحة، القائمة الجانبية (Menu-Builder.php)
│   └── lib/                       # مكتبات النظام (jqGrid, jQuery, CKEditor, ADOdb)
│
├── uploads/                       # مجلد حفظ واستعراض جميع الصور والملفات المرفوعة
├── filemanager / filemanagerx/    # مدير الملفات ورفع الصور المتطور (Responsive Filemanager)
├── assets/                        # ملفات التصميم، CSS، JS، الخطوط، وأيقونات الواجهة
└── docs/                          # ملفات التوثيق الدائمة للمشروع
    ├── DATABASE_SCHEMA.md         # مرجع جداول وحقول قاعدة البيانات
    └── PROJECT_ARCHITECTURE.md    # معمارية النظام وتشغيله (هذا الملف)
```

---

### 2. تدفق البيانات والمصادقة (Authentication & Authorization)

#### 2.1. تسجيل دخول لوحة التحكم:
- **نقطة الدخول:** `techcms/Logins.php`.
- **التحقق البرمجي:** في `techcms/Models/App_Classes/Logins.php` عبر الدالة `login($Appuser, $Appupass)`.
- **التشفير المستخدم:** دالة `md5($password)`.
- **التحقق من الرتبة:**
  - `userlevel = 9` (Admin).
  - يتم تخزين معرّف الجلسة `User_Key` وتحديث جدول `login_history` و `Active_user`.

#### 2.2. نظام الصلاحيات والقوائم الديناميكية:
- جدول `privilege_groups` يحوي المجموعات (`grup_id = 1` هو المدير).
- جدول `app_pages` يحوي جميع صفحات لوحة التحكم ومساراتها.
- جدول `users_group_privilegs_config` يربط المجموعة بالصفحة والصلاحية (1: إضافة، 2: تعديل، 3: حذف، 4: عرض، 5: وصول، 6: تصدير، 7: طباعة، 8: بحث، 9: ترتيب).
- يتم بناء القائمة الجانبية في لوحة التحكم تلقائياً عبر `techcms/Models/App_Parts/Admins/Menu-Builder.php` وفق صلاحيات المستخدم المسجل.

---

### 3. معيار معالجة وعرض الصور الموحد (Unified Image Standard)

لضمان عدم حدوث أخطاء 404 أو روابط مكسورة:
1. **دوال المعالجة في `techcms/App/App_constant.php`**:
   - `techcms_clean_image_path($path)`: تنظف المسار من الـ dots الزائدة (`../../`) وتُرجعه بصيغة نسبية آمنة `uploads/...`.
   - `techcms_render_grid_image($path)`: تولد كود HTML لوسم `<img>` في شبكات العرض jqGrid مع إضافة حدث `onerror` للانتقال التلقائي إلى الصورة البديلة `no-image.png`.
2. **الصور البديلة (Fallback Images)**:
   - متوفرة في `assets/images/no-image.png` و `uploads/no-image.png`.
3. **مدير الملفات (Filemanager)**:
   - تم ربطه عبر Junction ليعمل على كلا الاسمين `filemanager` و `filemanagerx`.
   - مسار التخزين المعتمد للرفع هو مجلد `uploads/`.

---

### 4. إعدادات قاعدة البيانات النشطة (Cloud MySQL Connection)

قاعدة البيانات الحالية مربوطة سحابياً على خادم **Clever Cloud**:
- **Host:** `bsochns6btjqes1ypfze-mysql.services.clever-cloud.com`
- **Database:** `bsochns6btjqes1ypfze`
- **Username:** `u57xk38e4azud91m`
- **Port:** `3306`
- **الترميز:** `utf8mb4` / `utf8mb4_unicode_ci`
- **الملف المسؤول عن الإعدادات:** [App_constant.php](file:///c:/Users/anas/Desktop/code/techcms/App/App_constant.php)

---

### 5. حساب الإدارة الافتراضي (Default Admin Access)

- **الرابط:** `http://localhost:8000/techcms/Logins.php`
- **اسم المستخدم:** `admin`
- **كلمة المرور:** `admin123`
