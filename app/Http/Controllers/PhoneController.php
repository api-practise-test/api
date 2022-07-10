<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    public function getPhones(): Collection
    {
        return Phone::with('brand')->get();
    }

    public function postPhone(Request $request)
    {
//        $newPhone = new Phone();
//        $newPhone->phone = $request->phone;
//        $newPhone->description = $request->description;
//        $newPhone->price = $request->price;
//        $newPhone->brand_id = $request->brand_id;
//        $newPhone->image = 'uyen';
//        $newPhone->save();

//        $request->validate([
//            'phone' => 'required|max:255',
//            'description' => 'required',
//            'price' => 'required|number',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
        $file = $request->file('image');
        $name = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('images');
        $file->move($destinationPath, $name);

        $newPhone = new Phone();
        $newPhone->phone = $request->phone;
        $newPhone->description = $request->description;
        $newPhone->price = $request->price;
        $newPhone->brand_id = $request->brand_id;
        $newPhone->image = $name;
        $newPhone->save();

//        return response()->json(['message' => 'Phone creates successfully!!']);
    }

    public function deletePhone($id)
    {

    }

    public function getPhonesByKeyword(Request $request)
    {
        $keyword = $request->keyword ?? "iPhone";
        return Phone::with('brand')
            ->where('phone', 'like', "%$keyword%")
            ->get();
    }
}
