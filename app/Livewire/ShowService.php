<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowService extends Component
{
    public $services = [];

    public $categories = [];

    public $categoryCounts = [];

    public $activeCategory = 'all';

    public $modalOpen = false;

    public $selectedService = null;

    public $featuresModalOpen = false;

    public $featuresModalService = null;

    public $showToast = false;

    public $toastMessage = '';

    public $newsletterEmail = '';

    protected $categoryIcons = [
        'safari' => 'fas fa-tree',
        'wellness' => 'fas fa-spa',
        'dining' => 'fas fa-utensils',
        'adventure' => 'fas fa-hiking',
        'concierge' => 'fas fa-concierge-bell',
        'default' => 'fas fa-tag',
    ];

    protected $categoryDescriptions = [
        'safari' => 'Immersive wildlife encounters with expert guides',
        'wellness' => 'Rejuvenating treatments and holistic wellness',
        'dining' => 'Culinary excellence with local and international flavors',
        'adventure' => 'Thrilling experiences for the adventurous spirit',
        'concierge' => 'Personalized service tailored to your needs',
    ];

    public function mount()
    {
        $this->loadServices();
    }

    public function loadServices()
    {
        $query = Service::active()->orderBy('display_order')->orderBy('id');

        if ($this->activeCategory !== 'all') {
            $query->where('category', $this->activeCategory);
        }

        $this->services = $query->get();

        // Get all categories with counts
        $allCategories = Service::active()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->toArray();

        $this->categories = $allCategories;

        // Calculate category counts
        $this->categoryCounts = [];
        foreach ($allCategories as $category) {
            $this->categoryCounts[$category] = Service::active()->where('category', $category)->count();
        }
        $this->categoryCounts['all'] = Service::active()->count();
    }

    public function setCategory($category)
    {
        $this->activeCategory = $category;
        $this->loadServices();
    }

    public function quickView($serviceId)
    {
        $this->selectedService = Service::findOrFail($serviceId);
        $this->modalOpen = true;
    }

    public function showFeatures($serviceId)
    {
        $this->featuresModalService = Service::findOrFail($serviceId);
        $this->featuresModalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->selectedService = null;
    }

    public function closeFeaturesModal()
    {
        $this->featuresModalOpen = false;
        $this->featuresModalService = null;
    }

    public function bookService($serviceId)
    {
        $service = Service::findOrFail($serviceId);

        // Here you would typically:
        // 1. Save booking request to database
        // 2. Send notification email to admin
        // 3. Send confirmation email to user

        $this->toastMessage = "{$service->name} booking request sent!";
        $this->showToast = true;
        $this->modalOpen = false;

        // Auto-hide toast after 3 seconds
        $this->dispatch('hide-toast');

        // You can also dispatch an event to parent components
        $this->dispatch('service-booked', serviceId: $serviceId);
    }

    public function subscribeNewsletter()
    {
        $this->validate([
            'newsletterEmail' => 'required|email',
        ]);

        // Here you would typically save to newsletter subscribers table
        // NewsletterSubscriber::create(['email' => $this->newsletterEmail]);

        $this->toastMessage = 'Subscribed successfully!';
        $this->showToast = true;
        $this->newsletterEmail = '';

        $this->dispatch('hide-toast');
    }

    #[On('hide-toast')]
    public function hideToast()
    {
        $this->showToast = false;
    }

    public function getCategoryIcon($category)
    {
        return $this->categoryIcons[$category] ?? $this->categoryIcons['default'];
    }

    public function getCategoryDescription($category)
    {
        return $this->categoryDescriptions[$category] ?? 'Curated experiences for unforgettable moments';
    }

    public function render()
    {
        return view('livewire.service-card', [
            'categoryIcons' => $this->categoryIcons,
            'categoryDescriptions' => $this->categoryDescriptions,
            'activeCategory' => $this->activeCategory,
            'services' => $this->services,
            'categories' => $this->categories,
            'categoryCounts' => $this->categoryCounts,
            'modalOpen' => $this->modalOpen,
            'selectedService' => $this->selectedService,
            'featuresModalOpen' => $this->featuresModalOpen,
            'featuresModalService' => $this->featuresModalService,
            'showToast' => $this->showToast,
            'toastMessage' => $this->toastMessage,
            'newsletterEmail' => $this->newsletterEmail,
        ]);
    }
}
