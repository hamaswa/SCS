<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function index(UserDataTable $datatable)
    {
        return $datatable->render('auth.index');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'without_spaces', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Show the application edit form for user editing.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //if(auth()->user()->hasRole('administrator')
        //   or auth()->user()->hasPermission('edit-user')
        //   or auth()->user()->hasPermissionThroughRole('edit-user')) {


        $user = User::find($id);

        $data['roles'] = Role::all();
        return view('auth.edit', $data)->with('user', $user);
        // }
        // else return "You don't have permissions to edit User";
    }


    public function show($id)
    {

        $user = User::find($id);
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }


    public function update(Request $request, $id, UserDataTable $datatable)
    {
        $user = User::find($id);
        $data = $request->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'without_spaces', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user->update(
            ['name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'address' => $data['address'],
                'status' => $data['status']
            ]);

        if (isset($data['role'])) {
            $user->roles()->detach();
            $role = Role::where('id', $data['role'])->first();
            $user->roles()->attach($role);
        }


        return redirect( route("users.index"));
    }


    public function showRegistrationForm()
    {
        $data['roles'] = Role::all();
        return view('auth.register', $data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'country' => $data['country'],
            'memberid' => $data['memberid'],
            'type' => $data['type'],
            'enabletelemarkaccess' => $data['enabletelemarkaccess'],
            'uplineid' => $data['uplineid'],
            'bankgroup' => $data['bankgroup'],
            'rankid' => $data['rankid'],
            'name' => $data['name'],
            'nric' => $data['nric'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'state' => $data['state'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'altemail' => $data['altemail'],
            'status' => $data['status'],
            'insuranceid' => $data['insuranceid'],
            'bankpayee' => $data['bankpayee'],
            'bankaccount' => $data['bankaccount'],
            'banktype' => $data['banktype'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
