<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan;
use App\Events\NewCreatedUser;

class UsersController extends Controller
{
	public function homepage() : View 
	{
		Artisan::call('delete:inactive_users chippy@gmail.com');
		return view('user.homepage'); 
	}
	public function doLogin() : RedirectResponse
	{
		//Laravel will decide the workflow and it redirects back to the form
		// with laravel's message.
		/*request()->validate([
			"email" => 'required|email',
			"password" => 'required',
		]);*/
		//Custom validation, means if error happend, what to do next
		$rules = [
			"email" => 'required|email',
			"password" => 'required',
  ];
		// Custom error messages
		$customMessages = [
			'email.required' => 'The email field is required.',
			'email.email' => 'The email must be a valid email address.',
			'password.required' => 'Please enter a password.',
		];

		$validator = Validator::make(request()->all(), $rules, $customMessages);
		if ($validator->fails()) {
						return redirect()->route('home')->withErrors($validator)->withInput(request()->all());
		}

		$input = ["email" => request('email'),
							"password" => request('password')];
		if (auth()->attempt($input, true)) {
			//Session::put('username', request('email'));
			return redirect()->route('user.homepage')
												->with('message', "User logged in successfully"); 
		}
		else {
			return redirect()->back()->withErrors(['error_key' => 'Login is invalid']);
		}

	}
	public function logout() : RedirectResponse
	{
		auth()->logout();
		return redirect()->route('home')
		->with('message', "Logged out successfully"); 
	}
	public function search($id_or_name, $status) {
			if($status == "active" || $status == "Active" || $status == "ACTIVE"){
					$status == "active";
					$db_status = 1;
			}
			else {
					$db_status = 0;
					$status == "blocked";
			}
			

			$users = User::all();
			if(isset($id_or_name) && $id_or_name != NULL) {
					if(is_numeric($id_or_name)) {
							//$users = User::find($id_or_name); // return in a single object
							//$users = User::where('id', '=', $id_or_name)->first(); // return in a single object
							$users = User::where('id', '=', $id_or_name)->get();// return in an array
							//$users = User::whereIn('id', ['43','23'])->get(); 
							$status = "2";
					}
					else {
							//$users = User::active()->orderBy('name', 'ASC')->get();

							$users = User::where('name', 'LIKE', '%' . $id_or_name.'%')
							->where('status', $db_status)->latest()->orderBy('name', 'DESC')->limit(10)->get();
					}
			}
			return view('users', compact("users", 'status'));

	} 

	public function list() {
		if (cache()->get('users')) {
			$users = cache()->get('users');
		}
		else {
			$users = User::active()->latest()->paginate(10);
			cache()->put('users',$users);
		}
		return view('user.list', compact('users'));
	}

	public function edit($userid) {
			$user = User::find($userid);
			Debugbar::info($userid);
			Debugbar::error("user edit");
			return view('user.edit', compact('user'));
	}

	public function update(Request $request, $user_id) {
			$user = User::find($user_id);
			$user->update([
				"name" => request('name'),
			]);
			$user_address = $user->address()->updateOrCreate(
			["user_id" => $user_id],
			[
				"city" => request('city'),
				"street_address" => request('street_address'),
				"country" => request('country'),
				"country_code" => request('country_code'),
				"pincode" => request('pincode'),
			]);
			if($user_address)
			return redirect()->route('user.list')
											 ->with('message', "User is updated successfully");
			else 
			return redirect()->back()
			->with('error', "Failed to update user");
	}

	public function create() {
			return view('user.create');
	}

	public function save() {
		request()->validate([
			"name" => 'required',
			"email" => 'required|email|unique:users',
			"password" => 'required|min:8|confirmed',
		]);

		Debugbar::info("validated");
		$user = User::create([
			"name" => request('name'),
			"email" => request('email'),
			"password" => bcrypt (request('password')),
		]);
		if($user) {
			cache()->forget('users');
			NewCreatedUser::dispatch($user);

			if (auth()->check()) {
					return redirect()->route('user.list')
				->with('message', "User created successfully");
			}
			else {
				return redirect()->route('home')
				->with('message', "User created successfully");
			}
		}
		else {
			return redirect()->back()
							->with('error', "Error with user creation");
		}
	}
	

}
