    <?php

    use App\Http\Controllers\HotelController;
    use App\Http\Controllers\RundownController;
    use App\Http\Controllers\TourController;
    use App\Http\Controllers\TransportationController;
    use Illuminate\Support\Facades\Route;

    // Route untuk tampilan utama
    Route::get('/', function () {
        return view('welcome');
    });

    // Route admin
    Route::get('/admin', function () {
        return view('backend.app');
    })->name('admin');
    // ==============================================================
    // Route untuk Tour
    Route::resource('tours', TourController::class);
    // ==============================================================
    // Route untuk Transportation (CRUD via Resource Controller)
    Route::resource('tours.transportations', TransportationController::class);

    // Route tambahan untuk Import Transportation
    Route::post('tours/{tour}/transportations/import', [TransportationController::class, 'import'])->name('tours.transportations.import');
    // ==============================================================
    // Route untuk Hotel
    Route::resource('tours.hotels', HotelController::class);

    // Route tambahan untuk Import Transportation
    Route::post('tours/{tour}/hotels/import', [HotelController::class, 'import'])->name('tours.hotels.import');
    // ==============================================================
    // Route untuk Hotel
    Route::resource('tours.rundowns', RundownController::class);

    // Route tambahan untuk Import Transportation
    Route::post('tours/{tour}/rundowns/import', [RundownController::class, 'import'])->name('tours.rundowns.import');
