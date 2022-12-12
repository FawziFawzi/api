<?php
namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


trait ExceptionTrait{

    public function apiException($request,$e)
    {
        // dd('swefd');

        if($this->isModel($e)){
            return $this->modelResponce($e);
        }

        if($this->isHttp($e)){
          return $this->httpResponce($e);
        }

        return parent::render($request, $e);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }
    protected function modelResponce($e)
    {
        return response()->json(
            ["errors" => "Product model not found"]
            ,Response::HTTP_NOT_FOUND);
    }


    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }
    protected function httpResponce($e)
    {
        return response()->json(
            ["errors" => "incorrect link"]
            ,Response::HTTP_NOT_FOUND);
    }

}
