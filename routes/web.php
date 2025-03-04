<?php

use App\Livewire\Contacts\Create as CreateContact;
use App\Livewire\Contacts\Edit as EditContact;
use App\Livewire\Contacts\Index as Contacts;
use App\Livewire\CustomFields\CreateOrEdit as CreateOrEditCustomField;
use App\Livewire\CustomFields\Index as CustomFields;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'contacts')->name('home');

Route::get('contacts', Contacts::class)->name('contacts.index');
Route::get('contacts/create', CreateContact::class)->name('contacts.create');
Route::get('contacts/{contact}', EditContact::class)->name('contacts.edit');

Route::get('custom-fields', CustomFields::class)->name('custom_fields.index');
Route::get('custom-fields/create', CreateOrEditCustomField::class)->name('custom_fields.create');
Route::get('custom-fields/{customField}', CreateOrEditCustomField::class)->name('custom_fields.edit');
