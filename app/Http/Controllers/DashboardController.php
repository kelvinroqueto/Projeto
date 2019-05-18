<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;
use App\Entities\User;
class DashboardController extends Controller
{
    private $repository;
    private $validator;
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    

    }
    public function index()
    {
        return view('user.dashboard');
    }
    public function auth(Request $request)
    {
        $data = [
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        ];

        if(env('PASSWORD_HASH') == 'true') { 
            Auth::attempt($data, false); 
            $user = User::where('email', $request->email)->where('password', $request->password)->first();
        } else {
             $user = User::where('email', $request->email)->where('password', $request->password)->first();
    }
    if(!$user){
        throw new Exception("Usuário ou senha inválido. PEEEEN!");
    } else {
        Auth::loginUsingId($user->id);
      
    }
    return redirect()->route('user.dashboard');
} public function logout(){
    Auth::logout();

    return redirect()->route('login');
}
}