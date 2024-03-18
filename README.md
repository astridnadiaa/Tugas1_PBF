# Tugas1_PBF
##### Astrid Nadia Ayu Kartikasari_220302078

## Pengertian Framework
  Framework merupakan suatu kerangka kerja yang dipakai dalam pengembangan situs web.
## Pengertian codeigniter
  Codeigniter adalah kerangka pengembangan aplikasi atau sebuah toolkit, untuk memudahkan orang-orang yang membangun situs web menggunakan PHP.
  
## Instalasi
## **1. Instalasi Composer**
- Start all Laragon lalu masuk ke terminal laragon yang sudah otomatis masuk ke root.
- Setelah itu tuliskan syntax dibawah ini untuk membuat folder project baru dengan rnama PBF_Tugas1
  ```shell
  composer create-project codeigniter4/appstarter PBF_Tugas1
  ```
  #### **2. Konfigurasi Awal**
  - Upgrading : untuk mendapatkan update/rilis baru, maka kita dapat menggunakan syntax :
    ```shell
    composer update
    ```

## **Jalankan Server**
### **Konfigurasi Awal**
#### **3. Konfigurasi URL**
Buka file app/Config/App.php dengan editor teks.
- $baseURL : ubah base URL menjadi **$baseURL**. Jika memerlukan lebih banyak fleksibilitas, baseURL dapat di atur dalam file **.env** yaitu **app.baseURL = 'http://localhost:8080'**
  
  Sebelum
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/710c2165-135b-4ed3-b913-58aed3bf0279)
  
  Setelah
  
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/5ae7ca30-c89b-4581-87ad-35ba288d1953)


#### **4. Mengatur ke mode Development**
untuk mengaktifkan mode debugging, kita harus mengubah environment variable **CI_ENVIRONMENT** menjadi **development** yang ada pada file .env
- Sebelum

  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/4f29950d-030a-4a6d-98d8-6eaf6be4cdd2)
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/26892886-0112-46c6-950e-637328c531ff)
  
- Sesudah

  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/9f1ae496-0a26-4bb8-85ef-caeb11e52890)
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/edf5de76-7f61-4c4a-a3e1-10d2e34bc666)
### **Server Pengembangan Lokal**
- Masuk ke terminal laragon, lalu masuk ke folder project menggunakan syntax :
  ```shell
  cd PBF_Tugas1
  ```
- Kemudian untuk mengaktifkan server kita menggunakan syntax :
   ```shell
  php spark serve
  ```
   perintah diatas akan menjalankan CI 4 pada port 8080
   ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/12914f96-5d99-46d1-bf5f-075402cd715d)
  - Setelah muncul tampilan seperti diatas maka server sudah aktif, lalu coba buka web browser dan arahkan ke alamat http://localhost:8080 dan kemudian hasilnya akan seperti dibawah ini yang berarti CI 4 sudah berhasil di install.
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/45b16db9-547f-4ba9-82d6-aed662e6d75e)

