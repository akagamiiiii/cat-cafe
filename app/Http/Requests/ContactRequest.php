<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        //バリデーションルールの設定
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string', 'max:2000'],
        ];
    }

    public function attributes()
    {
        //サイト全体(言語ファイル)では、body -> 本文
        //お問い合わせだけ(フォームリクエスト) body -> お問い合わせ内容
        return [
            "body" => "お問い合わせ内容"
        ];
    }

    public function messages()
    {
        return [
            //キーを"属性名.ルール名"にする事で、特定の項目の特定のルールに対するメッセージを個別に設定
            "phone.regex" => ":attributeを正しく入力してください。"
        ];
    }
}
