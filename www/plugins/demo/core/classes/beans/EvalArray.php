<?php


namespace Demo\Core\Classes\Beans;

use Illuminate\Support\Arr;

class EvalArray
{
    protected $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    /**
     * @return []
     */
    public function eval($context = [])
    {
        $result = [];
        if (Arr::isAssoc($this->array)) {
            foreach ($this->array as $key => $value) {
                $result[$key] = $this->evalItem($value, $context);
            }
        } else {
            $i = 0;
            foreach ($this->array as $value) {
                $result[$i++] = $this->evalItem($value, $context);
            }
        }
    }

    public function evalItem($value, $context)
    {
        $templateEngine = new TemplateEngine();
        return $templateEngine->execute($value, $context);
    }
}
