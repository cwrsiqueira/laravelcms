<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loggedId = Auth::id();
        $user = User::find($loggedId);
        if ($user) 
        {
            return view('admin.profile.index', ['user'=>$user]);
        }
        return redirect()->route('admin');
    }

    public function save(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        if ($user) 
        {
            $data = $request->only(
                [
                    'name',
                    'email',
                    'password',
                    'password_confirmation'
                ]
            );
            $validator = Validator::make(
                [
                    'name' => $data['name'],
                    'email' => $data['email']
                ],
                [
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:100']
                ]
            );
            // 1. Alteração do Nome
            $user->name = $data['name'];
            // 2. Alteração do E-mail
            if ($user->email != $data['email']) 
            {
                $hasEmail = User::where('email', $data['email'])->get();
                if (count($hasEmail) == 0) 
                {
                    $user->email = $data['email'];
                }
                else
                {
                    $validator->errors()->add('email', __(
                        'validation.unique', 
                        [
                            'attribute' => 'email'
                        ]
                    ));
                } 
            }
            // 3. Alteração da Senha
            if (!empty($data['password'])) 
            {
                if (strlen($data['password']) >= 4) 
                {
                    if ($data['password'] == $data['password_confirmation']) 
                    {
                        $user->password = Hash::make($data['password']);
                    }
                    else 
                    {
                        $validator->errors()->add('password', __(
                            'validation.confirmed', 
                            [
                                'attribute' => 'password'
                            ]
                        ));
                    }
                }
                else
                {
                    $validator->errors()->add('password', __(
                        'validation.min.string', 
                        [
                            'attribute' => 'password',
                            'min' => 4
                        ]
                    ));
                }    
            }
            if (count($validator->errors()) > 0) 
            {
                return redirect()->route('profile', ['user' => $id])->withErrors($validator);
            }
            // 4. Salva as alterações
            $user->save();
            return redirect()->route('profile')->with('warning', 'Alterações salvas com sucesso!');
        }
        return redirect()->route('profile');
    }
}
