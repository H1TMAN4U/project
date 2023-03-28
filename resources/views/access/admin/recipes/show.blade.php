@extends('access.master')
@section('content')
    {{-- <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pb-8 break-all" style="width: 100%; height:100vh;">
        <div class="grid grid-cols-2 flex w-full rounded-t-lg dark:bg-gray-800" style="height:55vh">
            <div class="m-8">
                @foreach ($recipes as $value)
                    <img class="flex justify-center	w-full rounded-lg" src="{{ asset('images/' . $value->img) }}" alt=""
                    style="height: 500px;">
                @endforeach
            </div>
            <div class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 m-8 pr-4 w-full break-normal">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Solid foundation for any project</h3>
                    <p class="my-4 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto explicabo, recusandae maxime totam commodi sapiente veniam in consequuntur dolorum voluptatem beatae animi inventore ut repellat accusantium quibusdam perferendis? Commodi odio beatae sed, quasi obcaecati natus nisi officiis assumenda explicabo fugiat nesciunt accusantium veniam officia dicta ad, possimus facere ut doloremque!</p>
                </div>
                <div class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 m-8 ">
                    <p class="my-4 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad vitae est reprehenderit sint, natus harum perspiciatis laudantium officia consequuntur molestiae omnis, cum sed, quo quas nesciunt et eum. Recusandae explicabo ex hic vero qui repellat iste doloribus, possimus sed voluptatum voluptates odit repudiandae iusto quibusdam, id voluptas dolor eius rerum labore quasi. Vero nemo voluptates molestiae quae exercitationem cum architecto?</p>
                </div>
                <div class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 m-8 ">
                    <p class="my-4 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad vitae est reprehenderit sint, natus harum perspiciatis laudantium officia consequuntur molestiae omnis, cum sed, quo quas nesciunt et eum. Recusandae explicabo ex hic vero qui repellat iste doloribus, possimus sed voluptatum voluptates odit repudiandae iusto quibusdam, id voluptas dolor eius rerum labore quasi. Vero nemo voluptates molestiae quae exercitationem cum architecto?</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col p-8 text-left rounded-b-lg md:rounded-br-lg dark:bg-gray-800 " style="width: 100%; height: 40vh;">
            <div class="max-w-2xl text-gray-500 dark:text-gray-400">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Efficient Collaborating</h3>
                <p class="my-4 font-light">You have many examples that can be used to create a fast prototype for your team."</p>
            </div>
            <div class="flex space-x-3">
                @foreach($recipes as $value)
                    <img class="rounded-full w-9 h-9" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png" alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left">
                    <div>{{$value->ingredients[0]}}</div>
                @endforeach
                <div class="text-sm font-light text-gray-500 dark:text-gray-400">CTO at Google</div>
                </div>
            </div>
        </div>
    </main> --}}
@endsection('content')


