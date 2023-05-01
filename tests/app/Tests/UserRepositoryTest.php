<?php

namespace DTApi\Tests;

use DTApi\Repository\UserRepository;
use Exception;

class UserRepositoryTest
{

    private $userRepository_;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository_ = $userRepository;
    }

    public function createOrUpdate_Pass()
    {
        $data = [
            "name" => "name", 
            "role" => "role", 
            "company_id" => "name", 
            "department_id" => "department_id", 
            "dob_or_orgid" => "dob_or_orgid", 
            "email" => "email", 
            "phone" => "phone", 
            "mobile" => "mobile",
            "password" => "password",
            "consumer_type" => "consumer_type",
            "customer_type" => "customer_type",
            "post_code" => "post_code",
            "username" => "username",
            "address" => "address",
            "city" => "city",
            "town" => "town",
            "country" => "country",
        ];
        $model = $this->userRepository_->createOrUpdate(null, $data);
        if(!$model){
            $this->assert(false);
        }
        $this->assert(true);

    }

    public function createOrUpdate_Fail()
    {
        try {
            $request = [

            ];// no data given to produce error
            $model = $this->userRepository_->createOrUpdate(null, $request);
            if(!$model){
                $this->assert(true);
            }
            $this->assert(false);
        } catch (Exception $ex) {
            $this->assert(true);
        }
    }
    
    
}