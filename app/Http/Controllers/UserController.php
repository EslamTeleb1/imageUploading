<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class UserController extends Controller
{

    public function showForm()
    {
        return view('user.form');
    }
    public function submitForm(Request $request)
    {
        try{
                $request->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'image' => 'required|image|max:2048', // Max size 2MB
                ]);

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);

                User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'image_path' => 'images/' . $imageName,
                ]);

                return redirect()->route('user.form')->with('success', 'Form submitted successfully.');

        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong. Please try again.'.$e);
        }

    }
}
