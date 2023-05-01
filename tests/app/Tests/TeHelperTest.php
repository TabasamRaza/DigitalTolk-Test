<?php

namespace DTApi\Tests;

use DTApi\Helpers\TeHelper;
use Exception;

class TeHelperTest
{

    private $teHelperClass_;

    function __construct(TeHelper $teHelperClass)
    {
        $this->teHelperClass_ = $teHelperClass;
    }

    public function willExpireAt_Pass()
    {
        try {
            $expireAt = Carbon::parse("2023-02-11 07:27:03");
            $createdAt = Carbon::parse("2023-02-15 01:27:03");
            
            $response = $this->teHelperClass_->willExpireAt($expireAt, $createdAt);

            if($response->eq($expireAt)){
                $this->assert(true);
            }
            $this->assert(false);
        } catch (Exception $ex) {
            $this->assert(false);
        }
    }   
    
    public function willExpireAt_Fail()
    {
        try {
            $expireAt = Carbon::parse("2023-02-14 04:27:03");
            $createdAt = "No date"; // to produce an error
            
            $response = $this->teHelperClass_->willExpireAt($expireAt, $createdAt);
            $this->assert(false);
        } catch (Exception $ex) {
            $this->assert(false);
        }
    }   
}