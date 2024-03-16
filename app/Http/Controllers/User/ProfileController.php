<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function show()
    {
        return view('livewire.user.auth.profile');
    }

    public function update(Request $request)
    {


      $request->validate([
          'username' => ['required', 'string', 'min:3', 'max:50'],
          'email' => ['required', 'email', 'unique:users,email,' . auth()->id()],
          'mobile' => ['required', 'unique:users,mobile,' . auth()->id()],
          ]);

      $filename = '';
        if ($request->filled('image_data')) {
            $base64Image = $request->input('image_data');

            // Check if the base64 image data is in the expected format
            if (strpos($base64Image, ';base64,') !== false) {
                list(, $base64Image) = explode(';', $base64Image);
                list(, $base64Image) = explode(',', $base64Image);

                $imageData = base64_decode($base64Image);

                // Determine the file extension based on the image type
                $extensions = [
                    'image/jpeg' => 'jpg',
                    'image/png' => 'png',
                    'image/gif' => 'gif',
                    // Add more supported image types if needed
                ];

                // Extract image type from the base64 string
                $type = finfo_buffer(finfo_open(), $imageData, FILEINFO_MIME_TYPE);
                $extension = isset($extensions[$type]) ? $extensions[$type] : 'jpg'; // Default to jpg if the type is unknown

                // Generate a unique filename for the image
                $filename = Str::random(10) . '.' . $extension;

                // Save the image file
                file_put_contents(public_path('uploads/' . $filename), $imageData);

                // Now you can use $filename to store the image path in your database or perform any other operation
            }
        }

      $data = $request->only(['username', 'mobile', 'email']);
      unset($data['image_date']);

      if($filename){
          $data['avatar'] = $filename;
      }

      if($request->input('latitude') !=null && $request->input('longitude')){
          $data['latitude'] = $request->input('latitude');
          $data['longitude'] = $request->input('longitude');
      }

      $user = User::query()->find(auth()->id());
      $user->update($data);

      return redirect()->back();
    }
}
