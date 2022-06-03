<?php

namespace Modules\Booking\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class HotelRoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'hotel_id' => 'required',
            'name' => 'required',
            'cost' => 'required|numeric',
            'quantity_places' => 'required|numeric',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
