<?php
namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;

Class UserController extends Controller {
use ApiResponser;
private $request;

public function __construct(Request $request){
$this->request = $request;
}

public function index()
{
$users = Users::all();
return $this->successResponse($users);
}
public function add(Request $request ){
$rules = [
    'lastname' => 'required|max:20',
    'firstname' => 'required|max:20',
    'middlename' => 'required|max:20',
    'email' => 'required|max:20',
    'phone_num' => 'required|max:20',
    'address' => 'required|max:20',
];
$this->validate($request,$rules);
$users = Users::create($request->all());

return $this->successResponse($users,Response::HTTP_CREATED);
}

public function show($user_id)
{
$users = Users::findOrFail($user_id);
return $this->successResponse($users);

}

public function update(Request $request,$user_id)
{
$rules = [
    'lastname' => 'required|max:20',
    'firstname' => 'required|max:20',
    'middlename' => 'required|max:20',
    'email' => 'required|max:20',
    'phone_num' => 'required|max:20',
    'address' => 'required|max:20',
];
$this->validate($request, $rules);
$users = Users::findOrFail($user_id);
$users->fill($request->all());

// if no changes happen
if ($user->isClean()) {
return $this->errorResponse('At least one value must
change', Response::HTTP_UNPROCESSABLE_ENTITY);
}
$users->save();
return $this->successResponse($users);

}

public function delete($user_id)
{
$users = Users::findOrFail($user_id);
$users->delete();


return $this->successResponse($users);

}
}

