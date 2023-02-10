<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit Post
        </h2>
        <p class="mb-4">Fix your post</p>
    </header>
    
    <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label
                for="username"
                class="inline-block text-lg mb-2">User Name</label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="username" value="{{$post->username}}"
            />
        </div>
    
        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2"
                >Post Title</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                placeholder="Title" value="{{$post->title}}"
            />
        </div>
    
        <div class="mb-6">
            <label
                for="location"
                class="inline-block text-lg mb-2"
                >Location</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="location"
                placeholder="Location (IP Preferred)" value="{{$post->location}}"
            />
        </div>
    
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Contact Email</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="email" value="{{$post->email}}"
            />
        </div>
    
        <div class="mb-6">
            <label
                for="website"
                class="inline-block text-lg mb-2"
            >
                Website
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="website"
                value="{{$post->website}}"
            />
        </div>
    
        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="tags"
                placeholder="Add tags pls" value="{{$post->tags}}"
            />
        </div>
    
        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Post Image
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="logo"
            />
            <img
            class="w-48 mr-6 mb-6"
            src="{{$post->logo ? asset('storage/' . $post->logo) : asset('images/no-logo.png')}}"
            alt=""
        />
        </div>
    
        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Post body
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="Dump brain here" 
            >{{$post->description}}</textarea>
        </div>
    
        <div class="mb-6">
            <button
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Update Post
            </button>
    
            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
    </x-card>
    </x-layout>