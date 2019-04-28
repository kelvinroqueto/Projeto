<?php
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;

nameSpace App\Services;

class InstituitionService{

    private $repository;
    private $validator;

    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator){
 $this->validator = $validator;
 $this->repository = $repository;
    }

    public function store($data){
        try{
            //pegando array de dados que foi passada por parameto data, se for verdadeira faz insercao da instituição 
               $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
               
            $instituition = $this->repository->create($data);
            
            return [
    'success' => true,
'messages' => "Instituição cadastrada.",
                    'data' => $instituition];
        } catch (Exception $ex) {

                       
       $ex->getMessage();
        }

    }
}