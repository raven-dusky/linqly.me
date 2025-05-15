<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Social;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class LinksManager extends Component
{
    public $show = false;
    public $socialLinks = [];

    public function mount()
    {
        $this->loadLinks();
    }

    public function showInputs()
    {
        $this->loadLinks();
        $this->show = true;
    }

    public function saveInputs()
    {
        foreach ($this->socialLinks as $social_id => $url) {
            $social = Social::find($social_id);

            if ($social) {
                if (!empty($url)) {
                    Link::updateOrCreate(
                        ['user_id' => Auth::id(), 'social_id' => $social->id],
                        ['url' => $url]
                    );
                } else {
                    Link::where('user_id', Auth::id())
                        ->where('social_id', $social->id)
                        ->delete();
                }
            }
        }

        $this->show = false;
        $this->loadLinks();
    }

    protected function loadLinks()
    {
        $userLinks = Auth::user()->links()->get()->keyBy('social_id');

        $this->socialLinks = Social::all()->mapWithKeys(function ($social) use ($userLinks) {
            return [$social->id => $userLinks->has($social->id) ? $userLinks[$social->id]->url : ''];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.links-manager', [
            'socials' => Social::all(),
            'links' => Link::with('social')->where('user_id', Auth::id())->get()
        ]);
    }
}
