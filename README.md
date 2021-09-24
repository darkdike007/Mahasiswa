
## Cara Menginstall

Website ini adalah sebuah website yang saya buat, sebagai test dari perusahaan PT. SASTRO UTAMA MEDIA GRUP. Berikut ini adalah langkah - langkah untuk menginstall website saya, silahkan lihat daftar di bawah ini:

- Melakukan copy & paste .env.example dan mengganti .env.example yang telah di copy menjadi .env dan edit isinya.
- Melakukan atau menjalankan command berikut.
    ```bash
    composer install
    ```
- Menambahkan database yang telah anda buat ke file .env.
- Jalankan perintah berikut ini untuk memunculkan node_modules (Optional).
    ```bash
    npm install
    ```
- Menjalankan migration dengan menjalankan perintah berikut ini.
    ```bash
    php artisan migrate --seed
    ```
- Jalankan websitenya dengan perintah berikut ini.
    ```bash
    php artisan serve
    ```
- Berikut ini adalah email & passwordnya.
    ```
    EMAIL: adminMaster@admin.com
    PASSWORD: password
    ```
