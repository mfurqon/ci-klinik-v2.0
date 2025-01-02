<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// routes untuk halaman user/frontend
// routes untuk home
$route['tentang'] = 'home/tentang';

// routes untuk dokter
$route['dokter'] = 'user/dokter';
$route['dokter/detail/(:num)'] = 'user/dokter/detail/$1';

// routes untuk profile user
$route['profile'] = 'user/profile';
$route['profile/ubah-profile'] = 'user/profile/ubahProfile';

// routes untuk obat
$route['obat'] = 'user/obat';

// routes untuk janji temu
$route['janji-temu'] = 'user/janjitemu';
$route['janji-temu/batalkan-janji-temu/(:num)'] = 'user/riwayat/batalkanjanjitemu/$1';

// routes untuk riwayat
$route['riwayat/janji-temu'] = 'user/riwayat/janjitemu';
$route['riwayat/pemesanan-obat'] = 'user/riwayat/pemesananobat';
$route['riwayat/pemesanan-obat/print/(:num)'] = 'user/riwayat/printinvoice/$1';
$route['riwayat/pemesanan-obat/export-pdf/(:num)'] = 'user/riwayat/exportpdfinvoice/$1';

// routes untuk keranjang
$route['keranjang'] = 'user/keranjang';
$route['keranjang/(:any)/(:num)'] = 'user/keranjang/$1/$2';

// routes untuk pemesanan obat
$route['checkout-obat'] = 'user/pemesananobat/checkout';
$route['proses-pemesanan-obat'] = 'user/pemesananobat/prosespemesanan';
$route['pemesanan-obat/invoice'] = 'user/pemesananobat/invoice';
$route['pemesanan-obat/cetak-invoice'] = 'user/pemesananobat/printinvoice';
$route['pemesanan-obat/export-pdf-invoice'] = 'user/pemesananobat/exportpdfinvoice';

// routes untuk auth user
$route['auth'] = 'user/auth';
$route['auth/daftar'] = 'user/auth/daftar';
$route['auth/logout'] = 'user/auth/logout';
$route['auth/blok'] = 'user/auth/blok';


// routes untuk halaman admin/backend
$route['admin/jenis-obat'] = 'admin/jenisobat/index';
$route['admin/jenis-obat/(:any)/(:num)'] = 'admin/jenisobat/$1/$2';
$route['admin/pemesanan-obat'] = 'admin/pemesananobat/index';

// routes untuk janji temu admin
$route['admin/janji-temu'] = 'admin/janjitemu/index';
$route['admin/janji-temu/ubah-status/(:num)'] = 'admin/janjitemu/ubahstatus/$1';

// routes untuk profile admin
$route['admin/profile/ubah-profile'] = 'admin/profile/ubahprofile';
$route['admin/profile/ubah-password'] = 'admin/profile/ubahpassword';

// routes untuk laporan
// routes untuk laporan dokter
$route['admin/laporan/dokter'] = 'admin/laporan/laporandokter';
$route['admin/laporan/print-dokter'] = 'admin/laporan/laporandokter/print';
$route['admin/laporan/export-pdf-dokter'] = 'admin/laporan/laporandokter/exportpdf';
$route['admin/laporan/export-excel-dokter'] = 'admin/laporan/laporandokter/exportexcel';

// routes untuk laporan obat
$route['admin/laporan/obat'] = 'admin/laporan/laporanobat';
$route['admin/laporan/print-obat'] = 'admin/laporan/laporanobat/print';
$route['admin/laporan/export-pdf-obat'] = 'admin/laporan/laporanobat/exportpdf';
$route['admin/laporan/export-excel-obat'] = 'admin/laporan/laporanobat/exportexcel';

// routes untuk laporan user
$route['admin/laporan/user'] = 'admin/laporan/laporanuser';
$route['admin/laporan/print-user'] = 'admin/laporan/laporanuser/print';
$route['admin/laporan/export-pdf-user'] = 'admin/laporan/laporanuser/exportpdf';
$route['admin/laporan/export-excel-user'] = 'admin/laporan/laporanuser/exportexcel';

// routes untuk laporan janji temu
$route['admin/laporan/janji-temu'] = 'admin/laporan/laporanjanjitemu';
$route['admin/laporan/print-janji-temu'] = 'admin/laporan/laporanjanjitemu/print';
$route['admin/laporan/export-pdf-janji-temu'] = 'admin/laporan/laporanjanjitemu/exportpdf';
$route['admin/laporan/export-excel-janji-temu'] = 'admin/laporan/laporanjanjitemu/exportexcel';