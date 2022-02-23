<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    /**
     * @OA\Property(
     *      property = "message",
     *      title="name",
     *      description="id del mensaje",
     *      example="1"
     * )
     *
     * @var integer
     */



    /**
     * @OA\Property(
     *      property = "reportComent",
     *      title="Comentario",
     *      description="descripcdion de la denuncia",
     *      example="5.25"
     * )
     *
     * @var string
     */


    public function rules()
    {
        return [
            'message' => 'required|numeric|exists:messages,id',
            'reportComent' =>'min:5|max:150'
        ];
    }
}
