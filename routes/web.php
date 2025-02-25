<?php

use App\Livewire\Contacts;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'contacts')->name('home');

Route::get('contacts', Contacts::class)->name('contacts.index');
