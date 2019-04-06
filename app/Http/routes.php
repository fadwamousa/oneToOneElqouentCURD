<?php

use App\Address;
use App\User;


/*
|  use one to one Query Method.
|  save address for particular user. 
|  by using relationship .
*/
Route::get('/insert', function () {
    

    $user = User::findOrFail(1);

    $add  = Address::create(['name'=>'Demmita 154']); 

    /*$address = new Address();
    $address->name = "Tanta,cairo 152";*/
    $user->address()->save($add);
    //address is the function in User model 
    //we make user_id nullable :) !!.

});

//update the address for particular user

Route::get('/update',function(){

	/*$address = Address::where('user_id','=',1)->first();
	$address->name = "updated Egypt 147";
	$address->save();*/

	$address = Address::whereUserId(1)->first();
	$address->name = "updated new  Egypt 147";
	$address->save();

});


//read the address for user
Route::get('/read',function(){

	$user     = User::findOrFail(1);
	$user_add = $user->address->name;
	return $user_add;
});


//delete the address for user

Route::get('/delete',function(){

	$user = User::findOrFail(1);
	$user->address->delete();
});