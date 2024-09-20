<?php
namespace App\Service;


use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }


            /**
             * Если есть картинки для слайдера
             */
            if (isset($data['post_images'])) {
                $postImages = $data['post_images'];
                unset($data['post_images']);
            }

            if (isset($data['post_titles'])) {
                $postTitles = $data['post_titles'];
                unset($data['post_titles']);
            }


            if (isset($data['post_descriptions'])) {
                $postDescriptions = $data['post_descriptions'];
                unset($data['post_descriptions']);
            }


            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);


            $post = Post::firstOrCreate(['title' => $data['title'],

                    'slug' => $data['slug'],
                    'content' => $data['content'],
                    'additional_tech' => $data['additional_tech'],
                    'small_description' => $data['small_description'],
                    'preview_image' => $data['preview_image'],
                    'main_image' => $data['main_image'],
                    'category_id' => $data['category_id'],
                    'technology' => $data['technology'],
                    'gitHub' => $data['gitHub'],
                    'queuery' => $data['queuery']
                ]
            );
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }


            if (isset($postImages)) {
                foreach ($postImages as $key => $postImage) {
                    $filePath = Storage::disk('public')->put('/images', $postImage);
                    PostImage::create([
                        'post_id' => $post->id,
                        'title' => $postTitles[$key],
                        'description' => $postDescriptions[$key],
                        'file_Path' => $filePath,
                    ]);
                }
            }


            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
            abort(404);
        }
    }


    public function update($data, $post)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (array_key_exists('preview_image', $data)) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if (array_key_exists('main_image', $data)) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);
            if (isset ($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}

