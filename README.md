# LAB-LARAVEL-CRUD-05

Laravel CRUD sederhana untuk mengelola data **Mahasiswa** dan **Program Studi**.

---

## Tugas

- Membuat 2 model:
  - `Student`
  - `StudyProgram`
- Implementasi:
  - **CRUD Mahasiswa** dengan **Eloquent ORM**
  - **CRUD Program Studi** dengan **Query Builder**
- Menjalin relasi **One to Many** antara `StudyProgram` dan `Student`

---

## Struktur Tabel

### Tabel `students`

| Kolom            | Tipe Data | Keterangan                            |
|------------------|-----------|----------------------------------------|
| id               | bigint    | Primary key (auto increment)           |
| student_number   | string    | Nomor Induk Mahasiswa                  |
| name             | string    | Nama Lengkap                           |
| email            | string    | Email (harus unik)                     |
| study_program_id(FK) | bigint | Foreign key ke `study_programs.id`     |
| created_at       | timestamp | Otomatis oleh Laravel                  |
| updated_at       | timestamp | Otomatis oleh Laravel                  |

### Tabel `study_programs`

| Kolom     | Tipe Data | Keterangan                  |
|-----------|-----------|------------------------------|
| id        | bigint    | Primary key (auto increment) |
| name      | string    | Nama Program Studi           |
| created_at| timestamp | Otomatis oleh Laravel        |
| updated_at| timestamp | Otomatis oleh Laravel        |

---

## ⚙️ Instalasi dan Setup

### 1. Clone Repository

```bash
git clone https://github.com/kodikas-studio-id/lab-laravel-crud
cd lab-laravel-crud
```

### 2. Install Dependency

```bash
composer install
npm install && npm run build
```

### 3. Salin File Environment
```bash
cp .env.example .env
```

### 4. Konfirgurasi Database

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab_laravel_crud
DB_USERNAME=root
DB_PASSWORD=
```



### 5. Generate App Key

```bash
php artisan key:generate
```

### 6. Jalankan Laravel

```bash
php artisan serve
```


Enjoy Coding! @kodikas.studio