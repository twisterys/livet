<?php

use App\Http\Controllers\Api\V1\Admin\AuthorApiController;
use App\Http\Controllers\Api\V1\Admin\BookApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Author
    Route::post('authors/media', [AuthorApiController::class, 'storeMedia'])->name('authors.store_media');
    Route::apiResource('authors', AuthorApiController::class);

    // Book
    Route::apiResource('books', BookApiController::class);
});