## Bangun Aplikasi Pertama
### **5. Static Pages**
#### **Setting Routing Rules**
Routing mengaitkan URL dengan controller's method. COntroller adalah sebuah class yang mrmbantu mendelegasikan pekerjaan.
- Buka file routes yang terletak pada **app/Config/Routes.php**
- satu-satunya routes untuk start adalah :
```shell
  <?php
  use CodeIgniter\Router\RouteCollection;
  /**
  @var RouteCollection $routes
  /
  $routes->get('/', 'Home::index');
```
Syntax diatas akan membuat jalur dengan metode request nya **get** dan **/** artinya route diarahkan ke controller **home** method nya **index**
- tambahkan baris berikut, setelah arahan route untuk **'/'**
```shell
use APP\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index;]);
$routes->get('(:segment)', [Pages::class, 'view;]);
```
- CodeIgniter membaca routing rules dari atas ke bawah dan mengarahkan request ke rule pertama yang memenuhi. Ketika sebuah request masuk, maka CI mencari kecocokan pertama dan memanggil controller dan method yang sesuai. mungkin juga menggunakan argumen.
- kemudian rule kedua dalam $routes akan membuat jalur yang metode request nya **get** dan **/** artinya route diarahkan ke controller pages method nya index
- Lalu rule ketiga dalam $routes akan membuat jalur yang metode request nya **get** dan **/** artinya route diarahkan ke controller pages method nya view
#### **Buat Controllers Pertama**
##### **Create Controller Pages**
- Buat file Pages.php pada **app/Controllers**

  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/39d6daec-d886-4728-8e7d-a226f1cd7f28)
- kemudian masuk ke **app/Controllers/Pages.php** dan buat class dengan syntax :
```shell
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...
    }
}
```
setelah membuat kelas bernama **Pages**, dengan **view()** method yang menerima satu argumen bernama **$page**. Ia juga memiliki **index()** method, sama dengan default controller yang ditemukan di **app/Controllers/Home.php ; ** method itu menampilkan CodeIgniter welcome page.
Class Pages memperluas BaseController class yang memperluas CodeIgniter\Controller class.Ini berarti bahwa kelas Pages baru dapat mengakses metode dan properti yang ditentukan dalam CodeIgniter\Controller class ( **system/Controller.php** ).
  Controller inilah yang akan menjadi pusat dari setiap request pada aplikasi web. Seperti kelas PHP lainnya, Anda menyebutnya di dalam Controllers Anda sebagai **$this**.
##### **Create Views**
- Buat file header.php pada folder **app/Views/templates**
![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/fffe2ef5-fe4a-4ffe-8696-b8c81e8ddafb)

- tambahkan syntax berikut :
```shell
<!doctype html>
<html>
<head>
    <title>Tugas1 PBF</title>
</head>
<body>

    <h1><?= esc($title) ?></h1>
```
Header berisi kode HTML dasar yang ingin Anda tampilkan sebelum memuat view utama, bersama dengan title. Ini juga akan menampilkan $title variabel, yang akan kita definisikan nanti di Controller.
- Buat file footer.php pada folder **app/Views/templates**
```shell
    <em>&copy; 2024</em>
</body>
</html>
```
#### **Menambahkan Logika ke Controller**
##### **Create home.php dan about.php**
Sebelumnya Anda menyiapkan pengontrol dengan suatu **view()** method. method ini menerima satu parameter, yaitu nama halaman yang akan dimuat.

Badan halaman statis akan ditempatkan di direktori **app/Views/pages** .
Di direktori itu, buat dua file bernama **home.php** dan **about.php** . Di dalam file tersebut, ketikkan beberapa teks - apa pun.
- home.php
  ```shell
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tugas1 PBF</title>
    </head>
  <body>
  <h1>Ini View Home Page</h1>
  </body>
  </html>
  ```
- about.php
  ```shell
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tugas1 PBF</title>
    </head>
  <body>
  <h1>Ini View About Page</h1>
  </body>
</html>
```

##### **Complete Pages::view() Method**
Untuk memuat halaman tersebut, kita harus memeriksa apakah halaman yang diminta benar-benar ada. Ini adalah syntax method **view()** pada **Pages** controller yang dibuat di atas:
```shell
<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

class Pages extends BaseController
{
    // ...

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}
```

#### **Menjalankan Aplikasi**
- Home Page
  ```shell
  localhost:8080/home
  ```

  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/4ad04838-5e9f-41c5-84b8-647dada9b851)

- About Page
  ```shell
  localhost:8080/about
  ```
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/0fa48abc-49f2-4c6b-b5db-faf295149249)

## CodeIgniter4 Overview
### **4. Struktur Aplikasi**
#### **Default Directories**
**App**
Direktori **app** adalah tempat semua kode aplikasi Anda berada. CodeIgniter 4 hadir dengan struktur direktori default yang berfungsi dengan baik untuk banyak aplikasi. Folder berikut membentuk konten dasar:
![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/02a0bee2-5acc-4c4c-8624-471c967fea68)
Semua file dalam direktori ini berada di bawah App namespace, meskipun Anda bebas mengubahnya di **app/Config/Constants.php**.

**System**
Direktori ini menyimpan file-file yang membentuk kerangka itu sendiri. Meskipun Anda memiliki banyak fleksibilitas dalam cara menggunakan direktori aplikasi, file dalam direktori sistem tidak boleh diubah. Sebaliknya, Anda harus memperluas kelas, atau membuat kelas baru, untuk menyediakan fungsionalitas yang diinginkan.

Semua file dalam direktori ini berada di bawah **CodeIgniter** namespace.

**Public**
Folder public menampung bagian aplikasi web Anda yang dapat diakses browser, mencegah akses langsung ke kode sumber Anda. Ini berisi file **.htaccess** utama , **index.php** , dan aset aplikasi apa pun yang Anda tambahkan, seperti CSS, javascript, atau gambar.

Folder ini dimaksudkan sebagai “root web” situs Anda, dan server web Anda akan dikonfigurasi untuk mengarah ke folder tersebut.

**Writable**
Direktori ini menampung semua direktori yang mungkin perlu ditulisi selama masa pakai aplikasi. Ini termasuk direktori untuk menyimpan file cache, log, dan unggahan apa pun yang mungkin dikirim pengguna. Anda harus menambahkan direktori lain tempat aplikasi Anda perlu menulis di sini. Hal ini memungkinkan Anda untuk menjaga direktori utama lainnya tidak dapat ditulisi sebagai langkah keamanan tambahan.

**Test**
Direktori ini disiapkan untuk menyimpan file pengujian Anda. Direktori ini **_support** menampung berbagai kelas tiruan dan utilitas lain yang dapat Anda gunakan saat menulis pengujian Anda. Direktori ini tidak perlu ditransfer ke server produksi Anda.

**Modifying Directory Locations**
Jika Anda telah memindahkan salah satu direktori utama, Anda dapat mengubah pengaturan konfigurasi di dalam **app/Config/Paths.php** .

### **6. Models, Views, Controller**
#### **Apa itu MVC**
Model View Controller (MVC) adalah sebuah pola arsitektur dalam membuat sebuah aplikasi dengan cara memisahkan kode menjadi tiga bagian yang terdiri dari:
  1. Model
     Bagian yang bertugas untuk menyiapkan, mengatur, memanipulasi, dan mengorganisasikan data yang ada di database.
  2. View
     Bagian yang bertugas untuk menampilkan informasi dalam bentuk Graphical User Interface (GUI).
  3. Controller
     Bagian yang bertugas untuk menghubungkan serta mengatur model dan view agar dapat saling terhubung.
