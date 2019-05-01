<?php
nameSpace App\Services;
use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;
use Prettus\Validator\Contracts\ValidatorInterface;



class InstitutionService{

    private $repository;
    private $validator;

    public function __construct(InstitutionRepository $repository, InstitutionValidator $validator){
 $this->validator = $validator;
 $this->repository = $repository;
    }

    public function store($data){
        try{
            //pegando array de dados que foi passada por parameto data, se for verdadeira faz insercao da instituição 
               $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
               
            $Institution = $this->repository->create($data);
            
            return [
                 'success' => true,
                'messages' => "Instituição cadastrada.",
                'data'     => $Institution];
        } catch(Exception $e){
      
            switch(get_class($e)){
                case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
                case ValitadorException::class : return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class : return ['success' => false, 'messages' => $e->getMessage()];
                default : return ['success' => false, 'messages' => $e->getMessage()];
            }
            
                }

    }
}