<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTransactionRequest extends FormRequest
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
            'total_price' => 'required|numeric|min:0',
            'payment_proof' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.total' => 'required|numeric|min:0',
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
            'product_id.required' => 'Product is required',
            'product_id.exists' => 'Product not found',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'quantity.min' => 'Quantity must be greater than 0',
            'total_price.required' => 'Total price is required',
            'total_price.numeric' => 'Total price must be a number',
            'total_price.min' => 'Total price must be greater than 0',
            'payment_proof.required' => 'Payment proof is required',
            'payment_proof.file' => 'Payment proof must be a file',
            'payment_proof.mimes' => 'Payment proof must be a file of type: jpeg, png, jpg, pdf',
            'payment_proof.max' => 'Payment proof must be less than 2MB',
            'items.required' => 'Items are required',
            'items.array' => 'Items must be an array',
            'items.*.product_id.required' => 'Product ID is required',
            'items.*.product_id.exists' => 'Product not found',
            'items.*.quantity.required' => 'Quantity is required',
            'items.*.quantity.integer' => 'Quantity must be an integer',
            'items.*.quantity.min' => 'Quantity must be greater than 0',
        ];
    }
}
