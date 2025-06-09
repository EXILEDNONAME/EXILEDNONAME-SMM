# REQUIREMENT
- PHP Version 8.2.4 (php, file, glob, data, http, ftp, compress.zlib, compress.bzip2, https, ftps, zip, phar)
- Node.js v18.14.2

# INSTALL
- composer install
- npm install
- php artisan migrate:refresh --seed
- php artisan storage:link

- Copy .env.example. to .env
- Setting Database

# STRUCTURES
- (x) Dashboard
- (x) Datatables
- (x) Sessions
- (x) File Manager
- (x) Managements
- (X) Administrative Apps
- (x) Filter Relation Datatables
- (x) Create Page Online Sheets
- (x) Check Login For User Verified / Inactive
- (x) Page Register, Login & Forgot Password

# TO DO
- (x) Generator Simple Datatables
- Create Page Messages
- Create Page Notifications
- Create Page Generator
- Create Landing Page Controller
- Selected Delete Save to Activities
- Create Page Invoices With Menu Side

php artisan crud:generate AccessPoints --fields_from_file="./resources/cruds/exilednoname.json"

<!-- CONTROLLER CONSTRUCT -->
$this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
$this->middleware('permission:product-create', ['only' => ['create','store']]);
$this->middleware('permission:product-edit', ['only' => ['edit','update']]);
$this->middleware('permission:product-delete', ['only' => ['destroy']]);

Route::get('/send-personal', function () {
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send', CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => '', CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('target' => '1234567890', 'message' => 'Message',  'countryCode' => '62'),
    CURLOPT_HTTPHEADER => array('Authorization: <token>'),
  ));
  curl_exec($curl);
});

Route::get('/send-group', function () {
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send', CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => '', CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('target' => '1234567890@g.us', 'message' => 'Message'),
    CURLOPT_HTTPHEADER => array('Authorization: <token>'),
  ));
  curl_exec($curl);
});
