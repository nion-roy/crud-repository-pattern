<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
  public function all()
  {
    return User::latest('id')->get();
  }

  public function findById(int $id)
  {
    return User::find($id);
  }

  public function create(array $data)
  {
    return User::createUser($data);
  }

  public function update(int $id, array $data)
  {
    return User::updateUser($id, $data);
  }

  public function delete(int $id)
  {
    return User::userDelete($id);
  }
}
