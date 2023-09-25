<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateProduct extends Component
{

    use WithFileUploads;
    
    public $title;
    public $category;
    public $description;
    public $price;
    public $message;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $product;

    
    
    
    protected $rules =[
        'title'=>'required|min:2',
        'category'=> 'required',
        'description'=> 'required|min:10',
        'price'=> 'required | numeric',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
    ];
    
    protected $messages =[
        'title.required' => 'Il campo del titolo è obbligatorio',
        'description.required' => 'Il campo della descrizione è obbligatorio',
        'price.required' => 'Il testo è obbligatorio',
        'title.min:2' => 'il campo richiede almeno 2 caratteri',
        'description.min:10' => 'il campo richiede almeno 10 caratteri',
        'price.numeric' => 'il campo accetta solo numeri',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine dev\' essere massimo di 1mb',
        'images.image' => 'L\'immagine dev\' essere un \' immagine',
        'images.max' => 'L\'immagine dev\' essere massimo di 1 mb',
        'category.required' => 'Il campo della categoria è obbligatorio'
    ];

    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if (in_array($key, array_keys($this->images))){
            unset ($this->images[$key]);
        }
    }
    
    
    public function store(){
        
        $this->validate();
        // $category = Category::find($this->category);

        

        $this->product = Category::find($this->category)->products()->create($this->validate());
        if(count($this->images)){
            foreach ($this->images as $image){
                // $this->product->images()->create(['path' =>$image->store('images', 'public')]);
                $newFileName = "products/{$this->product->id}";
                $newImage = $this->product->images()->create(['path' =>$image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 500, 500),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->product->user()->associate(Auth::user());
        $this->product->save();        
        
        session()->flash('message', 'Articolo inserito con successo, sarà pubblicato dopo la revisione');
        $this->cleanForm();
    }
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    
    public function cleanForm(){
        $this->title ="";
        $this->category="";
        $this->description ="";
        $this->price="";
        $this->images= [];
        $this->temporary_images = [];

    }
    
    
    
    public function render()
    {
        return view('livewire.create-product');
    }
}
