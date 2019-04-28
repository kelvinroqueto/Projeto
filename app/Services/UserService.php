<?php

namespace App\Services;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
        use Exception;


class UserService{
   private  $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator ) {
        //quem vai gerenciar o User em aspecto de banco de dados e o repository
        
    $this->repository = $repository;
    $this->validator = $validator;
    
    }
    public function store($data){
        try{
            //pegando array de dados que foi passada por parameto data, se for verdadeira faz insercao do usuario 
               $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
               
            $usuario = $this->repository->create($data);
            
            return [
    'success' => true,
'messages' => "Usuário cadastrado.",
                    'data' => $usuario];
        } catch (Exception $ex) {

                       
       $ex->getMessage();
        }
        
    }
    public function update(){
        
    }
    public function delete(){
        
    }
}

?>