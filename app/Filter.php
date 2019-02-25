<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{

    protected $data;
    protected $request;

    public function __construct($data, $request)
    {
        $this->data = $data;
        $this->request = $request;
    }

    public function apply()
    {
        foreach ($this->filters() as $filter => $value)
        {
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->data;
    }

    public function fio($value)
    {
       return $this->data->where('fio','like',"%".$value."%");
    }

    public function users($value)
    {
       return $this->data->where('name','like',"%$value%");
    }

    public function role_id($value)
    {
       return $this->data->where('role_id','like',"%$value%");
    }


    public function filters()
    {
        return $this->request->all();
    }
}
