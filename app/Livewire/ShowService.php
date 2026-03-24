<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class ShowService extends Component
{
    use WithPagination;
    
    public $rooms = [];
    public $categories = [];
    public $categoryCounts = [];
    public $activeCategory = 'all';
    public $activeType = 'all';
    public $modalOpen = false;
    public $selectedRoom = null;
    public $amenitiesModalOpen = false;
    public $amenitiesModalRoom = null;
    public $showToast = false;
    public $toastMessage = '';
    public $favorites = [];
    public $sortBy = 'default';
    public $searchQuery = '';
    public $perPage = 6;
    
    protected $queryString = [
        'activeCategory' => ['except' => 'all'],
        'sortBy' => ['except' => 'default'],
        'searchQuery' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    
    protected $categoryIcons = [
        'Presidential' => 'fas fa-crown',
        'Safari' => 'fas fa-tree',
        'Garden' => 'fas fa-leaf',
        'Executive' => 'fas fa-briefcase',
        'default' => 'fas fa-bed'
    ];
    
    protected $categoryDescriptions = [
        'Presidential' => 'Ultimate luxury with private amenities and panoramic views',
        'Safari' => 'Wildlife-facing suites with authentic African design',
        'Garden' => 'Secluded sanctuaries surrounded by lush gardens',
        'Executive' => 'Sophisticated spaces for business and leisure travelers'
    ];
    
    public function mount()
    {
        $this->loadFavorites();
    }
    
    public function loadFavorites()
    {
        $this->favorites = json_decode(request()->cookie('favorite_rooms', '[]'), true);
    }
    
    public function getRoomsProperty()
    {
        $query = Room::active()->orderBy('display_order')->orderBy('id');
        
        // Apply category filter
        if ($this->activeCategory !== 'all') {
            $query->where('category', $this->activeCategory);
        }
        
        // Apply type filter
        if ($this->activeType !== 'all') {
            $query->where('type', $this->activeType);
        }
        
        // Apply search filter
        if (!empty($this->searchQuery)) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('description', 'like', '%' . $this->searchQuery . '%')
                  ->orWhere('category', 'like', '%' . $this->searchQuery . '%');
            });
        }
        
        // Apply sorting
        switch ($this->sortBy) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'rating_desc':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->orderBy('display_order')->orderBy('id');
        }
        
        return $query->paginate($this->perPage);
    }
    
    public function getCategoriesListProperty()
    {
        $allCategories = Room::active()
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category')
            ->toArray();
        
        $categories = [];
        $counts = [];
        
        foreach ($allCategories as $category) {
            $counts[$category] = Room::active()->where('category', $category)->count();
        }
        $counts['all'] = Room::active()->count();
        
        return [
            'list' => $allCategories,
            'counts' => $counts
        ];
    }
    
    public function setCategory($category)
    {
        $this->activeCategory = $category;
        $this->resetPage();
    }
    
    public function setType($type)
    {
        $this->activeType = $type;
        $this->resetPage();
    }
    
    public function setSortBy($sort)
    {
        $this->sortBy = $sort;
        $this->resetPage();
    }
    
    public function updatedSearchQuery()
    {
        $this->resetPage();
    }
    
    public function quickView($roomId)
    {
        $this->selectedRoom = Room::findOrFail($roomId);
        $this->modalOpen = true;
    }
    
    public function showAmenities($roomId)
    {
        $this->amenitiesModalRoom = Room::findOrFail($roomId);
        $this->amenitiesModalOpen = true;
    }
    
    public function closeModal()
    {
        $this->modalOpen = false;
        $this->selectedRoom = null;
    }
    
    public function closeAmenitiesModal()
    {
        $this->amenitiesModalOpen = false;
        $this->amenitiesModalRoom = null;
    }
    
    public function toggleFavorite($roomId)
    {
        if (in_array($roomId, $this->favorites)) {
            $this->favorites = array_diff($this->favorites, [$roomId]);
            $this->toastMessage = 'Removed from favorites';
        } else {
            $this->favorites[] = $roomId;
            $this->toastMessage = 'Added to favorites';
        }
        
        // Save to cookie (30 days)
        cookie()->queue('favorite_rooms', json_encode($this->favorites), 43200);
        $this->showToast = true;
        
        // Auto-hide toast
        $this->dispatch('hide-toast');
    }
    
    public function bookRoom($roomId)
    {
        $room = Room::findOrFail($roomId);
        
        // Store booking data in session or redirect
        session()->flash('booking_room', $roomId);
        
        $this->toastMessage = "{$room->name} booking initiated!";
        $this->showToast = true;
        $this->modalOpen = false;
        
        $this->dispatch('hide-toast');
        
        // Redirect to booking page
        // return redirect()->route('booking.create', ['room' => $roomId]);
    }
    
    public function resetFilters()
    {
        $this->activeCategory = 'all';
        $this->activeType = 'all';
        $this->searchQuery = '';
        $this->sortBy = 'default';
        $this->resetPage();
    }
    
    public function getCategoryIcon($category)
    {
        return $this->categoryIcons[$category] ?? $this->categoryIcons['default'];
    }
    
    public function getCategoryDescription($category)
    {
        return $this->categoryDescriptions[$category] ?? 'Luxurious accommodations for discerning travelers';
    }
    
    public function render()
    {
        return view('livewire.room-card', [
            'rooms' => $this->rooms,
            'categoriesList' => $this->categories_list,
            'categoryIcons' => $this->categoryIcons,
            'categoryDescriptions' => $this->categoryDescriptions,
            'favorites' => $this->favorites,
            'activeCategory' => $this->activeCategory,
            'activeType' => $this->activeType,
            'sortBy' => $this->sortBy,
            'searchQuery' => $this->searchQuery,
        ]);
    }
}