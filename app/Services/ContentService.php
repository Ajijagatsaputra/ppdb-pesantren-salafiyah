<?php
namespace App\Services;

use App\Models\{
    HeroSection,
    AboutSection,
    Stat,
    Program,
    Client,
    VisiMisi,
    Keunggulan,
    Testimonial,
    Ekstrakulikuler,
    TeamMember,
    ContactInfo
};
use Illuminate\Support\Facades\Cache;

class ContentService
{
    public function getHeroData()
    {
        return Cache::remember('hero_section', 3600, function () {
            return HeroSection::where('is_active', true)->first();
        });
    }

    public function getAboutData()
    {
        return Cache::remember('about_section', 3600, function () {
            return AboutSection::where('is_active', true)->first();
        });
    }

    public function getStatsData()
    {
        return Cache::remember('stats_data', 3600, function () {
            return Stat::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    public function getProgramsData()
    {
        return Cache::remember('programs_data', 3600, function () {
            return Program::all(); // tanpa filter is_active dan order
        });
    }

    public function getClientsData()
    {
        return Cache::remember('clients_data', 3600, function () {
            return Client::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }
    public function getVisiMisiData()
    {
        return Cache::remember('visi_misi_data', now()->addHours(1), function () {
            $data = VisiMisi::active()->get();
            
            // Debug logging
            \Log::debug('VisiMisi Data Fetched', [
                'total' => $data->count(),
                'visi' => $data->where('type', 'visi')->count(),
                'misi' => $data->where('type', 'misi')->count(),
                'sample' => $data->first()
            ]);

            return $data;
        });
    }
    

    public function getKeunggulanData()
    {
        return Cache::remember('keunggulan_data', 3600, function () {
            return Keunggulan::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    public function getTestimonialsData()
    {
        return Cache::remember('testimonials_data', 3600, function () {
            return Testimonial::where('is_active', true)->get(); // tanpa orderBy('order')
        });
    }

    // public function getEkstrakulikulerData()
    // {
    //     return Cache::remember('ekstrakulikuler_data', 3600, function () {
    //         return TeamMember::where('is_active', true)->get(); // tanpa orderBy('order')
    //     });
    // }
    public function getEkstrakulikulerData()
    {
        return Cache::remember('ekstrakulikuler_data', 3600, function () {
            return Ekstrakulikuler::all(); // ambil semua data dari tabel
        });
    }


    public function getTeamData()
    {
        return Cache::remember('team_data', 3600, function () {
            return TeamMember::where('is_active', true)->get(); // tanpa orderBy('order')
        });
    }


    public function getContactData()
    {
        return Cache::remember('contact_data', 3600, function () {
            return ContactInfo::where('is_active', true)->first();
        });
    }

    public function getAllContent()
    {
        return [
            'hero' => $this->getHeroData(),
            'about' => $this->getAboutData(),
            'stats' => $this->getStatsData(),
            'programs' => $this->getProgramsData(),
            'clients' => $this->getClientsData(),
            'visi_misi' => $this->getVisiMisiData(),
            'keunggulan' => $this->getKeunggulanData(),
            'testimonials' => $this->getTestimonialsData(),
            'ekstrakulikuler' => $this->getEkstrakulikulerData(),
            'team' => $this->getTeamData(),
            'contact' => $this->getContactData(),
        ];
    }

    public function clearCache()
    {
        $cacheKeys = [
            'hero_section',
            'about_section',
            'stats_data',
            'programs_data',
            'clients_data',
            'visi_misi_data',
            'keunggulan_data',
            'testimonials_data',
            'ekstrakulikuler_data',
            'team_data',
            'contact_data',
        ];

        foreach ($cacheKeys as $key) {
            Cache::forget($key);
        }
    }
}