<?php

use App\Livewire\Contacts\Edit as EditContact;
use App\Livewire\Contacts\Index as Contacts;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'contacts')->name('home');

Route::get('contacts', Contacts::class)->name('contacts.index');
Route::get('contacts/{contact}', EditContact::class)->name('contacts.edit');
