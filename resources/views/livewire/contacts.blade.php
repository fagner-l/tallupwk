

    <div class="py-12" x-data="{ isOpen: @entangle('isOpen'), shown: @entangle('on') }">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <!-- Example of Alpinejs calling a livewire method - Fagner -->
        <button @click="$wire.call('clear'); isOpen = true;" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
          Add Contact
        </button>
      </div>
            <div class="bg-white shadow-xl sm:rounded-lg">
            
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                <div class="-my-2 sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only"></span>
                            </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($allContacts as $contact)
                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                    {{ $contact->name }}
                                    </div>
                                    
                                </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $contact->email }}</div>
                                
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $contact->address }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-center">
                                <div x-data="{ dropdownOpen: false }" class="relative z-5">
                                <button @click="dropdownOpen = !dropdownOpen" class="relative z-5 block rounded-md bg-white p-2 focus:outline-none">
                                    <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                    <a href="#" wire:click="editModal({{ $contact->id }})" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                    Edit
                                    </a>
                                    <a href="#" wire:click="deleteContact({{ $contact->id }})" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                    Delete
                                    </a>
                                </div>
                                </div>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>

            </div>
        </div>

        <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Contact
        </x-slot>

        <x-slot name="content">
        <form wire:submit.prevent="submit" x-ref="modalform">
        <input wire:model="cid" type="hidden" />
          <div class="flex-grow">
            <div class="flex flex-col">
              <div class="flex items-center mb-4">
                <label for="name" class="w-24 font-semibold text-gray-700">Name</label>
                <input wire:model="name" type="text" class="flex-grow border border-red-200 rounded py-1 px-3" />
              </div>
              @error('name') <p class="flex flex-row bg-red-200 p-2 mt-1 rounded border-b-2 border-red-300">{{ $message }}</p> @enderror
              <div class="flex items-center mb-4">
                <label for="email" class="w-24 font-semibold text-gray-700">Email</label>
                <input wire:model="email" type="email" class="flex-grow border border-red-200 rounded py-1 px-3" />
              </div>
              @error('email') <p class="flex flex-row bg-red-200 p-2 mt-1 rounded border-b-2 border-red-300">{{ $message }}</p> @enderror
              <div class="flex items-center mb-4">
                <label for="address" class="w-24 font-semibold text-gray-700">Address</label>
                <input wire:model="address" type="text" class="flex-grow border border-red-200 rounded py-1 px-3" />
              </div>
              @error('address') <p class="flex flex-row bg-red-200 p-2 mt-1 rounded border-b-2 border-red-300">{{ $message }}</p> @enderror
            </div>
          </div>
        </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="submit" wire:loading.attr="disabled">
                Save
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Based on Livewire's Event Listener - Fagner -->
  <div x-data="{ shown: false, timeout: null }" 
    x-init="@this.on('success', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
    x-show.transition.opacity.out.duration.1500ms="shown"
    style="display: none;"
    class="absolute right-0 top-0 m-5 jusctify-center">

<!-- Toast Notification Success-->
<div class="flex items-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
   <!-- icons -->
  <div class="text-green-500 rounded-full bg-white mr-3">
    <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
    </svg>
  </div>
  <!-- message -->
  <div class="text-white max-w-xs ">
    Success.
  </div>
</div>
</div>

    </div>

