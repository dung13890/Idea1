<?php

namespace App\Http\Requests;

use App\Http\Requests\AbstractRequest;

class ExcelUploadRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'excel_upload' => 'required|max:32000|mimes:xlsx,xls,csv,tsv',
        ];
    }
}
