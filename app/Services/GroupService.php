<?php

nameSpace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;

class GroupService{

    private $repository;
    private $validator;

public function __construct(GroupValidator $validator, GroupRepository $repository){

    $this->validator = $validator;
    $this->repository = $repository;

}

public function store($data){

    try{
    $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

    $group = $this->repository->create($data);
    return [
        'success'       => true,
        'messages'      => "Grupo cadastrado.",
        'data'          => $group];
    }catch(Exception $e){
      
switch(get_class($e)){
    case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
    case ValitadorException::class : return ['success' => false, 'messages' => $e->getMessageBag()];
    case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
    default : return ['success' => false, 'messages' => $e->getMessage()];
}

    }

}
public function update($data, $id){

    try{
    $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

    $group = $this->repository->update($data, $id);
    return [
        'success'       => true,
        'messages'      => "Grupo atualizado.",
        'data'          => $group];
    }catch(Exception $e){
      
switch(get_class($e)){
    case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
    case ValitadorException::class : return ['success' => false, 'messages' => $e->getMessageBag()];
    case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
    default : return ['success' => false, 'messages' => $e->getMessage()];
}

    }

}
public function userStore($group_id, $data){
    try{

        $group = $this->repository->find($group_id);
        $user_id = $data['user_id'];

        $group->users()->attach($user_id);
        
        return [
            'success'       => true,
            'messages'      => "Usuário adicionado ao grupo.",
            'data'          => null];
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