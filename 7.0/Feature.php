<?php
declare(strict_types=1);
ini_set('assert.exception', '1');

define("ANIMALS",['dog','cat','bird']);

/**
 * Created by PhpStorm.
 * Date: 3/6/18
 * Time: 11:23 PM
 */
class Feature
{



    /**
     * @param int[] ...$ints
     * @return float|int
     */
    public function sumOfInts(int ...$ints)
    {
        return array_sum($ints);
    }


    /**
     * @param array[] ...$arrays
     * @return array
     */
    public function arraysSum(array ...$arrays): array
    {
        return array_map(function($array): int{
            return array_sum($array);
        }, $arrays);
    }

}


$features = new Feature();
$result   = $features->sumOfInts(2,3,4);
var_dump($result);

print_r($features->arraysSum([1,2,3], [4,5,6], [7,8,9]));

$username = $_GET['user'] ?? 'nobody';

var_dump($username);

var_dump(1 <=> 1);
echo ANIMALS[1]."\n\n\n\n";


// anonymous class
interface Logger{

    public function log(string $msg);
}

class Application{

    private $logger;

    public function getLogger(): Logger
    {
        return $this->logger;
    }

    public function setLogger(Logger $logger){
        $this->logger = $logger;
    }
}

$app = new Application();
$app->setLogger(new class implements Logger{
   public function log(string $msg)
   {
       echo $msg;
   }
});

var_dump($app->getLogger());

// closure call
class A{
    private $x=1;
}

$getX = function(){ return $this->x; };
echo $getX->call(new A());
echo "\n\n";
// assert exception
class CustomError extends AssertionError {}

assert(false, new CustomError('Some error message'));
