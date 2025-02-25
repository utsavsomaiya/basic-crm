<?php

use App\Livewire\Contact\ListPage as ContactListPage;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'contacts')->name('home');

Route::get('contacts', ContactListPage::class)->name('contacts.index');
