<?php

use App\Livewire\Contacts\Create as CreateContact;
use App\Livewire\Contacts\Edit as EditContact;
use App\Livewire\Contacts\Index as Contacts;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'contacts')->name('home');

Route::get('contacts', Contacts::class)->name('contacts.index');
Route::get('contacts/create', CreateContact::class)->name('contacts.create');
Route::get('contacts/{contact}', EditContact::class)->name('contacts.edit');
