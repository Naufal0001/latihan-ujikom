<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesDetailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => 'level:1'], function () {
        Route::get('/kategori/data', [CategoryController::class, 'data'])->name('kategori.data');
        Route::resource('/kategori', CategoryController::class);

        Route::get('/produk/data', [ProductController::class, 'data'])->name('produk.data');
        Route::post('/produk/delete-selected', [ProductController::class, 'deleteSelected'])->name('produk.delete_selected');
        Route::post('/produk/cetak-barcode', [ProductController::class, 'cetakBarcode'])->name('produk.cetak_barcode');
        Route::resource('/produk', ProductController::class);

        Route::get('/member/data', [MemberController::class, 'data'])->name('member.data');
        Route::post('/member/cetak-member', [MemberController::class, 'cetakMember'])->name('member.cetak_member');
        Route::resource('/member', MemberController::class);

        Route::get('/penjualan/data', [SalesController::class, 'data'])->name('penjualan.data');
        Route::get('/penjualan', [SalesController::class, 'index'])->name('penjualan.index');
        Route::get('/penjualan/{id}', [SalesController::class, 'show'])->name('penjualan.show');
        Route::delete('/penjualan/{id}', [SalesController::class, 'destroy'])->name('penjualan.destroy');
    });

    Route::group(['middleware' => 'level:1,2'], function () {
        Route::get('/transaksi/baru', [SalesController::class, 'create'])->name('transaksi.baru');
        Route::post('/transaksi/simpan', [SalesController::class, 'store'])->name('transaksi.simpan');
        Route::get('/transaksi/selesai', [SalesController::class, 'selesai'])->name('transaksi.selesai');
        Route::get('/transaksi/nota-kecil', [SalesController::class, 'notaKecil'])->name('transaksi.nota_kecil');
        Route::get('/transaksi/nota-besar', [SalesController::class, 'notaBesar'])->name('transaksi.nota_besar');

        Route::get('/transaksi/{id}/data', [SalesDetailController::class, 'data'])->name('transaksi.data');
        Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [SalesDetailController::class, 'loadForm'])->name('transaksi.load_form');
        Route::resource('/transaksi', SalesDetailController::class)
            ->except('create', 'show', 'edit');
    });

    Route::group(['middleware' => 'level:1'], function () {
        Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/data/{awal}/{akhir}', [ReportController::class, 'data'])->name('laporan.data');
        Route::get('/laporan/pdf/{awal}/{akhir}', [ReportController::class, 'exportPDF'])->name('laporan.export_pdf');

        Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
        Route::resource('/user', UserController::class);

        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
        Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
    });
 
    Route::group(['middleware' => 'level:1,2'], function () {
        Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
        Route::post('/profil', [UserController::class, 'updateProfil'])->name('user.update_profil');
    });
});
