<?php

namespace App\Http\Controllers;

use App\Http\Resources\MinifiedIntlResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiBaseController extends BaseController
{
//    use RequestValidationJsonResponse;
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendResponse($result, $code = 200)
    {
        return response()->json(["data" => $result,"status" => $code]);
    }

    public function sendErrorMessage($errors , $errorMessage='The given data was invalid', $code = 422)
    {
        return response()->json(["message" => $errorMessage, "errors" => $errors], $code);
    }

    public function sendRequiredPermissionMessage($errorMessage, $code = 400)
    {
        return response()->json(["message" => "$errorMessage" ,"errors" => 'failed'], $code);
    }

    // public function sendError($errors, $code = 400)
    // {
    //     $errorMessage = "";
    //     foreach ($errors as $key=>$error) {
    //         $errorMessage = $errors[$key][0];
    //         break;
    //     }
    //     return response()->json(["message" => "failed", "errors" => $errorMessage], $code);
    // }

    public function sendSuccessMessage($message = "Success")
    {
        return response()->json(['message'=>$message]);
    }

    public function getImage($name)
    {
        $imagePath = base_path('uploads/images/'.$name);
        return response()->file($imagePath);
    }

    public function paginate($resource,Request $request,Builder $query,$num_per_page = 10)
    {
        if($request->paginate == 'false')
        {
            return $resource->collection($query->get());
        }
        else
        {
             "here";
             return $collection = $query->paginate($num_per_page);
            $collection->appends($request->all());
            return $collection;
        }
    }

    function generateRandomString($length = 10)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function generateRandomNumber($length = 10)
    {
        $characters       = '0123456789';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    protected function respondWithToken($token , $user )
    {
        return response()->json([

            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user'=>$user,
        ]);
    }


}
