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
    public $genericLinks = [];

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
        foreach ($this->socialLinks as $name => $url) {
            $social = Social::where('name', $name)->first();

            if ($social) {
                if (!empty($url)) {
                    Link::updateOrCreate(
                        ['user_id' => Auth::id(), 'social_id' => $social->id],
                        ['url' => $url]
                    );
                } else {
                    Link::where('user_id', Auth::id())->where('social_id', $social->id)->delete();
                }
            }
        }

        foreach ($this->genericLinks as $position => $linkData) {
            if (!empty($linkData['url'])) {
                Link::updateOrCreate(
                    ['id' => $linkData['id']],
                    [
                        'user_id' => Auth::id(),
                        'social_id' => null,
                        'position' => $position,
                        'url' => $linkData['url']
                    ]
                );
            } else {
                if ($linkData['id']) {
                    Link::find($linkData['id'])->delete();
                }
            }
        }

        $this->show = false;
        $this->loadLinks();
    }

    protected function loadLinks()
    {
        $existingGenericLinks = Link::where('user_id', Auth::id())->whereNull('social_id')->orderBy('position')->get();
        $this->genericLinks = $existingGenericLinks->map(fn($link) => ['id' => $link->id, 'url' => $link->url])->pad(5, ['id' => null, 'url' => ''])->toArray();
    }

    public function render()
    {
        return view('livewire.links-manager', [
            'socials' => Social::all(),
            'links' => Link::with('social')->where('user_id', Auth::id())->get()
        ]);
    }
}
