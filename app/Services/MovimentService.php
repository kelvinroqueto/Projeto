<?php
nameSpace App\Services;

use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;

class MovimentService{

    private $repository;
    private $validator;

public function __construct(MovimentValidator $validator, MovimentRepository $repository){

    $this->validator = $validator;
    $this->repository = $repository;

}

public function store($data, $user_id){

    try{
    $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
   $data['user_id'] = $user_id;
   $data['type'] = 1;
    $moviment = $this->repository->create($data);

    
    

    return [
        'success'       => true,
        'messages'      => "Investimento no valor de " . $moviment->value ." realizado no produto " . $moviment->product->name . " com sucesso.",
        'data'          => $moviment];
    }catch(Exception $e){
      
switch(get_class($e)){
    case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
    case ValitadorException::class : return ['success' => false, 'messages' => $e->getMessageBag()];
    case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
    default : return ['success' => false, 'messages' => $e->getMessage()];
}

    }

}
public function storeGetBack($data, $user_id){

    try{
    $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
   $data['user_id'] = $user_id;
   $data['type'] = 2;
    $moviment = $this->repository->create($data);

    
    

    return [
        'success'       => true,
        'messages'      => "Resgate no valor de  " . $moviment->value ." realizado no produto " . $moviment->product->name . " com sucesso.",
        'data'          => $moviment];
    }catch(Exception $e){
      
switch(get_class($e)){
    case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
    case ValitadorException::class : return ['success' => false, 'messages' => $e->getMessageBag()];
    case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
    default : return ['success' => false, 'messages' => $e->getMessage()];
}

    }

}


}

?>