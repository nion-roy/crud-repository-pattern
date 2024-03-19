<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {

    return [
      'name' => 'required|string|max:255',
      'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
      'password' => 'required|min:8',
      'image*' => 'required|image|mimes:jpeg,jpg,png|max:40000',
    ];


    // $rules = [
    //   'name' => 'required|string|max:255',
    //   'password' => 'required|min:8',
    // ];

    // if ($this->getMethod() == 'POST') {
    //   $rules['email'] = 'required|email|unique:users';
    // }

    // if ($this->getMethod() == 'PUT') {
    //   $rules['email'] = ['required', 'email', Rule::unique('users')->ignore($this->user)];
    // }

    // return $rules;
  }
}
