<?php

namespace App\Http\Requests\Api\V1;

use App\Domains\Payments\PaymentOrchestrator;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lines' => ['required', 'array', 'min:1'],
            'lines.*.catalog_item_id' => ['required', 'integer', 'exists:catalog_items,id'],
            'lines.*.quantity' => ['required', 'integer', 'min:1'],
            'fulfillment_type' => ['sometimes', 'string', Rule::in(['pickup', 'delivery'])],
            'payment_provider' => [
                'sometimes',
                'string',
                Rule::in([PaymentOrchestrator::PROVIDER_TZ_MOBILE_MONEY_STUB]),
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'payment_provider' => $this->input('payment_provider', PaymentOrchestrator::PROVIDER_TZ_MOBILE_MONEY_STUB),
            'fulfillment_type' => $this->input('fulfillment_type', 'pickup'),
        ]);
    }
}
