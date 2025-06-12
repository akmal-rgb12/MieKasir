<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|string|in:pending,completed,cancelled',
            'payment_proof' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'status.required' => 'Status is required',
            'status.string' => 'Status must be a string',
            'status.in' => 'Status must be either pending, success, or failed',
            'payment_proof.required' => 'Payment proof is required',
            'payment_proof.file' => 'Payment proof must be a file',
            'payment_proof.mimes' => 'Payment proof must be a file of type: jpeg, png, jpg, pdf',
            'payment_proof.max' => 'Payment proof must be less than 2MB',
        ];
    }
}
