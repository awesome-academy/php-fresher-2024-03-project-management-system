<?php

use App\Http\Controllers\WorkFlowStepController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web project routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('projects/{projectId}/workFlows/{workFlowId}')->group(function () {
    Route::resource('workFlowSteps', WorkFlowStepController::class)
        ->except(['index']);
});
