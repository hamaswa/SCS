<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Position;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Auth;
//use Flash;

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

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $roles = Role::all();
        foreach ($roles as $role){

            $user->roles()->attach($role);

        }
        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UserDataTable $datatable)
    {

        return $datatable->render('admin.auth.index');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
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

        $data['positions'] = Position::all();
        return view('admin.auth.edit', $data)->with('user', $user);
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


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            //'username' => ['required', 'without_spaces', 'string', 'max:255', 'unique:users'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            //'password' => ['required', 'string', 'min:6'],
        ]);

        $user->update(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                //'mobile' => $data['mobile'],
                'country' => $data['country'],
                'state' => $data['state'],
                'city' => $data['city'],
                //'zipcode' => $data['zipcode'],
                //'username' => $data['username'],
                'position_id' => $data['position_id'],
                //'email' => $data['email'],
                //'password' => Hash::make($data['password']),
            ]);

        if (isset($data['position_id'])) {
            $role = Position::where('id', $data['position_id'])->first();
        }

        return redirect(route("users.index"));
    }


    public function showRegistrationForm()
    {
        $data['positions'] = Position::all();
        return view('admin.auth.register', $data);
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
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            //'mobile' => $data['mobile'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            //'zipcode' => $data['zipcode'],
            'username' => $data['username'],
            'position_id' => $data['position_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
