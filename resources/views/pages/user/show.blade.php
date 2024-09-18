<x-app-layout>
    <div class="py-12">
        <div class="flex items-center justify-center w-full px-6 py-12">
            <div class="flex flex-col justify-between w-full h-64 px-4 py-5 mb-6 bg-white border border-gray-400 rounded-lg dark:bg-gray-800 md:w-1/2 lg:w-1/4"">
                <div>
                    <h4 tabindex="0" class="mb-3 font-bold text-gray-800 focus:outline-none dark:text-gray-100">{{ $user->name }}</h4>
                    <p tabindex="0" class="text-xs font-bold text-gray-800 focus:outline-none dark:text-gray-100">E-mail</p>
                    <p tabindex="0" class="text-sm text-gray-800 focus:outline-none dark:text-gray-100">{{ $user->email }}</p>
                </div>
                <div> 
                    <div class="flex items-center justify-between text-gray-800">
                        <p tabindex="0" class="text-sm focus:outline-none dark:text-gray-100">{{ $user->created_at->diffForHumans() }}</p>
                        <div class="flex items-center justify-center w-8 h-8 text-white bg-gray-800 rounded-full">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/single_card_with_title_and_description-svg1.svg" alt="icon"/>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>