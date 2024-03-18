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
  #### **Konfigurasi Awal**
  - Upgrading : untuk mendapatkan update/rilis baru, maka kita dapat menggunakan syntax :
    ```shell
    composer update
    ```

## **2. Jalankan Server**
### **Konfigurasi Awal**
#### **Konfigurasi URL**
Buka file app/Config/App.php dengan editor teks.
- $baseURL : ubah base URL menjadi **$baseURL**. Jika memerlukan lebih banyak fleksibilitas, baseURL dapat di atur dalam file **.env** yaitu **app.baseURL = 'http://localhost:8080'**
  
  Sebelum
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/710c2165-135b-4ed3-b913-58aed3bf0279)
  
  Setelah
  
  ![image](https://github.com/astridnadiaa/Tugas1_PBF/assets/134594070/5ae7ca30-c89b-4581-87ad-35ba288d1953)


#### **Mengatur ke mode Development**
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

## 3. Bangun Aplikasi Pertama
### **Static Pages**
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
