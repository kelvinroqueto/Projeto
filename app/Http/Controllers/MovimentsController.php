<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovimentCreateRequest;
use App\Http\Requests\MovimentUpdateRequest;
use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use App\Entities\Group;
use App\Entities\Product;
use Auth;
use App\Services\MovimentService;
/**
 * Class MovimentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MovimentsController extends Controller
{
    /**
     * @var MovimentRepository
     */
    protected $repository;

    /**
     * @var MovimentValidator
     */
    protected $validator;

    protected $serivce;

    /**
     * MovimentsController constructor.
     *
     * @param MovimentRepository $repository
     * @param MovimentValidator $validator
     */
    public function __construct(MovimentRepository $repository, MovimentValidator $validator, MovimentService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $service;
  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(){

      return view('moviments.index', ['product_list' => Product::all(),]);
     }
  public function application(){
     
    $user           = Auth::user();
    $group_list = $user->groups->pluck('name', 'id');
    $product_list   =    Product::all()->pluck('name', 'id');;
       
      return view('moviments.application', ['product_list' => $product_list, 'group_list' => $group_list]);
  }
  public function store(Request $request){
    $user           = Auth::user()->id;
    
    $request = $this->service->store( $request->all(), $user);
    $group = $request['success'] ? $request['data'] : null;
    session()->flash('success', [
        'success' => $request['success'],
        'messages' => $request['messages']
        ]);
        return redirect()->route('moviment.application');
  }

  public function all()
  {
$moviment_list = Auth::user()->moviments;
  return view('moviments.all',[ 'moviment_list' => $moviment_list]);

}

public function getback(){
  $user           = Auth::user();
  $group_list = $user->groups->pluck('name', 'id');
  $product_list   =    Product::all()->pluck('name', 'id');;
     
    return view('moviments.getback', ['product_list' => $product_list, 'group_list' => $group_list]);
}

public function storeGetBack(Request $request){
  $user           = Auth::user()->id;
  
  $request = $this->service->storeGetBack( $request->all(), $user);
  $group = $request['success'] ? $request['data'] : null;
  session()->flash('success', [
      'success' => $request['success'],
      'messages' => $request['messages']
      ]);
      return redirect()->route('moviments.getback');
}
}
