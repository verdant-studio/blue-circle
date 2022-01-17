<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    public $bol_com_api_key;

    public $google_analytics_id;

    public $siteDescription;

    protected function rules()
    {
        return [
            'bol_com_api_key' => 'nullable|string',
            'siteDescription' => 'required|max:160',
            'google_analytics_id' => 'nullable|string',
        ];
    }

    public function mount()
    {
        $data = Setting::first();

        $this->bol_com_api_key = $data->bol_com_api_key ?? null;
        $this->google_analytics_id = $data->google_analytics_id ?? null;
        $this->siteDescription = $data->siteDescription ?? null;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->authorize('settings update');

        $validatedData = $this->validate();

        $user = Setting::updateOrCreate(
            ['id' => 1],
        );

        $user->bol_com_api_key = $validatedData['bol_com_api_key'];
        $user->google_analytics_id = $validatedData['google_analytics_id'];
        $user->siteDescription = $validatedData['siteDescription'];
        $user->save();

        return redirect()->route('admin.settings.show')->with(['success' => __('settings.message.success-settings-updated')]);
    }

    public function render()
    {
        $this->authorize('settings read');

        $settings = Setting::first();

        return view('livewire.admin.settings.show', compact('settings'));
    }
}
