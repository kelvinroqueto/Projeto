<?php

namespace App\Services;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use Prettus\Validator\Contracts\ValidatorInterface;



class ProductService{
   private  $repository;
    private $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator ) {
        //quem vai gerenciar o User em aspecto de banco de dados e o repository
        
    $this->repository = $repository;
    $this->validator = $validator;
    
    }
    public function store($data){
        try{
            //pegando array de dados que foi passada por parameto data, se for verdadeira faz insercao do usuario 
               $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
               
            $product = $this->repository->create($data);
            
            return [
    'success' => true,
'messages' => "Produto cadastrado.",
                    'data' => $product];
        } catch(Exception $e){
      
            switch(get_class($e)){
                case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
                case ValitadorException::class : return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
                default : return ['success' => false, 'messages' => $e->getMessage()];
            }
            
                }
        
    }
    public function destroy($product_id){
        try{
            //pegando array de dados que foi passada por parameto data, se for verdadeira faz insercao do usuario 
           
            $request = $this->repository->delete($product_id);
            
            return [
    'success' => true,
'messages' => "Produto removido.",
                    'data' =>null];
        } catch (Exception $ex) {

                       
       $ex->getMessage();
        } 
    }
}