<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    //home view
    public function index()
    {
        $items = Item::orderBy('id', 'DESC')->paginate(4); //links()
        return view('index', compact('items'));
    }

    //create view
    public function create()
    {
        return view('create');
    }

    //create to db
    public function store()
    {
        request()->validate([
            'name' => 'required|min:2',
            'image' => 'required|mimes:png,jpg,',
            'department' => 'required|min:2',
        ], [
            'name.required' => 'အမည်ထည့်ပေးပါ',
            'name.min' => 'အနည်းဆုံးနှစ်လုံး လိုအပ်ပါတယ်',
            'image.required' => 'ပုံထည့်ပေးပါ',
            'image.min' => 'ပုံသာရွေးပေးပါ',
            'department.required' => 'အမည်ထည့်ပေးပါ',
            'department.min' => 'အနည်းဆုံးနှစ်လုံး လိုအပ်ပါတယ်',

        ]);
        if (request()->has('image')) {
            $image = request()->file('image');
            $image_name = $image->getClientOriginalName();

            $image->move(public_path('/image'), $image_name);

            $image_path = "/image/" . $image_name; // /image/vue.png
        }
        Item::create([
            'name' => request()->name,
            'image' => $image_path,
            'department' => request()->department,
        ]);
        return redirect('/')->with('success', 'Created successfully'); // insert success into session
    }

    //edit view
    public function edit($id)
    {
        $item = Item::find($id);
        return view('edit', compact('item'));
    }

    //update to db
    public function update($id)
    {

        request()->validate([
            'name' => 'required|min:2',
            'department' => 'required|min:2'
        ], [
            'name.required' => 'အမည်ထည့်ပေးပါ',
            'name.min' => 'အနည်းဆုံးနှစ်လုံး လိုအပ်ပါတယ်',
            'department.required' => 'အမည်ထည့်ပေးပါ',
            'department.min' => 'အနည်းဆုံးနှစ်လုံး လိုအပ်ပါတယ်',
        ]);

        $item = Item::where('id', $id);
        //if user select image
        if (request()->has('image')) {
            $image = request()->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path('/image'), $name);
            $image_name = '/image/' . $name;
        } else {
            $image_name = $item->first()->image;
        }

        $item->update([
            'name' => request()->name,
            'department' => request()->department,
            'image' => $image_name,
        ]);

        return redirect('/')->with('success', 'Updated Successfully');
    }

    //delete
    public function delete($id)
    {
        Item::where('id', $id)->delete();
        return redirect('/')->with('success', 'Deleted successfully');
    }
}
