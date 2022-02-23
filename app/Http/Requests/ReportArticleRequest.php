<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    /**
     * @OA\Property(
     *      property = "article",
     *      title="name",
     *      description="id del producto",
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
            'article' => 'required|numeric|exists:articles,id',
            'reportComent' =>'nullable|min:5|max:150'
        ];
    }
}
