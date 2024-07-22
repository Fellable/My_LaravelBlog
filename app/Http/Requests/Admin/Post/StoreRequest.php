<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:posts,title',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'technology' => 'nullable|string',
            'additional_tech' => 'nullable | string',
            'gitHub' => 'nullable | string',
            'queuery' => 'nullable | integer',
            'category_id' => 'required| integer |exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable | integer| exists:tags,id',
            'post_images' => 'nullable | array',
            'post_titles' => 'nullable | array',
            'post_descriptions' => 'nullable | array',
            'small_description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения.',
            'title.string' => 'Данные должны соответствовать строчному типу.',
            'title.unique' => 'Пост с таким Title уже имеется. Это уникальное значение.',
            'content.required' => 'Это поле необходимо для заполнения.',
            'content.string' => 'Данные должны соответствовать строчному типу.',
            'preview_image.required' => 'Это поле необходимо для заполнения.',
            'preview_image.file' => 'Необходимо выбрать файл.',
            'main_image.required' => 'Это поле необходимо для заполнения.',
            'main_image.file' => 'Необходимо выбрать файл.',
            'technology.string' => 'Данные должны соответствовать строчному типу.',
            'additional_tech.string' => 'Данные должны соответствовать строчному типу.',
            'gitHub.string' => 'Данные должны соответствовать строчному типу.',
            'queuery.integer' => 'Данные должны быть числом',
            'category_id.required' => 'Это поле необходимо для заполнения.',
            'category_id.integer' => 'ID категории должен быть числом.',
            'category_id.exists' => 'ID категории должен быть в базе данных.',
            'tag_ids.array' => 'Необходимо отправить массив данных.',
            'post_images.array' => 'Фигня какая-то приключилась',
            'post_descriptions.array' => 'Фигня с post_descriptions',
            'small_description.required' => 'Это поле необходимо для заполнения',
            'small_description.string' => 'Это должна быть строка'
        ];
    }


    public function passedValidation()
    {
        return $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}

