<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
  protected $userRepository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function index()
  {
    $users = $this->userRepository->all();
    return view('index', compact('users'));
  }

  public function create()
  {
    return view('create');
  }

  public function store(StoreUserRequest $request)
  {
    $this->userRepository->create($request->validated());
    return redirect()->back()->withSuccess('User create successfully.');
  }

  public function edit($id)
  {
    $user = $this->userRepository->findById($id);
    return view('edit', compact('user'));
  }

  public function update(StoreUserRequest $request, $id)
  {
    $this->userRepository->update($id, $request->validated());
    return redirect()->back()->withSuccess('User update successfully.');
  }

  public function destroy($id)
  {
    $this->userRepository->delete($id);
    return redirect()->back()->withSuccess('User delete successfully.');
  }
}
