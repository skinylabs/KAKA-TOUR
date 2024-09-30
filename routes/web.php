    <?php

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

    // Route untuk Tour
    Route::resource('tours', TourController::class);

    // Route untuk Transportation
    Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');
    Route::resource('tours.transportations', TransportationController::class);

    Route::post('tours/{tour}/transportations/import', [TransportationController::class, 'import'])->name('tours.transportations.import');
