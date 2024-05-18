<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.tag_permissions.view_tags'))->only('index');
        $this->middleware('permission:'.config('global.tag_permissions.create_tag'))->only('store');
        $this->middleware('permission:'.config('global.tag_permissions.update_tag'))->only('update');
        $this->middleware('permission:'.config('global.tag_permissions.delete_tag'))->only('destroy');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'ASC')->paginate(10);
        return view('admin.article.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brandNames = Tag::all()->pluck('slug')->toArray();
        if(in_array(Parent::toSlug($request->name),  $brandNames)) {
            return redirect()->route('tag.index')->with(['error' => 'Thẻ đã tồn tại !']);
        }
        else {
            try {
                $newTagData = [
                    "name" => $request->name,
                    "slug" => Parent::toSlug($request->name),
                    "is_visible" => $request->is_visible ? true : false,
                ];

                Tag::create($newTagData);
                return redirect()->route('tag.index')->with(['msg' => 'Tạo mới thẻ thành công !']);
            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('tag.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = Tag::where('id',$id)->first();
        return view('admin.article.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tags = Tag::all()->pluck('slug')->toArray();
        $updateTag = Tag::where('id', $id)->first();
        $key = array_search($updateTag->slug, $tags);
        array_splice($tags, $key, 1);

        if(in_array(Parent::toSlug($request->name),  $tags)) {
            return redirect()->route('tag.edit', $id)->with(['error' => 'Thẻ đã tồn tại !']);
        }
        else {
            try {
                $updateTagData = [
                    "name" => $request->name,
                    "slug" => Parent::toSlug($request->name),
                ];

                if($request->is_visible == 'true') {
                    $updateTagData['is_visible'] = true;
                }
    
                if($request->is_visible == 'false') {
                    $updateTagData['is_visible'] = false;
                }

                $updateTag->update($updateTagData);

                return redirect()->route('tag.index')->with(['msg' => 'Cập nhật thẻ thành công !']);
            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index')->with(['msg' => 'Xóa thẻ thành công']);
    }
}
