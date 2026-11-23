<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoftwareSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class SoftwareSettingController extends Controller
{
    public function edit()
    {
        try {
            $settings = SoftwareSetting::first();
            return view('settings', compact('settings'));
        } catch (\Throwable $e) {
            Log::error('Error loading settings page: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'file'  => $e->getFile(),
                'line'  => $e->getLine(),
            ]);
            return redirect()->back()->with('error', 'Unable to load settings page. Please try again.');
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name'   => 'nullable|string|max:255',
            'software_title' => 'nullable|string|max:255',
            'about_us'       => 'nullable|string',
            'favicon_title'  => 'nullable|string|max:255',
            'copyright_text' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        $uploadedFiles = [];
        $oldFiles = [];

        try {
            $setting = SoftwareSetting::first() ?? new SoftwareSetting();
            $logoDirectory = public_path('images/logo');
            $faviconDirectory = public_path('images/icon');

            File::ensureDirectoryExists($logoDirectory);
            File::ensureDirectoryExists($faviconDirectory);

            // Preserve existing image filenames if no replacement is uploaded.
            $newLogo = $setting->logo;
            $newFavicon = $setting->favicon;

            // Upload logo.
            if ($request->hasFile('logo')) {
                $logoImage = $request->file('logo');
                $logoName = now()->format('Ymd') . '_' . Str::random(12) . '.' . strtolower($logoImage->extension());
                $logoImage->move($logoDirectory, $logoName);
                $uploadedFiles[] = $logoDirectory . DIRECTORY_SEPARATOR . $logoName;
                if ($setting->logo) {
                    $oldFiles[] = $logoDirectory . DIRECTORY_SEPARATOR . $setting->logo;
                }
                $newLogo = $logoName;
            }

            // Upload favicon.
            if ($request->hasFile('favicon')) {
                $faviconImage = $request->file('favicon');
                $faviconName = now()->format('Ymd') . '_' . Str::random(12) . '.' . strtolower($faviconImage->extension());
                $faviconImage->move($faviconDirectory, $faviconName);
                $uploadedFiles[] = $faviconDirectory . DIRECTORY_SEPARATOR . $faviconName;
                if ($setting->favicon) {
                    $oldFiles[] = $faviconDirectory . DIRECTORY_SEPARATOR . $setting->favicon;
                }
                $newFavicon = $faviconName;
            }

            // Save settings in a database transaction.
            DB::transaction(function () use ($setting, $validated, $newLogo, $newFavicon) {
                $setting->company_name = $validated['company_name'] ?? null;
                $setting->software_title = $validated['software_title'] ?? null;
                $setting->about_us = $validated['about_us'] ?? null;
                $setting->favicon_title = $validated['favicon_title'] ?? null;
                $setting->copyright_text = $validated['copyright_text'] ?? null;
                $setting->logo = $newLogo;
                $setting->favicon = $newFavicon;
                $setting->save();
            });

            // Delete replaced files only after the database save succeeds.
            foreach (array_unique($oldFiles) as $oldFile) {
                if (is_file($oldFile)) {
                    File::delete($oldFile);
                }
            }

            return redirect()->back()->with(
                'success',
                'Software settings updated successfully!'
            );
        } catch (\Throwable $e) {

            // Remove newly uploaded files if the update fails.
            foreach ($uploadedFiles as $uploadedFile) {
                if (is_file($uploadedFile)) {
                    File::delete($uploadedFile);
                }
            }

            Log::error('Error updating software settings', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->back()->with(
                'error',
                'Unable to update settings. Please try again.'
            );
        }
    }
}
